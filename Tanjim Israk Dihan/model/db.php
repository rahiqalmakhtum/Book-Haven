<?php
class Customer
{
    private $connectionObject;

    public function __construct()
    {
        // Database Connection Details
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
        // SQL query to insert data using prepared statement
        $sql = "INSERT INTO $table (username, password, confirmpassword, email, phone_number, shipping_address, postal_code, payment_method, gender, dob) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->connectionObject->prepare($sql)) {
            $stmt->bind_param("ssssssssss", $u_name, $pass, $confirm_password, $mail, $ph_num, $shipping_address, $pcode, $PM, $GD, $dob);
            if ($stmt->execute()) {
                return true; // Return true on successful insert
            } else {
                return "Error: " . $stmt->error; // Return error message if insert fails
            }
            $stmt->close();
        } else {
            return "Error preparing statement: " . $this->connectionObject->error; // Return error if statement preparation fails
        }
    }

    public function login($username, $password)
    {
        // Escape the input to prevent SQL injection
        $username = $this->connectionObject->real_escape_string($username);

        // Prepare the SQL query to fetch user details by username
        $sql = "SELECT * FROM customer WHERE username = ?";

        if ($stmt = $this->connectionObject->prepare($sql)) {
            $stmt->bind_param("s", $username); // Use parameterized queries to prevent SQL injection
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Check if the password matches (no hashing)
                if ($password === $user['password']) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['username'];

                    // Return true to indicate successful login
                    return true;
                } else {
                    return "Invalid username or password!"; // Return error if password doesn't match
                }
            } else {
                return "Invalid username or password!"; // Return error if no user found
            }
            $stmt->close();
        } else {
            return "Error preparing statement: " . $this->connectionObject->error; // Return error if statement preparation fails
        }
    }

    // Getter method to retrieve the database connection
    public function getConnection()
    {
        return $this->connectionObject;
    }
}
?>
