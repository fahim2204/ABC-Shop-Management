<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:login.php");
}
if (!empty($_SESSION["usertype"])) {
    if ($_SESSION["usertype"] != "customer") {
        header("location:/view/error.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Customer</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0b6de5c2ec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- ____same css is used for all type of user.____ -->
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <!-- same css is used for all type of user. -->
    <link rel="stylesheet" type="text/css" href="/css/customer-profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/customer/menu-bar.php'); ?>
            </nav>
            <main>
                <div class="customer-profile-container">
                    <div class="personal-info">
                        <div class="items">
                            <label for="name">Full Name:</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="items">
                            <label class="required">Gender:</label>
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Other</label>
                        </div>
                        <div class="items">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob">
                        </div>
                        <div class="items">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="items">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="items">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address"></textarea>
                        </div>
                        <div class="items">
                            <label>Phone:</label>
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="items">
                            <label for="pName" class="required">Product Name:</label>
                            <span class="tooltip">
                                <input type="text" id="pName" name="pName" placeholder="Product Name">
                                <span id="lb-pName">Write valid Product Name!!</span>
                            </span>
                        </div>
                    </div>
                    <div class="personal-image">
                        <label for="fileToUpload" class="required">Profile Image:</label>
                        <div class="image">
                            <span class="tooltip">
                                <img id="profileImage" src="https://img.icons8.com/wired/64/000000/no-image.png" height="180px" width="180px" alt="product-Image" />
                                <span id="lb-pimage">Select an Image!!</span>
                            </span>
                        </div>
                        <div class="upload-btn">
                            <input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
                            <!-- Hidden container is used for changing with JS and recognized by PHP -->
                            <input type="hidden" id="hiddencontainer" name="hiddencontainer" value="10" />
                        </div>
                        <div class="items" id="itemButton">
                            <input type="reset" name="reset" id="reset" value="Reset" />
                            <input onclick="return AddProductFormValidation()" type="submit" name="submit" id="submit" value="Add" />
                        </div>
                    </div>
                </div>

            </main>
            <footer>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'); ?>
            </footer>
        </div>
    </div>
    <script>
        function readURL(input) {
            var myhidden = document.getElementById("hiddencontainer");
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profileImage')
                        .attr('src', e.target.result)
                        .width(180)
                        .height(180);
                    myhidden.value = 20;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>