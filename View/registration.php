<?php 
    if(empty($_GET['page'])){
        include "header.php"; 
    }
?>
<?php include "../control/registrationValidation.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title." Registration"; ?></title>
    </head>
    <body>
        <br><br><br>
        <table style="width:100%">
            <tr>
                <td width="35%">&nbsp</td>
                
                <td width="30%">
                    <fieldset>
                    <legend><b>REGISTRATION</b></legend>
                    <center>
                        <form value="Registration" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST"> 
                            <table>
                                <tr>
                                    <td>
                                        <label>Name:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name;?>">
                                    </td>
                                    <td>
                                        <?php echo $validateName; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Email:</label>
                                    </td>
                                    <td>
                                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                                    </td>
                                    <td>
                                        <?php echo $validateEmail; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>User Name:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="username" name="username" placeholder="User Name" value="<?php echo $userName;?>">
                                    </td>
                                    <td>
                                        <?php echo $validateUserName; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                    </td>
                                    <td>
                                        <?php echo $validatePassword; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Cofirm Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                    </td>
                                    <td>
                                        <?php echo $validateCPassword; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Gender:</label>
                                    </td>
                                    <td>
                                        <input type="radio" id="gender" name="gender" value="male">
                                        <label for="male">Male</lable>
                                        <input type="radio" id="gender" name="gender" value="female">
                                        <label for="female">Female</lable>
                                        <input type="radio" id="gender" name="gender" value="other">
                                        <label for="other">Other</lable>
                                    </td>
                                    <td>
                                        <?php echo $validateGender; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Date of Birth:</label>
                                    </td>
                                    <td>
                                        <input type="date" id="dob" name="dob">
                                    </td>
                                    <td>
                                        <?php echo $validateDob; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Phone:</label>
                                    </td>
                                    <td>
                                        <input type="tel" id="phone" name="phone" placeholder="Phone" value="<?php echo $phone;?>">
                                    </td>
                                    <td>
                                        <?php echo $validatePhn; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Address:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="address" name="address" placeholder="Address" value="<?php echo $address;?>">
                                    </td>
                                    <td>
                                        <?php echo $validateAddr; ?>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td> 
                                    </td>
                                    <td align="center"> 
                                        <input type="submit" name="reset" id="reset" value="Reset">
                                        <input type="submit" name="submit" id="submit" value="Submit">
                                    </td>
                                    <td>
                                        <?php echo $ValidateAllField; ?>
                                    </td>
                                </tr>
                            </table>
                    </center>
                            <a href="login.php">Already Registered?</a>
                        </form>
                </fieldset>
                </td>
                <td width="35%">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
            </tr>
        </table>
        
    </body>
</html>



<?php 
    if(empty($_GET['page'])){
        include "footer.php"; 
    }
?>