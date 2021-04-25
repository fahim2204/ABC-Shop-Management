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
    <title>ABC Shop - Cart</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0b6de5c2ec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- ____same css is used for all type of user.____ -->
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <link rel="stylesheet" type="text/css" href="/css/cart.css">
    <!-- same css is used for all type of user. -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/cart-add.js"></script>

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
                <div class="cart-container">
                <!-- Filled From DB with AJAX -->
                <div id="cart-manage"></div>
                </div>

            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
    <script>
       $(document).ready(function() {
            ReadCartItems();
        });
    </script>
</body>

</html>