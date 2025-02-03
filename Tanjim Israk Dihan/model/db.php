<?php
class Customer
{
    private $connectionObject;

    public function __construct()
    {
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "customer";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    public function insertData($table, $u_name, $mail, $pass, $ph_num, $shipping_address, $pcode, $PM, $GD, $dob, $confirm_password)
    {
        $sql = "INSERT INTO $table (username, password, confirmpassword, email, phone_number, shipping_address, postal_code, payment_method, gender, dob) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->connectionObject->prepare($sql)) {
            $stmt->bind_param("ssssssssss", $u_name, $pass, $confirm_password, $mail, $ph_num, $shipping_address, $pcode, $PM, $GD, $dob);
            if ($stmt->execute()) {
                return true;
            } else {
                return "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            return "Error preparing statement: " . $this->connectionObject->error;
        }
    }

    public function login($username, $password)
    {
        $username = $this->connectionObject->real_escape_string($username);
        $sql = "SELECT * FROM customer WHERE username = ?";

        if ($stmt = $this->connectionObject->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if ($password === $user['password']) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['username'];
                    return true;
                } else {
                    return "Invalid username or password!";
                }
            } else {
                return "Invalid username or password!";
            }
            $stmt->close();
        } else {
            return "Error preparing statement: " . $this->connectionObject->error;
        }
    }

    public function getConnection()
    {
        return $this->connectionObject;
    }
}
?>
