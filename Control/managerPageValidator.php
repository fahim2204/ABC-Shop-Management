<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/dbConnect.php');
extract($_POST);

//////////_______For catagory CRUD_______//////////

if (isset($_POST['record'])) {
    $tableData = '<table class="categories-table">
                    <thead>
                        <tr>
                            <th id="t1">Category</th>
                            <th id="t2" colspan="2">Action</th>
                        </tr>
                    </thead>';
    $dbTry = new database();
    $conObj = $dbTry->OpenConn();
    $categories = $dbTry->RetrieveCategories($conObj);

    while ($row = $categories->fetch_assoc()) {
        $cName = $row["cname"];
        $cId = $row["cid"];
        $tableData .= '<tbody>
                <tr>
                    <td>' . $cName . '</td>
                    <td><a class="edit" onclick="SetData(' . $cId . ',`' . $cName . '`)">Edit</a></td>
                    <td><a class="delete" onclick="DeleteData(' . $cId . ')">Delete</a></td>
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
