<?php
if (!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION["username"])) {
    header("location:/view/login.php");
}
if (!empty($_SESSION["usertype"])) {
    if ($_SESSION["usertype"] != "salesperson") {
        header("location:/view/error.php");
    }
}
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
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
    <link rel="stylesheet" type="text/css" href="/css/pop-up-editor-window.css">
    <script src="/js/jquery.min.js"></script>

</head>

<body>
    <div class="window-container">
        <div class="pop-up-update">
            <div class="update-form">
                <div class="single-item">
                    <label for="pName">Product Name:</label>
                    <input type="text" id="pName" placeholder="Product Name">
                    <input type="hidden" id="pId">
                </div>
                <div class="single-item">
                    <label for="pCategory">Category:</label>
                    <select name="pCategory" id="pCategory">
                        <?php
                        $dbTry = new database();
                        $conObj = $dbTry->OpenConn();
                        $categories = $dbTry->RetrieveCategories($conObj);
                        while ($row = $categories->fetch_assoc()) {
                            echo '<option value="' . $row["cname"] . '">' . $row["cname"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="single-item">
                    <label for="pBrand">Brand:</label>
                    <select name="pBrand" id="pBrand">
                        <?php
                        $dbTry = new database();
                        $conObj = $dbTry->OpenConn();
                        $categories = $dbTry->RetrieveBrands($conObj);
                        while ($row = $categories->fetch_assoc()) {
                            echo '<option value="' . $row["bname"] . '">' . $row["bname"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="single-item">
                    <label for="pQuantity">Quantity:</label>
                    <input type="text" id="pQuantity" name="pQuantity" placeholder="Quantity">
                </div>
                <div class="single-item">
                    <label for="pStock">Opening Stock:</label>
                    <input type="text" id="pStock" name="pStock" placeholder="Opening Stock">
                </div>
                <div class="single-item">
                    <label for="pPrice">Unit Price:</label>
                    <input type="text" id="pPrice" name="pPrice" placeholder="Unit Price">
                </div>
                <div class="single-item">
                    <label for="pCost">Unit Cost:</label>
                    <input type="text" id="pCost" name="pCost" placeholder="Unit Cost">
                </div>
                <div class="single-item">
                    <label for="pDetails">Product Details:</label>
                    <textarea name="pDetails" id="pDetails" placeholder="Product Details" cols="30" rows="10"></textarea>
                </div>
                <div class="single-item button-item">
                    <button id="cancel-pop" onclick="return CancelPopUp()">Cancel</button>
                    <button id="update-product" onclick="return UpdateProduct()">Update</button>
                </div>
            </div>
        </div>
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/salesperson/menu-bar.php'); ?>
            </nav>
            <main>
                <div id="manual-form-container">
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
            // $('.pop-up-update').css("display","none");
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

        function ShowPopUp(pId, pName, pCat, pBrand, pQuantity, uprice, ucost, pstock, pdetails) {
            $('.pop-up-update').css("display", "block");
            $('#pName').val(pName);
            $('#pId').val(pId);
            $('#pCategory').val(pCat);
            $('#pBrand').val(pBrand);
            $('#pQuantity').val(pQuantity);
            $('#pPrice').val(uprice);
            $('#pCost').val(ucost);
            $('#pStock').val(pstock);
            $('#pDetails').val(pdetails);
        }

        function CancelPopUp() {
            $('.pop-up-update').css("display", "none");
        }

        function UpdateProduct() {
            var request = "update";
            var pName = $('#pName').val();
            var pId = $('#pId').val();
            var pCat = $('#pCategory').val();
            var pBrand = $('#pBrand').val();
            var pQuantity = $('#pQuantity').val();
            var uprice = $('#pPrice').val();
            var ucost = $('#pCost').val();
            var pstock = $('#pStock').val();
            var pdetails = $('#pDetails').val();
            $.ajax({
                url: "/control/salesperson-page-data-connector.php",
                type: 'POST',
                data: {
                    update: request,
                    pName: pName,
                    pId: pId,
                    pCat: pCat,
                    pBrand: pBrand,
                    pQuantity: pQuantity,
                    uprice: uprice,
                    ucost: ucost,
                    pstock: pstock,
                    pdetails: pdetails
                },
                success: function(data, status) {
                    $('.pop-up-update').css("display", "none");
                    alert(data);
                    ReadRecords();
                }
            });
            return false;
        }

        function DeleteData(pid) {
            var confimDel = confirm("Are you Sure Want To Delete?");
            if (confimDel == true) {
                $.ajax({
                    url: "/control/salesperson-page-data-connector.php",
                    type: 'POST',
                    data: {
                        deleteData: pid
                    },
                    success: function(data, status) {
                        ReadRecords();
                    }
                });
            }
        }
    </script>
</body>


</html>