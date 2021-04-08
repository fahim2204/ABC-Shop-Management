<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Registration</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/loginForm.css">
</head>

<body>
    <div class="window-container">
        <div id="login-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <div id="registration-section">
                <div id="manual-form-container">
                    <div id="form-title">
                        <h1>Login</h1>
                    </div>
                    <div id="form-body">
                        <form action="" class="registration">
                            <div id="form-body-main">
                                <div class="items" id="item1">
                                    <label class="required">Email or Phone No:</label>
                                    <span class="tooltip">
                                        <span id="lb-email">Write Name on Here!!</span>
                                        <input type="email" id="email" name="email" placeholder="Email">
                                    </span>
                                </div>
                                <div class="items" id="item2">
                                    <label class="required">Password:</label>
                                    <span class="tooltip">
                                        <span id="lb-pass">Write Name on Here!!</span>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                    </span>
                                </div>

                                <div class="items" id="item3">
                                    <input type="reset" name="reset" id="reset" value="Reset">
                                    <input type="submit" name="submit" id="submit" value="Login">
                                    <span class="goto-registration-link">
                                        <a href="/view/forgetPass.php">Forget Password?</a>
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
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>