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
        <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/loginForm.css">
    </head>
    <body>
          <div class="form-container">
              <div class="center">
                  <h1>Login</h1>
                <form value="Login" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST"> 
                    
                    <label>Email or Phone Number:</label>
                
                    <input type="text" id="username" name="username" placeholder="User Name" value="<?php echo $userName; ?>">
            
                    <label>Password:</label>
            
                    <input type="password" id="password" name="password" autocomplete="new-password" placeholder="Password">
                    <div class="remember">
                        <input type="checkbox" value="rem">
                        <label for="rem">Remember me<label>
                    </div>
                            
                            <?php echo $ValidateLogin; ?>
                            
                    <input type="submit" value="Login">
                    <div class="forget-pass">
                    <a href="forgetpass.php">Forget Password?</a>
                </div>
            </form>
        </div>
    </div>
    <div class="register">
        <p style="color:red">New Member?</p>
        <a href="registration.php">Register Here</a>
    </div>
     
    </body>
</html>


<?php include "footer.php"; ?>