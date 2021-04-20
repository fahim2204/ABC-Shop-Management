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
<?php include($_SERVER['DOCUMENT_ROOT'] . '/control/productAddValidator.php'); ?>

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
    <link rel="stylesheet" type="text/css" href="/css/SalesPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/salesperson/MenuBar.php'); ?>
            </nav>
            <main>
                POS .......
            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>