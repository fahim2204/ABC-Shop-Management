<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:login.php");
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
    <title>ABC Shop - Manager</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0b6de5c2ec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- ____same css is used for all type of user.____ -->
    <link rel="stylesheet" type="text/css" href="/css/SalesPage.css">
    <!-- same css is used for all type of user. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/manager/MenuBar.php'); ?>
            </nav>
            <main>
                <div class="sec-brand">
                    <span class="brand-title">
                        Brand
                    </span>
                    <span class="brand-ammount">
                        10
                    </span>
                </div>
                <div class="sec-category">
                    <span class="category-title">
Category
                    </span>
                    <span class="category-ammount">
20
                    </span>
                </div>
            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>

</body>

</html>