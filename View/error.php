<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Error</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/product-page.css">
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
            <main>
                <div class="product-page-container">
                    
                        <div class="empty-product">
                        <div><img src="https://img.icons8.com/doodle/100/000000/security-checked--v1.png"/></div>
                        <div><h6>You are not authorized for this page!!</h6></div>
                        </div>

                </div>

            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>