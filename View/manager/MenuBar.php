<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/HomeUserMenu.css">
    <script src="/js/MenuExpander.js"></script>
    <script src="https://kit.fontawesome.com/0b6de5c2ec.js" crossorigin="anonymous"></script>


</head>

<body>
    <div id="menu-container">
        <div class="user-profile">
            <span id="user-image">
                <img src="https://img.icons8.com/bubbles/80/000000/user-male.png" />
            </span>
            <span id="user-name">
                <span id="user-name">
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (!empty($_SESSION["username"])) {
                        echo '<h3>' . $_SESSION["username"] . '</h3>';
                    }
                    ?>

                </span>
            </span>
        </div>
        <ul>
            <li><a href='index.php'><span class="fa fa-home"></span>Dashboard</a></li>
            <li><a href='#message'><span class="fa fa-gear"></span>Manage Salesperson</a></li>
            <li><a href='#message'><span class="fas fa-diagnoses"></span>Manage Customer</a></li>
            <li><a href='#message'><span class="fas fa-angry"></span>Manage Complaint</a></li>
            <li><a href='ManageCategory.php'><span class="fas fa-bahai"></span>Manage Categories</a></li>
            <li><a href='ManageBrand.php'><span class="far fa-copyright"></span>Manage Brands</a></li>
            <li><a href='#message'><span class="fas fa-print"></span>Report</a></li>
            <li><a href='#message'><span class="fas fa-user-cog"></span>Change Password</a></li>
            <li><a href='/view/login.php?logout=true'><span class="fas fa-sign-out-alt"></span>Logout</a></li>
        </ul>
    </div>
</body>

</html>