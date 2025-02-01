<?php
require("../uc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    $login= isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    



    if (empty($login)) {
        $errors[] = "Use your Email or Employee_id.";
    }

    if (empty($password)) {
        $errors[] = "Use the user password ";
    }

   


       
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
    } else {
        echo "Form successfully validated!<br>";
       
 
    }
}
?>
