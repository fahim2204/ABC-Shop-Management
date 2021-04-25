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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Manage Brand</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- ____same css is used for all type of user.____ -->
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <!-- same css is used for all type of user. -->
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/add-category-n-brand.css">


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
                <div class="add-category-parent">
                    <div class="category-title">
                        <h1>Manage Brand</h1>
                    </div>
                    <!-- This DIV is filled from manager-page-data-connector.php By AJAX -->
                    <div id="category-manage"></div>
                    <div class="category-add">
                        <form id="add-category" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div id="item1">
                                <label for="cName" class="required">Brand Name:</label>
                                <span class="tooltip">
                                    <input type="text" id="cName" name="cName" placeholder="Brand Name" ?>
                                    <input type="hidden" id="cid" ?>
                                    <span id="lb-pName">Can't Leave Empty!!</span>
                                </span>
                            </div>
                            <div id="itemButton">
                                <button id="add-data" onclick="return AddData()">Add</button>
                                <button style="display:none" id="update-data" onclick="return UpdateData()">Update</button>
                            </div>


                        </form>
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
                    brandRecord: record
                },
                success: function(data, status) {
                    $('#category-manage').html(data);
                    $('#cName').val("");
                    $('#add-data').css("display", "block");
                    $('#update-data').css("display", "none");
                }
            });
        }

        function AddData() {
            var catname = $('#cName').val();
            if(catname == "" || catname.length<3){
                $('#lb-pName').css("visibility","visible");
                return false;
            }else{
                $('#lb-pName').css("visibility","hidden");
                $.ajax({
                    url: "/control/manager-page-data-connector.php",
                    type: 'POST',
                    data: {
                        brandAddData: catname
                    },
                    success: function(data, status) {
                        alert(data);
                        ReadRecords();
                    }
                });
                return false;
            }
        }

        function DeleteData(cid) {
            var confimDel = confirm("Are you Sure Want To Delete?");
            if (confimDel == true) {
                $.ajax({
                    url: "/control/manager-page-data-connector.php",
                    type: 'POST',
                    data: {
                        brandDeleteData: cid
                    },
                    success: function(data, status) {
                        ReadRecords();
                    }
                });
            }
        }

        function SetData(cid, cname) {
            $('#cName').val(cname);
            $('#cid').val(cid);
            $('#add-data').css("display", "none");
            $('#update-data').css("display", "block");
        }

        function UpdateData() {
            var catname = $('#cName').val();
            var cid = $('#cid').val();
            $.ajax({
                url: "/control/manager-page-data-connector.php",
                type: 'POST',
                data: {
                    brandUpdateData: cid,
                    brandUpCname: catname
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