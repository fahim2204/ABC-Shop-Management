<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
extract($_POST);
////////////////////////////


<div class="table">
<div class="row header green">
  <div class="cell">
  Product Name
  </div>
  <div class="cell">
  Product Category
  </div>
  <div class="cell">
  Product Brand
  </div>
  <div class="cell">
  Product Quantity
  </div>
  <div class="cell">
  Unit Price
  </div>
  <div class="cell">
  Cost Price
  </div>
  <div class="cell">
  Stock
  </div>
  <div class="cell">
  Details
  </div>
  <div class="cell">
  Action
  </div>
</div>

<div class="row">
  <div class="cell" data-title="Product">
    Solid oak work table
  </div>
  <div class="cell" data-title="Unit Price">
    $800
  </div>
  <div class="cell" data-title="Quantity">
    10
  </div>
  <div class="cell" data-title="Date Sold">
    03/15/2014
  </div>
  <div class="cell" data-title="Status">
    Waiting for Pickup
  </div>
</div>

</div>






//////////_______For catagory CRUD_______//////////

if (isset($_POST['record'])) {
    $tableData = '<table class="categories-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Brand</th>
                            <th>Product Quantity</th>
                            <th>Unit Price</th>
                            <th>Cost Price</th>
                            <th>Stock</th>
                            <th>Details</th>
                            <th id="t2" colspan="2">Action</th>
                        </tr>
                    </thead>';
    $dbTry = new database();
    $conObj = $dbTry->OpenConn();
    $categories = $dbTry->RetrieveProducts($conObj);

    while ($row = $categories->fetch_assoc()) {
        $pName = $row["pname"];
        $pId = $row["pid"];
        $pCat = $row["pcategory"];
        $pBrand = $row["pbrand"];
        $pQuantity = $row["pquantity"];
        $uprice = $row["uprice"];
        $ucost = $row["ucost"];
        $pstock = $row["pstock"];
        $pdetails = $row["pdetails"];

        
        $tableData .= '<tbody>
                <tr>
                    <td>' . $pName . '</td>
                    <td>' . $pCat . '</td>
                    <td>' . $pBrand . '</td>
                    <td>' . $pQuantity . '</td>
                    <td>' . $uprice . '</td>
                    <td>' . $ucost . '</td>
                    <td>' . $pstock . '</td>
                    <td>' . $pdetails . '</td>
                    <td><a class="edit" onclick="SetData(' . $pId . ',`' . $pName . '`)">Edit</a></td>
                    <td><a class="delete" onclick="DeleteData(' . $pId . ')">Delete</a></td>
                </tr>';
    }
    $tableData .= '</tbody>
                </table>';
    echo $tableData;
}

if (isset($_POST['addData'])) {
    $cname = $_REQUEST['addData'];
    if (empty($cname)) {
        echo "Please Insert Valid data";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->InsertCategory($conObj, $cname);
        echo $result;
        $dbObj->CloseConn($conObj);
    }
}
if (isset($_POST['deleteData'])) {
    $cid = $_REQUEST['deleteData'];

    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result = $dbObj->DeleteCategory($conObj, $cid);
    $dbObj->CloseConn($conObj);
}
if (isset($_POST['updateData'])) {
    $cid = $_REQUEST['updateData'];
    $cname = $_REQUEST['upCname'];
    if (empty($cname)) {
        echo "Please Insert Valid data";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->UpdateCategory($conObj, $cid, $cname);
        echo $result;
        $dbObj->CloseConn($conObj);
    }
}
//////////_______For Brand CRUD_______//////////

if (isset($_POST['brandRecord'])) {
    $tableData = '<table class="categories-table">
                    <thead>
                        <tr>
                            <th id="t1">Brand</th>
                            <th id="t2" colspan="2">Action</th>
                        </tr>
                    </thead>';
    $dbTry = new database();
    $conObj = $dbTry->OpenConn();
    $categories = $dbTry->RetrieveBrands($conObj);

    while ($row = $categories->fetch_assoc()) {
        $bName = $row["bname"];
        $bId = $row["bid"];
        $tableData .= '<tbody>
                <tr>
                    <td>' . $bName . '</td>
                    <td><a class="edit" onclick="SetData(' . $bId . ',`' . $bName . '`)">Edit</a></td>
                    <td><a class="delete" onclick="DeleteData(' . $bId . ')">Delete</a></td>
                </tr>';
    }
    $tableData .= '</tbody>
                </table>';
    echo $tableData;
}

if (isset($_POST['brandAddData'])) {
    $bname = $_REQUEST['brandAddData'];
    if (empty($bname)) {
        echo "Please Insert Valid data";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->InsertBrand($conObj, $bname);
        echo $result;
        $dbObj->CloseConn($conObj);
    }
}
if (isset($_POST['brandDeleteData'])) {
    $bid = $_REQUEST['brandDeleteData'];

    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result = $dbObj->DeleteBrand($conObj, $bid);
    $dbObj->CloseConn($conObj);
}
if (isset($_POST['brandUpdateData'])) {
    $bid = $_REQUEST['brandUpdateData'];
    $bname = $_REQUEST['brandUpCname'];
    if (empty($bname)) {
        echo "Please Insert Valid data";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->UpdateBrand($conObj, $bid, $bname);
        echo $result;
        $dbObj->CloseConn($conObj);
    }
}
if (isset($_POST['DashData'])) {

    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result = array();
    $result['brand'] = $dbObj->TotalBrand($conObj)->fetch_assoc()['COUNT(*)'];
    $result['category'] = $dbObj->TotalCategory($conObj)->fetch_assoc()['COUNT(*)'];
    echo json_encode($result);
    $dbObj->CloseConn($conObj);
}