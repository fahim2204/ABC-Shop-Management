<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
extract($_POST);

//////////_______For Products CRUD_______//////////

if (isset($_POST['record'])) {
    $tableData = '<table class="product-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Stock</th>
                            <th>Unit Price</th>
                            <th>Cost Price</th>
                            <th>Details</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>';
    $dbTry = new database();
    $conObj = $dbTry->OpenConn();
    $categories = $dbTry->RetrieveProductsAsc($conObj);

    while ($row = $categories->fetch_assoc()) {
        $pName = $row["pname"];
        $pId = $row["pid"];
        $pCat = $row["pcategory"];
        $pBrand = $row["pbrand"];
        $pQuantity = $row["pquantity"];
        $pstock = $row["pstock"];
        $uprice = $row["uprice"];
        $ucost = $row["ucost"];
        $pdetails = $row["pdetails"];


        $tableData .= '<tbody>
                <tr>
                    <td>' . $pName . '</td>
                    <td>' . $pCat . '</td>
                    <td>' . $pBrand . '</td>
                    <td>' . $pQuantity . '</td>
                    <td>' . $pstock . '</td>
                    <td>' . $uprice . '</td>
                    <td>' . $ucost . '</td>
                    <td id="detail">' . $pdetails . '</td>
                    <td><a class="edit" onclick="ShowPopUp(' . $pId . ',`' . $pName . '`,`' . $pCat . '`,`' . $pBrand . '`,`' . $pQuantity . '`,`' . $uprice . '`,`' . $ucost . '`,`' . $pstock . '`,`' . $pdetails . '`)">Edit</a></td>
                    <td><a class="delete" onclick="DeleteData(' . $pId . ')">Delete</a></td>
                </tr>';
    }
    $tableData .= '</tbody>
                </table>';
    echo $tableData;
}


// for salesman POS Page

if (isset($_POST['salespos'])) {
    $Query = $_REQUEST['query'];
    $dbTry = new database();
    $conObj = $dbTry->OpenConn();
    $categories = $dbTry->RetrieveProductsBySrcName($conObj, $Query);

    while ($row = $categories->fetch_assoc()) {

?>
        <div class="product-container" onclick="AddSelected(<?php echo $row['pid'] . ',`' . $row['pname'] . '`,`' . $row['uprice'] . '`' ?>)">
            <div class="product-image-container">
                <img src="<?php
                            $imagePath = $_SERVER['DOCUMENT_ROOT'] . "/images/product-image/" . $row['pimage'];
                            if (file_exists($imagePath)) {
                                echo '/images/product-image/' . $row['pimage'] . '';
                            } else {
                                echo '/images/icon/no-image.png';
                            } ?>" alt="">
            </div>
            <div class="product-name">
                <?php echo $row['pname'] ?>
            </div>
            <div class="product-quantity">
                <?php echo $row['pquantity'] ?>
                <span class="divider">|</span>
                <span>৳</span><?php echo $row['uprice'] ?>
            </div>
        </div>

<?php }
}



if (isset($_POST['update'])) {
    $pId = $_REQUEST['pId'];
    $pName = $_REQUEST['pName'];
    $pCat = $_REQUEST['pCat'];
    $pBrand = $_REQUEST['pBrand'];
    $pstock = $_REQUEST['pstock'];
    $pQuantity = $_REQUEST['pQuantity'];
    $uprice = $_REQUEST['uprice'];
    $ucost = $_REQUEST['ucost'];
    $pdetails = $_REQUEST['pdetails'];
    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result = $dbObj->UpdateProduct($conObj, $pId, $pName, $pCat, $pBrand, $pstock, $pQuantity, $uprice, $ucost, $pdetails);
    echo $result;
    $dbObj->CloseConn($conObj);
}

if (isset($_POST['deleteData'])) {
    $cid = $_REQUEST['deleteData'];

    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result = $dbObj->DeleteProduct($conObj, $cid);
    $dbObj->CloseConn($conObj);
}



// For Sales POS Temporary cart

if (isset($_POST['tempCart'])) {

    $pId = $_REQUEST['pid'];
    $pName = $_REQUEST['pname'];
    $uprice = $_REQUEST['uprice'];
    $found = false; //For check whether product is added
    $foundID = null;

    $data = file_get_contents('../data/temp-pos-cart.json');
    $mydata = json_decode($data);
    foreach ($mydata as $myobject) {
        foreach ($myobject as $key => $value) {
            $foundID = $myobject;
            if ($myobject->pid == $pId) {
                $found = true;
                $myobject->quantity += 1;
                $jsonData = json_encode($mydata, JSON_PRETTY_PRINT);
                file_put_contents('../data/temp-pos-cart.json', $jsonData);
                break;
            }
        }
    }
    if (!$found) {
        $formData = array(
            'pid' => $pId,
            'pname' => $pName,
            'quantity' => 1,
            'uprice' => $uprice,
            'Total' => $uprice
        );
        $existingdata = file_get_contents('../data/temp-pos-cart.json');
        $tempJsonData = json_decode($existingdata);
        $tempJsonData[] = $formData;
        $jsonData = json_encode($tempJsonData, JSON_PRETTY_PRINT);

        if (file_put_contents('../data/temp-pos-cart.json', $jsonData)) {
        } else {
            echo "Opps!! No data saved.";
        }
    }
    echo $mydata;
}
if (isset($_POST['viewTempCart'])) {
    $tabledata = 'table id="product-table">
<thead>
    <tr>
        <th>Product Name</th>
        <th>Ammount</th>
        <th>Price</th>
        <th>Total</th>
        <th>Remove</th>
    </tr>
</thead>
<tbody>';

    $data = file_get_contents('../data/temp-pos-cart.json');
    $mydata = json_decode($data);
    if ($mydata == "") {
    } else {

        foreach ($mydata as $myobject) {
            if (empty($myobject->pid)) {
                continue;
            } else {
                $tabledata .= '<tbody>
                <tr>
                    <td>' . $myobject->pname . '</td>
                    <td class="center"><button id="minus" onclick="CartMinus(`' . $myobject->pid . '`,' . $myobject->quantity . ')">-</button>' . $myobject->quantity . '<button id="plus" onclick="CartPlus(`' . $myobject->pid . '`,' . $myobject->quantity . ')">+</button></td>
                    <td >' . $myobject->uprice . '</td>
                    <td >' . $myobject->uprice * $myobject->quantity . '</td>
                    <td class="center"><button id="delete" onclick="DeleteItem(`' . $myobject->pid . '`)">X</button></td>
                </tr>';
            }
        }
    }
    $tabledata .= '</tbody>
                    </table>';
    if ($mydata == "") {
        $tabledata = "";
    }
    echo $tabledata;
}

if (isset($_POST['cartMinus'])) {
    $pid = $_REQUEST['pid'];

    $data = file_get_contents('../data/temp-pos-cart.json');
    $mydata = json_decode($data);
    foreach ($mydata as $myobject) {
        foreach ($myobject as $key => $value) {
            if ($myobject->pid == $pid) {
                $myobject->quantity -= 1;
                $jsonData = json_encode($mydata, JSON_PRETTY_PRINT);
                file_put_contents('../data/temp-pos-cart.json', $jsonData);
                break;
            }
        }
    }
}
if (isset($_POST['cartPlus'])) {
    $pid = $_REQUEST['pid'];

    $data = file_get_contents('../data/temp-pos-cart.json');
    $mydata = json_decode($data);
    foreach ($mydata as $myobject) {
        foreach ($myobject as $key => $value) {
            if ($myobject->pid == $pid) {
                $myobject->quantity += 1;
                $jsonData = json_encode($mydata, JSON_PRETTY_PRINT);
                file_put_contents('../data/temp-pos-cart.json', $jsonData);
                break;
            }
        }
    }
}
if (isset($_POST['DeleteItem'])) {
    $pid = $_REQUEST['pid'];

    $data = file_get_contents('../data/temp-pos-cart.json');
    $mydata = json_decode($data);
    foreach ($mydata as $myobject) {
        if ($myobject->pid == $pid) {
            unset($myobject->pid);
            unset($myobject->pname);
            unset($myobject->quantity);
            unset($myobject->uprice);
            unset($myobject->Total);
            $jsonData = json_encode($mydata, JSON_PRETTY_PRINT);
            file_put_contents('../data/temp-pos-cart.json', $jsonData);
            break;
        }
    }
}
// if (isset($_POST['DeleteItem'])) {
//     $pid = $_REQUEST['pid'];

//     $data = file_get_contents('../data/temp-pos-cart.json');
//     $mydata = json_decode($data);
//     foreach ($mydata as $myobject) {
//         if ($myobject->pid == $pid) {
//             unset($myobject->pid);
//             unset($myobject->pname);
//             unset($myobject->quantity);
//             unset($myobject->uprice);
//             unset($myobject->Total);
//             unset($mydata->$myobject);
//             $jsonData = json_encode($mydata, JSON_PRETTY_PRINT);
//             file_put_contents('../data/temp-pos-cart.json', $jsonData);
//             break;
//         }
//     }
// }
// unset($myobject->pid);
// unset($myobject->pname);
// unset($myobject->quantity);
// unset($myobject->uprice);
// unset($myobject->Total);