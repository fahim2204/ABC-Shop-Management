<?php include "View/header.php"; ?>
<?php include "View/productTemplate.php"; ?>
<?php include "View/menuBar.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title." Home"; ?></title>
    </head>
    <body>
    <table style="width:100%" >
            <tr style="vertical-align:top">
                <td width = "20%" rowspan="2"> 
                    <?php $menu1 = new MenuBar("Our Own Product", "view/pos.php", "https://img.icons8.com/pastel-glyph/20/000000/shop--v2.png");?> 
                    <?php $menu2 = new MenuBar("Fashion/ Life Style", "fish.php", "https://img.icons8.com/carbon-copy/25/000000/womens-suit.png");?> 
                    <?php $menu3 = new MenuBar("Personal Care", "fish.php", "https://img.icons8.com/ios-filled/20/000000/cleansing.png");?> 
                    <?php $menu4 = new MenuBar("Kithchen Application", "fish.php", "https://img.icons8.com/dotty/20/000000/kitchenwares.png");?> 
                    <?php $menu5 = new MenuBar("Home Accessories", "fish.php", "https://img.icons8.com/dotty/20/000000/mobile-home.png");?> 
                    <?php $menu6 = new MenuBar("Tea & Coffe", "fish.php", "https://img.icons8.com/ios-filled/20/000000/coffee.png");?> 
                    <?php $menu7 = new MenuBar("Juice", "fish.php", "https://img.icons8.com/ios-filled/20/000000/orange-juice.png");?> 
                    <?php $menu8 = new MenuBar("Chocholate & Candies", "fish.php","https://img.icons8.com/ios-glyphs/20/000000/sweet-halloween-candy.png");?> 
                    <?php $menu9 = new MenuBar("Fruits", "fish.php", "https://img.icons8.com/pastel-glyph/20/000000/citrus.png");?> 
                    <?php $menu10 = new MenuBar("Vegetables", "fish.php", "https://img.icons8.com/pastel-glyph/20/000000/beetroot-and-greenery.png");?> 
                    <?php $menu11 = new MenuBar("Pet Care", "fish.php", "https://img.icons8.com/ios-filled/20/000000/pet-commands-train.png");?> 
                    <?php $menu12 = new MenuBar("Milk & Dairy Product", "fish.php", "https://img.icons8.com/ios-filled/20/000000/kawaii-milk--v1.png");?> 
                </td>
                <td width = "16%" colspan="5">
                    <hr>
                    <marquee>
                        <img src="/ABC-Shop-Management/images/ProductImage/c1.jpg" width="1000" height="300">&nbsp
                        <img src="/ABC-Shop-Management/images/ProductImage/c2.jpg" width="1000" height="300">&nbsp
                        <img src="/ABC-Shop-Management/images/ProductImage/c3.jpg" width="1000" height="300">&nbsp
                        <img src="/ABC-Shop-Management/images/ProductImage/c4.jpg" width="1000" height="300">&nbsp
                        <img src="/ABC-Shop-Management/images/ProductImage/c5.jpg" width="1000" height="300">&nbsp
                        <img src="/ABC-Shop-Management/images/ProductImage/c6.jpg" width="1000" height="300">
                    </marquee> 
                    <hr>
                </td>
            </tr>
            <tr> 
                <td width = "16%">
                    <?php $product1 = new Product("1", "Head Phone", "1 piece", "1.jpg", "3000");?> 
                    <?php $product2 = new Product("2", "Watch", "1 piece", "2.jpg", "5500");?> 
                    <?php $product3 = new Product("3", "Coco Oil", "250ml", "3.jpg", "180");?> 
                    <?php $product4 = new Product("4", "Red Leather Bag", "1 piece", "4.jpg", "1800");?> 
                </td>
                <td width = "16%">
                    <?php $product1 = new Product("1", "Head Phone", "1 piece", "5.jpg", "3000");?> 
                    <?php $product2 = new Product("1", "Watch", "1 piece", "9.jpg", "5500");?> 
                    <?php $product3 = new Product("1", "Coco Oil", "250ml", "3.jpg", "180");?> 
                    <?php $product4 = new Product("1", "Red Leather Bag", "1 piece", "1.jpg", "1800");?> 
                </td>
                <td width = "16%">
                    <?php $product1 = new Product("1", "Head Phone", "1 piece", "6.jpg", "3000");?> 
                    <?php $product2 = new Product("1", "Watch", "1 piece", "3.jpg", "5500");?> 
                    <?php $product3 = new Product("1", "Coco Oil", "250ml", "8.jpg", "180");?> 
                    <?php $product4 = new Product("1", "Red Leather Bag", "1 piece", "2.jpg", "1800");?> 
                </td>
                <td width = "16%">
                    <?php $product1 = new Product("1", "Head Phone", "1 piece", "7.png", "3000");?> 
                    <?php $product2 = new Product("1", "Watch", "1 piece", "4.jpg", "5500");?> 
                    <?php $product3 = new Product("1", "Coco Oil", "250ml", "3.jpg", "180");?> 
                    <?php $product4 = new Product("1", "Red Leather Bag", "1 piece", "9.jpg", "1800");?> 
                </td>
                <td width = "16%">
                    <?php $product1 = new Product("1", "Head Phone", "1 piece", "6.jpg", "3000");?> 
                    <?php $product2 = new Product("1", "Watch", "1 piece", "2.jpg", "5500");?> 
                    <?php $product3 = new Product("1", "Coco Oil", "250ml", "4.jpg", "180");?> 
                    <?php $product4 = new Product("1", "Red Leather Bag", "1 piece", "9.jpg", "1800");?> 
                </td>
            </tr>
        </table>
    </body>
</html>


<?php include "View/footer.php"; ?>