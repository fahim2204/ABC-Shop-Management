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
<?php include($_SERVER['DOCUMENT_ROOT'] . '/control/product-add-validator.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - POS</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/pos-page.css">
    <script src="/js/jquery.min.js"></script>


</head>

<body>
    <div class="window-container">
        <div id="pos-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/salesperson/menu-bar.php'); ?>
            </nav>
            <div id="sale-section">
                <div class="customer-n-sale-section">
                    <input type="text" id="cus-name" placeholder="Customer Name">
                    <input type="text" id="contact-no" placeholder="Contact No">
                    <input type="date" id="pos-date">
                </div>
                <div class="product-cart">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                <tr>
                    <td>' . $pName . '</td>
                    <td>' . $pCat . '</td>
                    <td>' . $pBrand . '</td>
                    <td><button>-</button><span>1</span><button>+</button></td>
                    <td><a class="delete" onclick="DeleteData(' . $pId . ')">Delete</a></td>
                </tr>
                </tbody>
                </table>
                </div>
                
            </div>
            <div id="product-section">
                <div class="sec-title">
                    <input type="text" id="pos-search" placeholder="Search">
                    <button onclick="SearchOnPos()">Search</button>
                </div>
                <!-- Sec-Body will populate with ajax -->
                <div id="sec-body"></div> 
            </div>

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
            var salespos = "record";
            $.ajax({
                url: "/control/salesperson-page-data-connector.php",
                type: 'POST',
                data: {
                    salespos: salespos
                },
                success: function(data, status) {
                    $('#sec-body').html(data);
                }
            });
        }
        function SearchOnPos(){
            ReadRecords();
        }
        function AddSelected(pid,pname,uprice){
            var data = "record";
            $.ajax({
                url: "/control/salesperson-page-data-connector.php",
                type: 'POST',
                data: {
                    tempCart: data,
                    pid:pid,
                    pname:pname,
                    uprice:uprice
                },
                success: function(data, status) {
                    var jsdata = JSON.parse(data);
                    alert("jsdata");
                    //alert(jsdata[1].quantity)
                }
            });
        }
    </script>
</body>

</html>