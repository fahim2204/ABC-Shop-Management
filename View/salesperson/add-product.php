<?php
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("location:/view/login.php");
}
if (!empty($_SESSION["usertype"])) {
    if ($_SESSION["usertype"] != "salesperson") {
        header("location:/view/error.php");
    }
}
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/control/product-add-validator.php');
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Add Products</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/sales-page.css">
    <script src="/js/sales-person-page-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/add-product-form.css">
    <script src="/js/jquery.min.js"></script>


</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/salesperson/menu-bar.php'); ?>
            </nav>
            <main>
                <div id="manual-form-container">
                    <div id="form-title">
                        <h1>Add Product</h1>
                    </div>
                    <div id="form-body">
                        <form id="add-product" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                            <div id="form-body-main">
                                <div class="form-label-n-text">
                                    <div class="items" id="item1">
                                        <label for="pName" class="required">Product Name:</label>
                                        <span class="tooltip">
                                            <input type="text" id="pName" name="pName" placeholder="Product Name">
                                            <span id="lb-pName">Write valid Product Name!!</span>
                                        </span>
                                    </div>
                                    <div class="items" id="item3">
                                        <label for="pCategory" class="required">Category:</label>
                                        <span class="tooltip">
                                            <select name="pCategory" id="pCategory">
                                                <option selected disabled>---Select---</option>
                                                <?php
                                                $dbTry = new database();
                                                $conObj = $dbTry->OpenConn();
                                                $categories = $dbTry->RetrieveCategories($conObj);
                                                while ($row = $categories->fetch_assoc()) {
                                                echo '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
                                                } 
                                                ?>
                                            </select>
                                            <span id="lb-pCategory">Select Product Category!!</span>
                                        </span>
                                    </div>
                                    <div class="items" id="item4">
                                        <label for="pBrand" class="required">Brand:</label>
                                        <span class="tooltip">
                                            <select name="pBrand" id="pBrand">
                                                <option selected disabled>---Select---</option>
                                                <?php
                                                $dbTry = new database();
                                                $conObj = $dbTry->OpenConn();
                                                $categories = $dbTry->RetrieveBrands($conObj);
                                                while ($row = $categories->fetch_assoc()) {
                                                echo '<option value="'.$row["bname"].'">'.$row["bname"].'</option>';
                                                } 
                                                ?>
                                            </select>
                                            <span id="lb-pBrand">Select Product Brand!!</span>
                                        </span>
                                    </div>
                                    <div class="items" id="item5">
                                        <label for="pQuantity" class="required">Quantity:</label>
                                        <span class="tooltip">
                                            <input type="text" id="pQuantity" name="pQuantity" placeholder="Quantity">
                                            <span id="lb-pQuantity">Write valid Quantity!!</span>
                                        </span>
                                    </div>
                                    <div class="items" id="item2">
                                        <label for="pstock" class="required">Opening Stock:</label>
                                        <span class="tooltip">
                                            <input type="text" id="pstock" name="pstock" placeholder="Opening Stock">
                                            <span id="lb-pstock">Must be a Number!!</span>
                                        </span>
                                    </div>
                                    <div class="items" id="item6">
                                        <label for="pPrice" class="required">Unit Price:</label>
                                        <span class="tooltip">
                                            <input type="text" id="pPrice" name="pPrice" placeholder="Unit Price">
                                            <span id="lb-pPrice">Must be a Number!!</span>
                                        </span>
                                    </div>
                                    <div class="items" id="item7">
                                        <label for="pCost" class="required">Unit Cost:</label>
                                        <span class="tooltip">
                                            <input type="text" id="pCost" name="pCost" placeholder="Unit Cost">
                                            <span id="lb-pCost">Must be a Number!!</span>
                                        </span>
                                    </div>
                                    <div class="items" id="item8">
                                        <label for="pDetails" class="required">Product Details:</label>
                                        <span class="tooltip">
                                            <!-- <input type="text" id="pDetails" name="pDetails" placeholder="Product Details"> -->
                                            <textarea name="pDetails" id="pDetails" placeholder="Product Details" cols="30" rows="10"></textarea>
                                            <span id="lb-pDetails">Can't Leave This Empty!!</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="image-n-button">
                                    <label for="fileToUpload" class="required">Product Image:</label>
                                    <div class="image">
                                        <span class="tooltip">
                                            <img id="productImage" src="https://img.icons8.com/wired/64/000000/no-image.png" height="180px" width="180px" alt="product-Image" />
                                            <span id="lb-pimage">Select an Image!!</span>
                                        </span>
                                    </div>
                                    <?php echo $imageErr; ?>
                                    <div class="upload-btn">
                                        <input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
                                        <!-- Hidden container is used for changing with JS and recognized by PHP -->
                                        <input type="hidden" id="hiddencontainer" name="hiddencontainer" value="10" />
                                    </div>
                                    <?php echo $validationErr; ?>
                                    <div class="items" id="itemButton">
                                        <input type="reset" name="reset" id="reset" value="Reset" />
                                        <input onclick="return AddProductFormValidation()" type="submit" name="submit" id="submit" value="Add" />
                                    </div>
                                </div>
                            </div>
                        </form>
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
                    $('#productImage')
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