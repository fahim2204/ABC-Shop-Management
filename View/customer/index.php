<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:/view/login.php");
}
if (!empty($_SESSION["usertype"])) {
    if ($_SESSION["usertype"] != "customer") {
        header("location:/view/error.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Customer</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0b6de5c2ec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- ____same css is used for all type of user.____ -->
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <!-- same css is used for all type of user. -->
    <link rel="stylesheet" type="text/css" href="/css/customer-profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/customer/menu-bar.php'); ?>
            </nav>
            <main>
                <div id="body-container">
                    <div id="add-content">
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-name">Full Name:</label>
                                <input type="text" id="emp-name" placeholder="Manager Name" disabled>
                                <input type="hidden" id="emp-id">
                                <input type="hidden" id="emp-fuid">
                                <span id="lb-name">Enter a valid name!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="username">User Name:</label>
                                <input type="text" id="username" placeholder="User Name" disabled>
                                <span id="lb-username">Enter a valid username!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-pass">Password:</label>
                                <input type="password" id="emp-pass" placeholder="Password" disabled>
                                <span id="lb-pass">Enter a valid password!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-email">Email:</label>
                                <input type="text" id="emp-email" placeholder="Email" disabled>
                                <span id="lb-email">Enter a valid Email!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-contact">Contact:</label>
                                <input type="tel" id="emp-contact" placeholder="Contact" disabled>
                                <span id="lb-contact">Enter a valid Contact!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-dob">Birth Date:</label>
                                <input type="date" id="emp-dob" disabled>
                                <span id="lb-dob">Select a Date!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal">Gender:</label>
                                <div class="radio-child">
                                    <input type="radio" id="male" name="gender" value="male" disabled>
                                    <label class="radio" for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="female" disabled>
                                    <label class="radio" for="female">Female</label>
                                    <input type="radio" id="other" name="gender" value="other" disabled>
                                    <label class="radio" for="other">Other</label>
                                </div>
                                <span id="lb-gender">Select a Value!!</span>
                            </span>
                        </div>

                        <div><span class="tooltip">
                                <label class="normal" for="emp-address">Address:</label>
                                <textarea id="emp-address" placeholder="Address" disabled></textarea>
                                <span id="lb-address">Enter a valid address!!</span>
                            </span>
                        </div>
                        <div id="butt-add">
                            <p id="error-txt"></p>
                            <button id="emp-add" onclick="return AddData()">Edit</button>
                            <button style="display:none" id="clear-data" onclick="return ClearData()">Cancel</button>
                            <button style="display:none" id="update-data" onclick="return UpdateData()">Update</button>
                        </div>


                    </div>
                    <div id="view-content">

                    </div>
                </div>

            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var record = "record";
            $.ajax({
                url: "/control/admin-page-data-connector.php",
                type: 'POST',
                data: {
                    viewCustomer: record
                },
                success: function(data, status) {
                    var result = JSON.parse(data);
                    $('#emp-name').val(result.name);
                    $('#username').val(result.uname);
                    $('#emp-pass').val(result.pass);
                    $('#emp-email').val(result.email);
                    $('#emp-contact').val(result.contact);
                    $('#emp-dob').val(result.dob);
                    $("input[name='gender'][value=" + result.gender + "]").prop('checked', true);
                    $('#emp-address').val(result.address);
                }
            });

        });
    </script>
</body>

</html>