<?php include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Product</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/category-page.css">
    <link rel="stylesheet" type="text/css" href="/css/product-section.css">
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
                <div class="all-product-container">
                    <?php
                    $dbTry = new database();
                    $conObj = $dbTry->OpenConn();
                    $products = $dbTry->RetrieveProductsByCat($conObj, $_REQUEST['category-id']);
                    if ($products->num_rows == 0) {
                        echo '
                        <div class="empty-product">
                        <div><img src="https://img.icons8.com/color/100/000000/sad--v1.png"/></div>
                        <div><h6>Sorry Couldn\'t Find Any Product</h6></div>
                        </div>
                        ';
                    }
                    while ($row = $products->fetch_assoc()) {
                    ?>
                        <div class="product-container">
                <div class="product-image-container">
                    <a href="/view/product.php?product-id=<?php echo $row['pid'] ?>">
                        <img src="<?php 
                        $imagePath = $_SERVER['DOCUMENT_ROOT'] ."/images/product-image/".$row['pimage'];
                        if(file_exists($imagePath)){
                             echo '/images/product-image/'.$row['pimage'].'';
                        }else{
                            echo '/images/icon/no-image.png';
                        }?>" alt="">
                    </a>
                </div>
                <div class="product-name">
                    <?php echo $row['pname'] ?>
                </div>
                <div class="product-quantity">
                    <?php echo $row['pquantity'] ?>
                </div>
                <div class="product-price">
                    <span>৳</span><?php echo $row['uprice'] ?>
                </div>
                <div class="product-ratings">
                    <?php echo $row['prate'] ?>
                </div>
                <div class="product-buttons">
                <button onclick="AddToCart(<?php echo $row['pid'] ?>)">Add to Cart</button>
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