<?php
class customer
{
    private $connectionObject;

    public function __construct()
    {
        //  database
        $DBHostname = "localhost";
        $DBusername = "root";
        $DBPassword = "";
        $DBname = "emdb";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    public function insertData($table, $u_name, $mail,$empid, $pass, $c_pass, $ph_num, $contact_method, $gender, $dob, $Delivery_address, $Parmanent_address)
    {
       
        $sql = "INSERT INTO $table (username, email,employee_id, password, confirm_password, phone_number, contact_method, gender, dob, delivery_address, permanent_address) 
                VALUES ('$u_name', '$mail','$empid', '$pass', '$c_pass', '$ph_num', '$contact_method', '$gender', '$dob', '$Delivery_address', '$Parmanent_address')";

       
        if ($this->connectionObject->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connectionObject->error;
        }
    }

    
    public function __destruct()
    {
        $this->connectionObject->close();
    }
}
?>



