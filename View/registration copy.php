<?php
if (empty($_GET['page'])) {
    @require_once "header.php";
}
?>
<?php include "../control/registrationValidation.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title . " Registration"; ?></title>
    <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/registrationForm.css">
</head>

<body>
    <!-- <div class="form-container">
            <div class="center">
                <h1>Registration</h1>
                <form value="Registration" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST"> 
                    <div class="item1">
                        <div class="itema">
                            <label>Name:</label>
                        </div>
                        <div class="itemb">
                            <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>">
                        </div>
                        <?php echo $validateName; ?>
                    </div>
                    <div class="item2">
                        <label>Email or Phone No:</label>
                    
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                    
                        <?php echo $validateEmail; ?>
                    </div>
                    <div class="item3">
                        <label>Password:</label>
                    
                        <input type="password" id="password" name="password" placeholder="Password">
                    
                        <?php echo $validatePassword; ?>
                    </div>
                    <div class="item4">
                        <label>Cofirm Password:</label>
                    
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                    
                        <?php echo $validateCPassword; ?>
                    </div>  
                    <div class="item5">
                        <input type="submit" name="reset" id="reset" value="Reset">
                        <input type="submit" name="submit" id="submit" value="Submit">
                    
                        <?php echo $ValidateAllField; ?>
                    </div>
                    
                    <a href="login.php">Already Registered?</a>
                </form>
            </div>
        </div> -->
    <div class="window-container">
        <div class="form-container">
            <span class="new">

                <h1>Registration</h1>
            </span>
            <form action="" class="registration">
                <div class="items" id="item1">
                    <label>Name:</label>
                    <div class="tooltip">
                        <span class="tooltiptext">Write Name on Here!!</span>
                        <input type="text" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="items" id="item2">
                    <label>Email or Phone No:</label>
                    <div class="tooltip">
                        <span id="lb-">Write Name on Here!!</span>
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class="items" id="item3">
                    <label>Password:</label>
                    <div class="tooltip">
                        <span class="tooltiptext">Write Name on Here!!</span>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="items" id="item4">
                    <label>Cofirm Password:</label>
                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                </div>
                <div class="items" id="item5">
                    <input type="reset" name="reset" id="reset" value="Reset">
                    <input type="submit" name="submit" id="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

</body>

</html>



<?php
if (empty($_GET['page'])) {
    include "footer.php";
}
?>