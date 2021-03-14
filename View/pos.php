<?php include "header.php"; ?>
<?php include "menuBar.php"; ?>

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(empty($_SESSION["username"])){
        header("location:login.php?ReturnUrl=hello");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])){
        session_destroy();
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title." POS"; ?></title>
    </head>
    <body>
    <table style="width:100%" >
            <tr style="vertical-align:top">
                <td width = "18%"> 
                    <?php $menu1 = new MenuBar("Our Own Product", "/ABC-Shop-Management/view/pos.php", "https://img.icons8.com/pastel-glyph/20/000000/shop--v2.png");?> 
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
                <td width = "82%">
                    <?php include "addProductForm.php"; ?>
                </td>
            </tr>
            
        </table>
    </body>
</html>



<?php include "footer.php"; ?>