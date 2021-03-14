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
        <title><?php echo $title." Dashboard"; ?></title>
    </head>
    <body>
    <table style="width:100%" >
            <tr style="vertical-align:top">
                <td width = "18%"> 
                    <center>
                        <a href="?page=profile"><img src="https://img.icons8.com/wired/80/000000/user-male-circle.png"/></a><br>
                        <?php echo $_SESSION["profileData"]->name ; ?>
                    </center>
                    <br>
                    <?php $menu1 = new MenuBar("Dashboard", "?page=home", "https://img.icons8.com/material/20/000000/dashboard-layout.png");?> 
                    <?php $menu2 = new MenuBar("Add Manager", "?page=addManager", "https://img.icons8.com/carbon-copy/20/000000/womens-suit.png");?> 
                    <?php $menu3 = new MenuBar("Manage Employee", "?page=manageProduct", "https://img.icons8.com/ios-filled/20/000000/cleansing.png");?> 
                    <?php $menu5 = new MenuBar("Manage Customer", "fish.php", "https://img.icons8.com/dotty/20/000000/mobile-home.png");?> 
                    <?php $menu6 = new MenuBar("Add User", "?page=addUser", "https://img.icons8.com/material/20/000000/user-male.png");?> 
                    <?php $menu7 = new MenuBar("Supliers", "fish.php", "https://img.icons8.com/ios-filled/20/000000/orange-juice.png");?> 
                    <?php $menu8 = new MenuBar("Purchase", "fish.php","https://img.icons8.com/ios-glyphs/20/000000/sweet-halloween-candy.png");?> 
                    <?php $menu10 = new MenuBar("Setting", "?page=settings", "https://img.icons8.com/pastel-glyph/20/000000/beetroot-and-greenery.png");?> 
                    <?php $menu11 = new MenuBar("Change Password", "?page=changePassword", "https://img.icons8.com/ios-filled/20/000000/pet-commands-train.png");?> 
                </td>
                <td width = "82%">
                    <?php 
                        
                        if(empty($_GET['page'])){
                            include "salesPerson.php"; 
                        }else{
                            if($_GET['page'] == "home" ){
                                include "salesPerson.php"; 
                            }
                            if($_GET['page'] == "addManager"){
                                //include "addManager.php"; 
                                echo "We fix it later";
                            }
                            if($_GET['page'] == "profile"){
                                include "profile.php"; 
                            }
                            if($_GET['page'] == "addUser"){
                                include "addUser.php"; 
                            }
                            if($_GET['page'] == "changePassword"){
                                echo "We fix it later";
                                include "changePassword.php"; 
                            }
                        }
                        
                    ?>
                </td>
            </tr>
            
        </table>
    </body>
</html>



<?php include "footer.php"; ?>