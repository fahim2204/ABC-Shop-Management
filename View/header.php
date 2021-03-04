<?php $title = "ABC Shop - "; ?>
<!DOCTYPE html>
<html>
    <head>
    <link rel = "icon" href="/ABC-Shop-Management/images/ShopLogo.png" type = "image/x-icon"> 
    </head>

  
    <body>
        <table style="width:100%">
            <tr>
                <td><a href="/ABC-Shop-Management/index.php"><img height="60px" width="100px" src="/ABC-Shop-Management/images/ShopLogo.png"></a></td>
                <td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp</td>
                <td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp</td>
                <td>
                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                        <input type="text" id="searchtxt" name="searchtxt" placeholder="Search" size="60">
                        <input type="submit" name="search" value="Search">    
                    </form>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp</td>
                <td style="text-align:right">
                    <a href="/ABC-Shop-Management/view/registration.php">Register</a>
                </td>
                <td>|</td>
                <td style="text-align:center">
                   <a href="/ABC-Shop-Management/view/login.php">Login</a>
                </td>
                <td>|</td>
                <td><a href="/ABC-Shop-Management/view/favourite.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/hearts.png"/></a></td>
                <td>|</td>
                <td><a href="/ABC-Shop-Management/view/cart.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/shopping-cart.png"/></a></td>
                <td>|</td>
                <td><a href="/ABC-Shop-Management/view/profile.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/user-male-circle.png"/></a></td>
            </tr>
        </table>


    </body>

   
</html>