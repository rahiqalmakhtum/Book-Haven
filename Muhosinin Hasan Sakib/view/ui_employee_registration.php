

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regestration</title>
    <link rel="stylesheet" href="sttt.css">
</head>

<body>
    <form action= "../control/reg_control.php"method="post">
    <fieldset  >
            <legend>
                <h2> Employee Registration</h2>
            </legend>
        <table>


            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><input type="text" name="u_name"></td>
            </tr>
    
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pass"></td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td>:</td>
                <td><input type="password" name="c_pass"></td>
            </tr>
    
            <tr>
                <td>E-mail</td>
                <td>:</td>
                <td><input type="text" name="mail"></td>
            </tr>

            <tr>
                <td>Employee_id</td><td>:</td>
                <td>
                    <select name="empid">
                        <option value="none" selected>Select ID</option>
                        <option value="001">001</option>
                        <option value="002">002</option>
                        <option value="456">003</option>
                        <option value="793">004</option>
                        <option value="888">005</option>
                        <option value="888">006</option>
                        <option value="125">007</option>
                        <option value="078">008</option>
                        <option value="004">009</option>
                        <option value="003">010</option>
                        <option value="053">011</option>
                        <option value="403">012</option>
                        <option value="773">013</option>
                        
                    </select>
                </td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><input type="text" name="ph_num"></td>
            </tr>

            <tr>
                <td>Preferred Contact Method</td><td>:</td>
                <td>
                    <select name="contact_method">
                        <option value="none" selected>Select Method</option>
                        <option value="sms">SMS</option>
                        <option value="call">Phone Call</option>
                        <option value="mail">E-mail</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Gender</td><td>:</td>
                <td>
                    <select name="gender">
                        <option value="none" selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
            </tr>
    
            <tr>
                <td>Date of Birth</td><td>:</td>
                <td><input type="date" name="dob"></td>
            </tr>

            <tr>
                <td>Delivery Address</td><td>:</td>
                <td><textarea name="Delivery_address" id="Delivery_address"></textarea></td>
            </tr>

            <tr>
                <td>Permanent Address</td><td>:</td>
                <td><textarea name="Parmanent_address" id="Parmanent_address"></textarea></td>
            </tr>

            <tr>
                <td  align="center"><input type="submit" name="submit"></td>
                <td  align="center"><input type="reset" name="reset"></td>
            </tr>

        </table>
    </fieldset>

            <tr>
                <td><h3> done with Regisrtraion?</h3></td>
                <td> <a href="" target="update.php">   Login!</a></td>
            </tr>
    </form>
    
</body>
</html>
</body>
</html>
