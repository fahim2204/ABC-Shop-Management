<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:login.php");
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
                                <span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="username">User Name:</label>
                                <input type="text" id="username" placeholder="User Name"><span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div>
                            <span class="tooltip">
                                <label class="normal" for="emp-pass">Password:</label>
                                <input type="password" id="emp-pass" placeholder="Password"><span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-email">Email:</label>
                                <input type="text" id="emp-email" placeholder="Email"><span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-contact">Contact:</label>
                                <input type="tel" id="emp-contact" placeholder="Contact"><span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-dob">Birth Date:</label>
                                <input type="date" id="emp-dob"><span id="lb-pDetails">Can't Leave This Empty!!</span>
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
                                </div><span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-join">joining Date:</label>
                                <input type="date" id="emp-join"><span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-salary">Salary:</label>
                                <input type="text" id="emp-salary" placeholder="Salary"><span id="lb-pDetails">Can't Leave This Empty!!</span>
                            </span>
                        </div>
                        <div><span class="tooltip">
                                <label class="normal" for="emp-address">Address:</label>
                                <textarea id="emp-address" placeholder="Address"></textarea><span id="lb-pDetails">Can't Leave This Empty!!</span>
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
        $(document).ready(function() {
            ReadRecords();
        });

        function ReadRecords() {
            var record = "record";
            $.ajax({
                url: "/control/manager-page-data-connector.php",
                type: 'POST',
                data: {
                    viewEmp: record
                },
                success: function(data, status) {
                     $('#view-content').html(data);
                    // $('#cName').val("");
                    // $('#add-data').css("display", "block");
                    // $('#update-data').css("display", "none");
                    // alert(data);
                }
            });
        }

        function AddData() {
            var empname = $('#emp-name').val();
            var username = $('#username').val();
            var emppass = $('#emp-pass').val();
            var empemail = $('#emp-email').val();
            var empcontact = $('#emp-contact').val();
            var empdob = $('#emp-dob').val();
            var empgender = $("input[name='gender']:checked").val();
            var empjoin = $('#emp-join').val();
            var empsalary = $('#emp-salary').val();
            var empaddress = $('#emp-address').val();
            var okay = false;
            // console.log(empname+username+emppass+empemail+empcontact+empdob+empgender+empjoin+empsalary+empsalary+empaddress);

            if (empname == "" || username == "" || emppass == "" || empemail == "" || empcontact == "" || empdob == "" || empgender == "" || empjoin == "" || empsalary == "" || empaddress == "") {
                okay = false;
            }else{
                okay = true;
            }
            if (okay) {
                var requestFor = "add";
                $.ajax({
                    url: "/control/manager-page-data-connector.php",
                    type: 'POST',
                    data: {
                        addSalespersonData: requestFor,
                        empname: empname,
                        username: username,
                        emppass: emppass,
                        empemail: empemail,
                        empcontact: empcontact,
                        empdob: empdob,
                        empgender: empgender,
                        empjoin: empjoin,
                        empsalary: empsalary,
                        empaddress: empaddress
                    },
                    success: function(data, status) {
                        alert(data);
                        ReadRecords();
                    }
                });
                return false;
            }
        }
        function FillData(eId, eName, username, password, email, Contact, dob, gender, joinDate, salary,address) {
            $('#emp-name').val(eName);
            $('#username').val(username);
            $('#emp-pass').val(password);
            $('#emp-email').val(email);
            $('#emp-contact').val(Contact);
            $('#emp-dob').val(dob);
            $("input[name='gender'][value=" + gender + "]").prop('checked', true);
            $('#emp-join').val(joinDate);
            $('#emp-salary').val(salary);
            $('#emp-address').val(address);

             $('#emp-add').css("display", "none");
             $('#update-data').css("display", "block");
             $('#clear-data').css("display", "block");
        }
        function ClearData() {
            $('#emp-name').val("");
            $('#username').val("");
            $('#emp-pass').val("");
            $('#emp-email').val("");
            $('#emp-contact').val("");
            $('#emp-dob').val("");
            $('#emp-join').val("");
            $('#emp-salary').val("");
            $('#emp-address').val("");

             $('#emp-add').css("display", "block");
             $('#update-data').css("display", "none");
             $('#clear-data').css("display", "none");

        }
        
        function UpdateData() {
            
            var empname = $('#emp-name').val();
            var username = $('#username').val();
            var emppass = $('#emp-pass').val();
            var empemail = $('#emp-email').val();
            var empcontact = $('#emp-contact').val();
            var empdob = $('#emp-dob').val();
            var empgender = $("input[name='gender']:checked").val();
            var empjoin = $('#emp-join').val();
            var empsalary = $('#emp-salary').val();
            var empaddress = $('#emp-address').val();

            $.ajax({
                url: "/control/manager-page-data-connector.php",
                type: 'POST',
                data: {
                    updateData: cid,
                    upCname: catname
                },
                success: function(data, status) {
                    alert(data);
                    ReadRecords();
                }
            });
            return false;
        }



    </script>
</body>

</html>