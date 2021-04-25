<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Registration</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/registration-form.css">
    <script src="/js/registration-validation.js"></script>
    <script src="/js/jquery.min.js"></script>

</head>


<body>
    <div class="window-container">
        <div id="registration-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <div id="registration-section">
                <div id="manual-form-container">
                    <div id="form-title">
                        <h1>Registration</h1>
                    </div>
                    <div id="form-body">
                        <div id="form-body-main">
                            <div class="items" id="item1">
                                <label class="required">Name:</label>
                                <span class="tooltip">
                                    <input type="text" id="name" name="name" placeholder="Name">
                                    <span id="lb-name">Enter a Valid Name!!</span>
                                </span>
                            </div>
                            <div class="items" id="item2">
                                <label class="required">Email or Phone No:</label>
                                <span class="tooltip">
                                    <span id="lb-email">Enter a Valid E-mail or Phone No!!</span>
                                    <input type="text" id="username" name="username" placeholder="Username">
                                </span>
                            </div>
                            <div class="items" id="item3">
                                <label class="required">Password:</label>
                                <span class="tooltip">
                                    <span id="lb-pass">Enter a Valid Password!!</span>
                                    <input type="password" id="password" name="password" placeholder="Password">
                                </span>
                            </div>
                            <div class="items" id="item4">
                                <label class="required">Cofirm Password:</label>
                                <span class="tooltip">
                                    <span id="lb-cpass">Password Not Matched!!</span>
                                    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                </span>
                            </div>
                            <div class="items" id="item5">
                                <div class="error">
                                    <p id="errmsg"></p>
                                </div>
                                <button id="reset" onclick="Clear()">Reset</button>
                                <button id="submit" onclick="RegistrationFieldValidation()">Submit</button>

                                <!-- <input type="reset" name="reset" id="reset" value="Reset">
                                    <input type="submit" name="submit" id="submit" value="Submit"> -->
                                <span class="goto-login-link">
                                    <a href="login.php">Already Registered?</a>
                                </span>
                                <!-- Future implement for validation -->
                                <!-- <button type="button" onclick="document.getElementById('lb-pass').style.visibility = 'visible'">
                                        Click Me!</button> -->
                            </div>
                        </div>

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
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>