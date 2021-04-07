<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Home</title>   
    <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/global.css">
    <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/homeIndex.css">
</head>

<body>
    <div class="window-container">
        <div id="home-container">
            <header>
                <?php include "View/header.php"; ?>
            </header>
            <nav>
                <?php include "View/menuBar.php"; ?>
            </nav>
            <div id="image-slider-container">
                <?php include "View/imageSlider.html"; ?>
            </div>
            <div id="hot-category-container">
                Hot category
            </div>
            <main>
                Main body
            </main>
            <footer>
                <?php include "View/footer.php"; ?>
            </footer>
        </div>
    </div>
</body>

</html>