<?php
if (!isset($_SESSION)) {
    session_start();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/header.css">
    <script src="/js/jquery.min.js"></script>

</head>

<body>
    <div id="header-window-container">
        <div id="header-container">

            <div id="header-item-1">
                <a id="shopLogoLink" href="/index.php"><img id="shopLogo" src="/images/ShopLogo.png" alt="Shop-Logo"></a>
            </div>
            <div id="header-item-2">
                <input type="text" id="searchtxt" placeholder="Search Product">
                <div id="suggesstion-box"></div>
            </div>
            <div id="header-item-3">
                <div class="child-item-3">
                    <!-- <a href="/view/customer/favourite.php"><img class="header-link" src="https://img.icons8.com/ios-glyphs/40/000000/hearts.png" alt="favourite" /></a> -->
                </div>
                <div class="child-item-3">
                    <?php
                    if (empty($_SESSION['username']) || $_SESSION['usertype'] == "customer") {
                        echo '<a href="/view/customer/cart.php"><img class="header-link" src="https://img.icons8.com/ios-glyphs/40/000000/shopping-cart.png" alt="cart" /></a>';
                    } ?>
                </div>
                <div id="profile-link">
                    <?php
                    //////////_________Redirect User to their Own Page_________///////
                    if (isset($_SESSION['username'])) {
                        if ($_SESSION['usertype'] == "manager") {
                            echo '<a href="/view/manager"><img class="header-link" src="https://img.icons8.com/ios-glyphs/40/000000/user-male-circle.png" alt="profile" /></a>';
                        } elseif ($_SESSION['usertype'] == "salesperson") {
                            echo '<a href="/view/salesperson"><img class="header-link" src="https://img.icons8.com/ios-glyphs/40/000000/user-male-circle.png" alt="profile" /></a>';
                        } elseif ($_SESSION['usertype'] == "admin") {
                            echo '<a href="/view/admin"><img class="header-link" src="https://img.icons8.com/ios-glyphs/40/000000/user-male-circle.png" alt="profile" /></a>';
                        } elseif ($_SESSION['usertype'] == "customer") {
                            echo '<a href="/view/customer"><img class="header-link" src="https://img.icons8.com/ios-glyphs/40/000000/user-male-circle.png" alt="profile" /></a>';
                        }
                    } else {
                        echo '<a href="/view/login.php"><img class="header-link" src="https://img.icons8.com/ios-glyphs/40/000000/user-male-circle.png" alt="profile" /></a>';
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (empty($_SESSION["username"])) {
                    ?>
                        <div id="child-item-a">
                            <a class="header" href="/view/login.php">Login</a>
                            <a class="header" href="/view/registration.php">Register</a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div id="child-item-b">
                            <a class="header" href="/view/login.php?logout=true"><img src="https://img.icons8.com/material-outlined/30/000000/export.png" /></a>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#searchtxt").keyup(function() {

                $.ajax({
                    type: "POST",
                    url: "/control/search-suggestion-data-connector.php",
                    data: 'keyword=' + $(this).val(),
                    beforeSend: function() {
                        $("#searchtxt").css("background", "#FFF url(https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif) no-repeat 20px 160px");
                    },
                    success: function(data) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#searchtxt").css("background", "#FFF");
                        if ($("#searchtxt").val() == "") {
                            $("#suggesstion-box").hide();
                        }
                    }
                });
            });
        });

        function selectList(val) {
            $("#searchtxt").val(val);
            $("#suggesstion-box").hide();
            $("#searchtxt").focus();
        }
        $('#searchtxt').keypress(function(e) {
            var qu = $('#searchtxt').val();
            var key = e.which;
            if (key == 13) // the enter key code
            {
                location.replace("/view/search.php?query=" + qu);
            }
        });
    </script>

</body>

</html>