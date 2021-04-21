<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:login.php");
}
if (!empty($_SESSION["usertype"])) {
    if ($_SESSION["usertype"] != "salesperson") {
        header("location:/view/error.php");
    }
}

// if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])){
//     session_destroy();
//     header("location:login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Manage Products</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <link rel="stylesheet" type="text/css" href="/css/manage-product.css">
    <script src="/js/jquery.min.js"></script>



</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/salesperson/menu-bar.php'); ?>
            </nav>
            <main>
                <div id="manual-form-container">
                    <div class="pop-up-update">
                        hello
                    </div>
                <div id="form-title">
                        <h1>Manage Product</h1>
                    </div>
                <div id="product-manage"></div>
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
                url: "/control/salesperson-page-data-connector.php",
                type: 'POST',
                data: {
                    record: record
                },
                success: function(data, status) {
                    $('#product-manage').html(data);
                }
            });
        }

        function AddData() {
            var catname = $('#cName').val();
            if (catname == "" || catname.length < 3) {
                $('#lb-pName').css("visibility", "visible");
                return false;
            } else {
                $('#lb-pName').css("visibility", "hidden");
                $.ajax({
                    url: "/control/manager-page-validator.php",
                    type: 'POST',
                    data: {
                        addData: catname
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
                    url: "/control/manager-page-validator.php",
                    type: 'POST',
                    data: {
                        deleteData: cid
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
            // $('#productImage')
            //             .attr('src', '/images/icon/shoplogo.ico')
            //             .width(180)
            //             .height(180);
            //         myhidden.value = 20;
            $('#add-data').css("display", "none");
            $('#update-data').css("display", "block");
        }

        function UpdateData() {
            var catname = $('#cName').val();
            var cid = $('#cid').val();
            $.ajax({
                url: "/control/manager-page-validator.php",
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