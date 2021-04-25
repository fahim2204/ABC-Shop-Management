<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:/view/login.php");
}
if (!empty($_SESSION["usertype"])) {
    if ($_SESSION["usertype"] != "manager") {
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
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- ____same css is used for all type of user.____ -->
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <!-- same css is used for all type of user. -->
    <script src="/js/jquery.min.js"></script>


</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/manager/menu-bar.php'); ?>
            </nav>
            <main>
                <div class="dash-container">
                    <div class="sec-brand">
                        <span class="brand-title">
                            Total Brand
                        </span>
                        <span class="brand-ammount">
                            0
                        </span>
                    </div>
                    <div class="sec-category">
                        <span class="category-title">
                            Total Category
                        </span>
                        <span class="category-ammount">
                            0
                        </span>
                    </div>
                </div>
            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var DashData = "DashData"
            $.ajax({
                url: "/control/manager-page-data-connector.php",
                type: 'POST',
                data: {
                    DashData: DashData
                },
                success: function(data, status) {
                    var json = $.parseJSON(data);
                    //console.log(json);
                    $('.brand-ammount').html(json.brand);
                    $('.category-ammount').html(json.category);
                }
            });
        });

        
        </script>
</body>

</html>