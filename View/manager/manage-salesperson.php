<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:/view/login.php");
}
if (!empty($_SESSION["usertype"])) {
    if ($_SESSION["usertype"] != "manager") {
        header("location:/view/error.php");
    }
}
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/control/product-add-validator.php');
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Manage Salesperson</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <script src="/js/manage-salesperson.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/manage-salesperson.css">
    <script src="/js/jquery.min.js"></script>


</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/manager/menu-bar.php'); ?>
            </nav>
            <main>
                <div id="body-container">
                    <div id="add-content">
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-name">Salesperson Name:</label>
                                <input type="text" id="emp-name" placeholder="Salesperson Name">
                                <input type="hidden" id="emp-id">
                                <input type="hidden" id="emp-fuid">
                                <span id="lb-name">Enter a valid name!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="username">User Name:</label>
                                <input type="text" id="username" placeholder="User Name">
                                <span id="lb-username">Enter a valid username!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-pass">Password:</label>
                                <input type="password" id="emp-pass" placeholder="Password">
                                <span id="lb-pass">Enter a valid password!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-email">Email:</label>
                                <input type="text" id="emp-email" placeholder="Email">
                                <span id="lb-email">Enter a valid Email!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-contact">Contact:</label>
                                <input type="tel" id="emp-contact" placeholder="Contact">
                                <span id="lb-contact">Enter a valid Contact!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-dob">Birth Date:</label>
                                <input type="date" id="emp-dob">
                                <span id="lb-dob">Select a Date!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal">Gender:</label>
                                <div class="radio-child">
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label class="radio" for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label class="radio" for="female">Female</label>
                                    <input type="radio" id="other" name="gender" value="other">
                                    <label class="radio" for="other">Other</label>
                                </div>
                                <span id="lb-gender">Select a Value!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-join">joining Date:</label>
                                <input type="date" id="emp-join">
                                <span id="lb-join">Select a Date!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-salary">Salary:</label>
                                <input type="text" id="emp-salary" placeholder="Salary">
                                <span id="lb-salary">Only Number!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-address">Address:</label>
                                <textarea id="emp-address" placeholder="Address"></textarea>
                                <span id="lb-address">Enter a valid address!!</span>
                            </span>
                        </div>
                        <div id="butt-add">
                            <p id="error-txt"></p>
                            <button id="emp-add" onclick="return AddData()">Add</button>
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
        /////Not working if this on external JS
        $(document).ready(function() {
            ReadRecords();
                
        });
    </script>
</body>

</html>