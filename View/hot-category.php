<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/hot-category.css">
</head>

<body>
    <div class="title">
        <img src="https://img.icons8.com/ios-glyphs/35/138f13/first-place-ribbon.png" />
        <h6>Hot-Categories</h6>
    </div>
    <div class="h-category-container">
        <?php
        $dbTry = new database();
        $conObj = $dbTry->OpenConn();
        $Categories = $dbTry->RetrieveCategoriesSix($conObj);
        while ($row = $Categories->fetch_assoc()) {
        ?>
            <a href="/view/category.php?category-id=<?php echo $row['cid'] ?>">
                <div class="single-container">
                    <div class="img-container">
                        <img src="/images/category-image/<?php echo $row['cimage'] ?>" alt="">
                    </div>
                    <div class="c-name-container">
                        <?php echo $row['cname'] ?>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>

</body>

</html>