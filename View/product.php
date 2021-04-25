<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    //header("location:/view/login.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Product</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/product-page.css">
    <script src="/js/cart-add.js"></script>
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
                    <?php
                    include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
                    // $pid = $_REQUEST['product-id'];
                    if (empty($_REQUEST['product-id'])) {
                        echo '
                        <div class="empty-product">
                        <div><img src="https://img.icons8.com/color/100/000000/sad--v1.png"/></div>
                        <div><h6>Sorry Couldn\'t Find Any Product</h6></div>
                        </div>
                        ';
                    } else {
                        $pid = $_REQUEST['product-id'];
                        $dbTry = new database();
                        $conObj = $dbTry->OpenConn();
                        $product = $dbTry->RetrieveSingleProduct($conObj, $pid);
                        $row = $product->fetch_assoc();
                    }
                    if ($product->num_rows == 0) {
                        echo '
                        <div class="empty-product">
                        <div><img src="https://img.icons8.com/color/100/000000/sad--v1.png"/></div>
                        <div><h6>Sorry Couldn\'t Find Any Product</h6></div>
                        </div>
                        ';
                    } else {

                    ?>
                        <div class="product-container">
                            <div class="product-image-container">
                                <img src="/images/product-image/<?php echo $row['pimage'] ?>" alt="">
                            </div>
                            <div class="product-info">
                                <div class="product-name">
                                    <?php echo $row['pname'] ?>
                                </div>

                                <div class="product-brand">
                                    <span>Brand:</span>
                                    <?php echo $row['pbrand'] ?>
                                </div>
                                <div class="product-category">
                                    <span>Category:</span>
                                    <?php echo $row['pcategory'] ?>
                                </div>
                                <div class="product-quantity">
                                    <span>Quantity:</span>
                                    <?php echo $row['pquantity'] ?>
                                </div>
                                <div class="product-price">
                                    <span>৳</span><?php echo $row['uprice'] ?>
                                </div>
                                <div class="product-buttons">
                                    <button onclick="AddToCart(<?php echo $row['pid'] ?>)">Add to Cart</button>
                                    <img src="https://img.icons8.com/carbon-copy/100/000000/filled-like.png" />
                                    <!-- <img src="https://img.icons8.com/plasticine/100/000000/filled-like.png"/> -->

                                </div>
                                <div class="product-ratings">
                                    <!-- <?php echo $row['prate'] ?> -->
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <img src="https://img.icons8.com/ios-filled/50/000000/share.png" />

                                </div>
                            </div>
                            <div class="product-details">
                                <div class="title">Product Details of <?php echo $row['pname'] ?></div>
                                <div class="description">
                                    <?php echo $row['pdetails'] ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                </div>

            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>