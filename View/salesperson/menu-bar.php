<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- One CSS for all type of USer -->
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
            <li><a href='/view/salesperson/index.php'><span class="fa fa-home"></span>Dashboard</a></li>
            <li><a href='/view/salesperson/pos.php'><span class="fa fa-gear"></span>POS</a></li>
            <li class='sub-menu' id="Product" onclick="ExpandSubMenu(this)"><a href='javascript:void(0)'><span class="fa fa-car"></span>Products<span class='fa fa-caret-right'></span></a>
                <ul>
                    <li><a href='/view/salesperson/add-product.php' id="addProduct"><span class="fa fa-user"></span>Add Product</a></li>
                    <li><a href='/view/salesperson/manage-product.php'><span class="fa fa-key"></span>Manage Products</a></li>

                </ul>
            </li>
            <li class='sub-menu' id="Expense" onclick="ExpandSubMenu(this)"><a href='javascript:void(0)'><span class="fa fa-angry"></span>Expenses<span class='fa fa-caret-right'></span></a>
                <ul>
                    <li><a href='#settings'><span class="fa fa-user"></span>Add Expense</a></li>
                    <li><a href='#settings'><span class="fa fa-key"></span>Manage Expenses</a></li>
                </ul>
            </li>
            <li><a href='#message'><span class="fa fa-print"></span>Report</a></li>
            <li><a href='/view/change-password.php'><span class="fas fa-user-cog"></span>Change Password</a></li>
            <li><a href='/view/login.php?logout=true'><span class="fas fa-sign-out-alt"></span>Logout</a></li>
        </ul>
    </div>

</body>

</html>