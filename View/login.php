<?php include "header.php"; ?>
<?php include "../control/loginValidation.php"; ?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            if(isset($_REQUEST['logout'])){
                session_destroy();
                header("Location: ".$_SERVER['PHP_SELF']);
            }
        }  
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title." Login"; ?></title>
    </head>
    <body>
    <br><br><br>
        <table style="width:100%">
            <tr>
                <td width = "35%">&nbsp</td>
                
                <td width = "30%">
                    <fieldset>
                        <legend><b>LOGIN</b></legend>
                        <center>
                        <form value="Login" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST"> 
                            <table>
                                <tr>
                                    <td>
                                        <label>User Name:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="username" name="username" placeholder="User Name" value="<?php echo $userName; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="password" name="password" autocomplete="new-password" placeholder="Password">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" value="rem">
                                        <label for="rem">Remember me<label>
                                    </td>
                                    <td>
                                        &nbsp  &nbsp  <?php echo $ValidateLogin; ?>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Login">
                                    </td>
                                    <td>
                                        <a href="forgetpass.php">Forget Password?</a>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td>
                                    <a href="registration.php">Register Here</a>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        </center> 
                    </fieldset>
                </td>
                <td width = "35%">&nbsp</td>
            </tr>
        </table>
    </body>
</html>


<?php include "footer.php"; ?>