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
    <title>ABC Shop - Sales</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
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
                Dashboard .......
            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>