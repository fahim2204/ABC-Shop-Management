<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shop - Sales</title>
    <link rel="icon" href="/images/icon/shoplogo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/SalesPage.css">
</head>

<body>
    <div class="window-container">
        <div id="sale-container">
            <header>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/view/header.php'); ?>
            </header>
            <nav>
                <div id="menu-container">
                    <div class="user-profile">
                        <span id="user-image">
                            <img src="https://img.icons8.com/bubbles/80/000000/user-male.png" />
                        </span>
                        <span id="user-name">
                            <h3>User Name</h3>
                        </span>
                    </div>
                    <ul>
                        <li><a href='#message'><span class="fa fa-home"></span>Dashboard</a></li>
                        <li><a href='#message'><span class="fa fa-sale"></span>POS</a></li>
                        <li class='sub-menu' id="Purchase" onclick="ExpandSubMenu(this)"><a href='javascript:void(0)'><span class="fas fa-seedling"></span>Purchase<span class='fa fa-caret-right'></span></a>
                            <ul>
                                <li><a href='#settings'><span class="fas fa-apple-alt"></span>Add Purchase</a></li>
                                <li><a href='#settings'><span class="fas fa-carrot"></span>Mange Purchase</a></li>
                            </ul>
                        </li>
                        <li><a href='#message'><span class="fa fa-home"></span>Stock</a></li>
                        <li class='sub-menu' id="Product" onclick="ExpandSubMenu(this)"><a href='javascript:void(0)'><span class="fa fa-car"></span>Products<span class='fa fa-caret-right'></span></a>
                            <ul>
                                <li><a href='#' id="addProduct"><span class="fa fa-user"></span>Add Product</a></li>
                                <li><a href='#'><span class="fa fa-key"></span>Manage Products</a></li>

                            </ul>
                        </li>
                        <li class='sub-menu' id="Category" onclick="ExpandSubMenu(this)"><a href='javascript:void(0)'><span class="fa fa-car"></span>Categories<span class='fa fa-caret-right'></span></a>
                            <ul>
                                <li><a href='#settings'><span class="fa fa-user"></span>Add Category</a></li>
                                <li><a href='#settings'><span class="fa fa-key"></span>Manage Categories</a></li>
                            </ul>
                        </li>

                        <li class='sub-menu' id="Brand" onclick="ExpandSubMenu(this)"><a href='javascript:void(0)'><span class="fa fa-car"></span>Brands<span class='fa fa-caret-right'></span></a>
                            <ul>
                                <li><a href='#settings'><span class="fa fa-user"></span>Add Brand</a></li>
                                <li><a href='#settings'><span class="fa fa-key"></span>Manage Brands</a></li>
                            </ul>
                        </li>
                        <li class='sub-menu' id="Expense" onclick="ExpandSubMenu(this)"><a href='javascript:void(0)'><span class="fa fa-car"></span>Expenses<span class='fa fa-caret-right'></span></a>
                            <ul>
                                <li><a href='#settings'><span class="fa fa-user"></span>Add Expense</a></li>
                                <li><a href='#settings'><span class="fa fa-key"></span>Manage Expenses</a></li>
                            </ul>
                        </li>
                        <li><a href='#message'><span class="fa fa-car"></span>Report</a></li>
                        <li><a href='#message'><span class="fa fa-car"></span>Settings</a></li>
                        <li><a href='#message'><span class="fa fa-car"></span>Logout</a></li>
                    </ul>
                </div>
            </nav>
            <main>
                <div id="manual-form-container">
                    <div id="form-title">
                        <h1>Add Product</h1>
                    </div>
                    <div id="form-body">
                        <form action="" class="registration">
                            <div id="form-body-main">
                                <div class="items" id="item1">
                                    <label for="pName" class="required">Product Name:</label>
                                    <span class="tooltip">
                                        <input type="text" id="pName" name="pName" placeholder="Product Name">
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                <div class="items" id="item2">
                                    <label for="pCode" class="required">Product Code:</label>
                                    <span class="tooltip">
                                        <input type="text" id="pCode" name="pCode" placeholder="Product Code">
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                <div class="items" id="item3">
                                    <label for="pCategory" class="required">Category:</label>
                                    <span class="tooltip">
                                        <select name="pCategory" id="pCategory">
                                            <option value="1">Fruits</option>
                                            <option value="2">Fish</option>
                                            <option value="3">Drinks</option>
                                            <option value="4">Chocolate</option>
                                        </select>
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                <div class="items" id="item4">
                                    <label for="pBrand" class="required">Brand:</label>
                                    <span class="tooltip">
                                        <select name="pBrand" id="pBrand">
                                            <option value="1">Pran</option>
                                            <option value="2">Lux</option>
                                            <option value="3">Nescafe</option>
                                            <option value="4">Vision</option>
                                        </select>
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                
                                <div class="items" id="item5">
                                    <label for="pQuantity" class="required">Quantity:</label>
                                    <span class="tooltip">
                                        <input type="text" id="pQuantity" name="pQuantity" placeholder="Quantity">
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                <div class="items" id="item6">
                                    <label for="pPrice" class="required">Unit Price:</label>
                                    <span class="tooltip">
                                        <input type="text" id="pPrice" name="pPrice" placeholder="Unit Price">
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                <div class="items" id="item7">
                                    <label for="pCost" class="required">Unit Cost:</label>
                                    <span class="tooltip">
                                        <input type="text" id="pCost" name="pCost" placeholder="Unit Cost">
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                <div class="items" id="item8">
                                    <label for="pDetails" class="required">Product Details:</label>
                                    <span class="tooltip">
                                        <input type="text" id="pDetails" name="pDetails" placeholder="Product Details">
                                        <span id="lb-name">Write Name on Here!!</span>
                                    </span>
                                </div>
                                
                                
                                <div class="items" id="itemButton">
                                    <input type="reset" name="reset" id="reset" value="Reset">
                                    <input type="submit" name="submit" id="submit" value="Add">
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
        // document.getElementById('addProduct').onclick = function() {
        //     alert("Hello");
        // }

        function ExpandSubMenu(id) {
            var child = id.children;
            for (var i = 0; i < child.length; i++) {
                if (child[i].tagName == "UL" && child[i].style['visibility'] == "visible") {
                    child[i].style['opacity'] = "0";
                    child[i].style['position'] = "absolute";
                    child[i].style['visibility'] = "hidden";
                    child[i].style['z-index'] = "-2";
                    id.style['background-color'] = "#26abd6";
                } else {
                    child[i].style['opacity'] = "1";
                    child[i].style['position'] = "relative";
                    child[i].style['visibility'] = "visible";
                    child[i].style['z-index'] = "3";
                    // id.addEventListener('focus', id.style['background-color'] = "black");
                    id.style['background-color'] = "black";
                }
            }



        }
    </script>
</body>

</html>