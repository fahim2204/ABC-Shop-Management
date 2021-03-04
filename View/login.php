<?php include "header.php"; ?>
<?php include "../control/loginValidation.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title." Login"; ?></title>
    </head>
    <body>
        <br><br><br>
        <center>
            <form value="Login" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST"> 
                <table>
                    <tr>
                        <td>
                            <label>User Name:</label>
                        </td>
                        <td>
                            <input type="text" id="username" name="username" placeholder="User Name">
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
                            <br>
                            <input type="checkbox" value="rem">
                            <label for="rem">Remember me<label>
                        </td>
                        <td>
                            <?php echo $ValidateLogin; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="SUBMIT">
                        </td>
                        <td>
                            <a href="forgetpass.php">Forget Password?</a>
                        </td>
                    </tr>
                </table>
                <a href="registration.php">Register Here</a>
            </form>
        </center>
    </body>
</html>


<?php include "footer.php"; ?>