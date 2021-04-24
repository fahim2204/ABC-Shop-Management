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
            <li><a href='/view/manager/index.php'><span class="fa fa-home"></span>Dashboard</a></li>
            <li><a href='/view/manager/manage-salesperson.php'><span class="fa fa-gear"></span>Manage Salesperson</a></li>
            <li><a href='/view/manager/manage-customer.php'><span class="fas fa-diagnoses"></span>Manage Customer</a></li>
            <li><a href='/view/manager/manage-complaint.php'><span class="fas fa-angry"></span>Manage Complaint</a></li>
            <li><a href='/view/manager/manage-category.php'><span class="fas fa-bahai"></span>Manage Categories</a></li>
            <li><a href='/view/manager/manage-brand.php'><span class="far fa-copyright"></span>Manage Brands</a></li>
            <li><a href='#message'><span class="fas fa-print"></span>Report</a></li>
            <li><a href='/view/change-password.php'><span class="fas fa-user-cog"></span>Change Password</a></li>
            <li><a href='/view/login.php?logout=true'><span class="fas fa-sign-out-alt"></span>Logout</a></li>
        </ul>
    </div>
</body>

</html>