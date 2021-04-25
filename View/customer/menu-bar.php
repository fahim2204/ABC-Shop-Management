<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/home-user-menu.css">
    <script src="/js/menu-expander.js"></script>
    <script src="https://kit.fontawesome.com/0b6de5c2ec.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="menu-container">
        <div class="user-profile">
            <span id="user-image">
                <img src="https://img.icons8.com/bubbles/80/000000/user-male.png" />
            </span>
            <span id="user-name">
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (!empty($_SESSION["username"])) {
                    echo '<h2>' . $_SESSION["name"] . '</h2>';
                    echo '<h5>' . $_SESSION["usertype"] . '</h5>';
                }
                ?>
            </span>
        </div>
        <ul>
            <li><a href='/view/customer/index.php'><span class="fa fa-home"></span>My Profile</a></li>
            <li><a href='#message'><span class="fa fa-gear"></span>My Order</a></li>
            <li><a href='/view/customer/cart.php'><span class="fas fa-diagnoses"></span>My Cart</a></li>
            <li><a href='#message'><span class="fas fa-angry"></span>My Wishlist</a></li>
            <li><a href='#message'><span class="far fa-copyright"></span>My Reviews</a></li>
            <li><a href='#message'><span class="fas fa-print"></span>Raise Complaint</a></li>
            <li><a href='/view/change-password.php'><span class="fas fa-user-cog"></span>Change Password</a></li>
            <li><a href='/view/login.php?logout=true'><span class="fas fa-sign-out-alt"></span>Logout</a></li>
        </ul>
    </div>
</body>

</html>