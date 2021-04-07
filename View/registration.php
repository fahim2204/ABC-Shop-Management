<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Registration</title>
    <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/global.css">
    <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/registrationForm.css">
</head>

<body>
    <div class="window-container">
        <div id="registration-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/ABC-Shop-Management/view/header.php'); ?>
            </header>
            <div id="registration-section">
                <div id="manual-form-container">
                    <div id="form-title">
                        <h1>Registration</h1>
                    </div>
                    <div id="form-body">
                        <form action="" class="registration">
                            <div id="form-body-main">
                                <div class="items" id="item1">
                                    <label class="required">Name:</label>
                                    <span class="tooltip">
                                        <input type="text" id="name" name="name" placeholder="Name">
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                <div class="items" id="item2">
                                    <label class="required">Email or Phone No:</label>
                                    <span class="tooltip">
                                        <span id="lb-email">Write Name on Here!!</span>
                                        <input type="email" id="email" name="email" placeholder="Email">
                                    </span>
                                </div>
                                <div class="items" id="item3">
                                    <label class="required">Password:</label>
                                    <span class="tooltip">
                                        <span id="lb-pass">Write Name on Here!!</span>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                    </span>
                                </div>
                                <div class="items" id="item4">
                                    <label class="required">Cofirm Password:</label>
                                    <span class="tooltip">
                                        <span id="lb-cpass">Write Name on Here!!</span>
                                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                    </span>
                                </div>
                                <div class="items" id="item5">
                                    <input type="reset" name="reset" id="reset" value="Reset">
                                    <input type="submit" name="submit" id="submit" value="Submit">
                                    <span class="goto-login-link">
                                        <a href="login.php">Already Registered?</a>
                                    </span>
                                    <!-- Future implement for validation -->
                                    <!-- <button type="button" onclick="document.getElementById('lb-pass').style.visibility = 'visible'">
                                        Click Me!</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="or">
                <div class="or-ex"></div>
                <p>OR,</p>
                <div class="or-ex"></div>
            </div>
            <div id="auto-registration">

                <button id="btn-google"><img src="https://img.icons8.com/fluent/48/000000/google-logo.png" />Login With Google</button>
                <button id="btn-fb"><img src="https://img.icons8.com/fluent/48/000000/facebook-new.png" />Login With Facebook</button>
            </div>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/ABC-Shop-Management/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>