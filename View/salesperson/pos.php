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
                    <div>
                    <input type="date" id="pos-date">
                    <button id="add-customer">Add</button>
                    </div>
                </div>
                <div id="product-cart"></div>

            </div>
            <div id="product-section">
                <div class="sec-title">
                    <input type="text" id="pos-search" placeholder="Search">
                    <button id="btn-pos-search" onclick="return SearchOnPos()">Search</button>
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
            ViewCart();
        });

        function ReadRecords() {
            var salespos = "record";
            var query = $('#pos-search').val();
            $.ajax({
                url: "/control/salesperson-page-data-connector.php",
                type: 'POST',
                data: {
                    salespos: salespos,
                    query: query
                },
                success: function(data, status) {
                    $('#sec-body').html(data);
                }
            });
        }

        function SearchOnPos() {
            ReadRecords();
        }
        $('#pos-search').keypress(function(e) {
            var key = e.which;
            if (key == 13) // the enter key code
            {
                $('#btn-pos-search').click();
                return false;
            }
        });

        function AddSelected(pid, pname, uprice) {
            var data = "record";
            $.ajax({
                url: "/control/salesperson-page-data-connector.php",
                type: 'POST',
                data: {
                    tempCart: data,
                    pid: pid,
                    pname: pname,
                    uprice: uprice
                },
                success: function(data, status) {
                   ViewCart();
                }
            });
        }
        function ViewCart() {
            var data = "record";
            $.ajax({
                url: "/control/salesperson-page-data-connector.php",
                type: 'POST',
                data: {
                    viewTempCart: data,
                },
                success: function(data, status) {
                    $('#product-cart').html(data);
                }
            });
        }
        function CartMinus(pid,ammount) {
    var record = "record";
    if(ammount>1){
        $.ajax({
            url: "/control/salesperson-page-data-connector.php",
            type: 'POST',
            data: {
                cartMinus: record,
                pid:pid
            },
            success: function(data, status) {
                ViewCart();
            }
        });
    }
}
function CartPlus(pid,ammount) {
    var record = "record";
    if(ammount<10){
    $.ajax({
        url: "/control/salesperson-page-data-connector.php",
        type: 'POST',
        data: {
            cartPlus: record,
            pid:pid
        },
        success: function(data, status) {
            ViewCart();
        }
    });
}
}
function DeleteItem(pid) {
    var record = "record";
  
    $.ajax({
        url: "/control/salesperson-page-data-connector.php",
        type: 'POST',
        data: {
            DeleteItem: record,
            pid:pid
        },
        success: function(data, status) {
            ViewCart();
        }
    });
}
    </script>
</body>

</html>