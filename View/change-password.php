<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:/view/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Manager</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- ____same css is used for all type of user.____ -->
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <!-- same css is used for all type of user. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/pass-change-page.css">



</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/' . $_SESSION["usertype"] . '/menu-bar.php'); ?>
            </nav>
            <main>
                <div class="pass-change-container">
                    <div class="title">
                        <p>Change Password</p>
                    </div>
                    <div>
                        <input style="display:none" type="text" id="username" value="<?php echo $_SESSION['username'] ?>">
                        <label for="old-pass">Old Password:</label>
                        <input type="password" id="old-pass">
                    </div>
                    <div>
                        <label for="new-pass">New Password:</label>
                        <input type="password" id="new-pass">
                    </div>
                    <div>
                        <label for="confirm-pass">Confirm Password:</label>
                        <input type="password" id="confirm-pass">
                    </div>
                    <div class="btn">
                        <button onclick="ChangePass()">Change Password</button>
                    </div>
                </div>
            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
    <script>
        function ChangePass() {
            var record = "record";
            var username = $('#username').val();
            var oldpassword = $('#old-pass').val();
            var newpassword = $('#new-pass').val();
            var confirmpassword = $('#confirm-pass').val();

            if (oldpassword == "" || newpassword == "" || confirmpassword == "") {
                alert("Fill Up all the field!!")
            } else {
                if (newpassword == confirmpassword) {
                    $.ajax({
                        url: "/control/change-pass-data-connector.php",
                        type: 'POST',
                        data: {
                            change: record,
                            username: username,
                            oldpassword: oldpassword,
                            newpassword: newpassword
                        },
                        success: function(data, status) {
                            alert(data);
                            location.replace("/view/login.php?logout=true");
                        }
                    });
                } else {
                    alert("New & Confirm password doesn't match!!")
                }
            }

        }
    </script>
</body>

</html>