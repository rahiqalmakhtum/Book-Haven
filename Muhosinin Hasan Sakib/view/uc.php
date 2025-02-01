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
        $DBname = "emtb";

        $this->connectionObject = new mysqli($DBHostname, $DBusername, $DBPassword, $DBname);

        if ($this->connectionObject->connect_error) {
            die("ERROR CONNECTING TO DB: " . $this->connectionObject->connect_error);
        }
    }

    public function insertData($table, $login, $password)
    {
       
        $sql = "INSERT INTO $table (login, password) 
                VALUES ('$login', '$password')";

       
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



