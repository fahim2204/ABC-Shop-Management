<?php include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Home</title>   
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/home-index.css">
</head>

<body>
    <div class="window-container">
        <div id="home-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/menu-bar.html'); ?>
            </nav>
            <div id="image-slider-container">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/image-slider.html'); ?>
            </div>
            <div id="hot-category-container">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/hot-category.php'); ?>
            </div>
            <main>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/main-body.php'); ?>
            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>