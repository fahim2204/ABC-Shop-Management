<?php include "View/header.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title." Home"; ?></title>
        <link rel="stylesheet" type="text/css" href="/ABC-Shop-Management/css/homeIndex.css" >        
    </head>
    <body>
        <div class="home-container">
            <div class="menu-bar">
                <?php include "View/menuBar.php"; ?>
            </div>
            <div class="main-body">
                <?php include "View/indexBody.php"; ?>
            </div>
        </div>

    </body>
</html>


<?php include "View/footer.php"; ?>