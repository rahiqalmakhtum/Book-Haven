<?php
class Customer
{
    private $connectionObject;

    public function __construct()
    {
        // Database connection details
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "emdb";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    // Insert Data with Prepared Statement
    public function insertData($table, $u_name, $mail, $empid, $pass, $c_pass, $ph_num, $contact_method, $gender, $dob, $delivery_address, $permanent_address)
    {
        $sql = "INSERT INTO $table (username, email, employee_id, password, confirm_password, phone_number, contact_method, gender, dob, delivery_address, permanent_address) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connectionObject->prepare($sql);
        if (!$stmt) {
            die("Error preparing statement: " . $this->connectionObject->error);
        }

        $stmt->bind_param("ssissssssss", $u_name, $mail, $empid, $pass, $c_pass, $ph_num, $contact_method, $gender, $dob, $delivery_address, $permanent_address);

        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    // Login Validation
    public function login($email, $password)
    {
        $sql = "SELECT password FROM emptb WHERE email = ?";
        $stmt = $this->connectionObject->prepare($sql);

        if (!$stmt) {
            return "Error preparing statement: " . $this->connectionObject->error;
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) { 
            $stmt->bind_result($dbPassword);
            $stmt->fetch();

            // Directly compare passwords (since hashing is not used)
            if ($password === $dbPassword) {
                $stmt->close();
                return true; // Login successful
            } else {
                $stmt->close();
                return "Invalid email or password."; // Incorrect password
            }
        } else {
            $stmt->close();
            return "Invalid email or password."; // Email not found
        }
    }

    public function __destruct()
    {
        $this->connectionObject->close();
    }
}
?>
