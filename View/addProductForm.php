<?php
    $pname = $category = $brand = $stock = $quantity = $price = $details = "";
    $ValidateAllField = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset']))
    {
        unset($_post);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
        {
            $pname = $_REQUEST["pname"];
            $category = $_REQUEST["category"];
            $brand = $_REQUEST["brand"];
            $stock = $_REQUEST["stock"];
            $quantity = $_REQUEST["quantity"];
            $price = $_REQUEST["price"];
            $details = $_REQUEST["details"];

            if(empty($pname) || empty($category) || empty($brand) || empty($stock) || empty($quantity)|| empty($price) || empty($details))
            {
                $ValidateAllField = "Please Fillup All The Field!!";
            }else{                
                include_once("../control/saveProductData.php");
                $pname = $category = $brand = $stock = $quantity = $price = $details = "";
                unset($_post);
            }
        }

?>

<!DOCTYPE html>
<html>
    <body>
        <br><br><br>
        <h3><table style="width:100%">
            <tr>
                <td width="10%">&nbsp</td>
                <td width="50%">
                    <form value="Add Product" action="?page=addProduct" method="POST"> 
                        <table>
                            <tr>
                                <td>
                                    <label>Product Name:</label>
                                </td>
                                <td>
                                    <input type="text" id="pname" name="pname" placeholder="Product Name" value="<?php echo $pname;?>">
                                </td>
                            </tr>
                            <tr></tr><tr></tr><tr></tr>
                            <tr>
                                <td>
                                    <label>Category:</label>
                                </td>
                                <td>
                                    <input type="text" id="category" name="category" placeholder="Category" value="<?php echo $category;?>">
                                </td>
                            </tr>
                            <tr></tr><tr></tr><tr></tr>
                            <tr>
                                <td>
                                    <label>Brand:</label>
                                </td>
                                <td>
                                    <input type="text" id="brand" name="brand" placeholder="Brand" value="<?php echo $brand;?>">
                                </td>
                            </tr>
                            <tr></tr><tr></tr><tr></tr>
                            <tr>
                                <td>
                                    <label>Opening Stock:</label>
                                </td>
                                <td>
                                    <input type="text" id="stock" name="stock" placeholder="Stock" value="<?php echo $stock;?>">
                                </td>
                            </tr>
                            <tr></tr><tr></tr><tr></tr>
                            <tr>
                                <td>
                                    <label>Quantity:</label>
                                </td>
                                <td>
                                    <input type="text" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo $quantity;?>">
                                </td>
                            </tr>
                            <tr></tr><tr></tr><tr></tr>
                            <tr>
                                <td>
                                    <label>Price:</label>
                                </td>
                                <td>
                                    <input type="text" id="price" name="price" placeholder="Price" value="<?php echo $price;?>">
                                </td>
                            </tr>
                            <tr></tr><tr></tr><tr></tr>
                            <tr>
                                <td>
                                    <label>Details:</label>
                                </td>
                                <td>
                                    <textarea id="details" name="details" rows="4" cols="30"><?php echo $details;?></textarea>
                                </td>
                            </tr>
                            <tr></tr><tr></tr><tr></tr>
                            <tr>
                                <td align="center"> 
                                    <input type="submit" name="reset" id="reset" value="Reset">
                                    <input type="submit" name="submit" id="submit" value="Add">
                                </td>
                                <td>
                                    <?php echo $ValidateAllField; ?>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td width="40%">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
            </tr>
        </h3></table>
        
    </body>
</html>