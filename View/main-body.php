<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/product-section.css">
    <script src="/js/cart-add.js"></script>

</head>

<body>
<div class="title">
    <img src="https://img.icons8.com/emoji/35/000000/palm-tree-emoji.png"/>
    <h6>All - Products</h6> 
    </div>
    <div class="all-product-container">
        <?php
        $dbTry = new database();
        $conObj = $dbTry->OpenConn();
        $products = $dbTry->RetrieveProducts($conObj);
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

</body>

</html>