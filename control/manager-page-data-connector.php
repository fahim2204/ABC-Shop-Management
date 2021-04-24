<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
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



// __________For Manage SalesPerson__________//////______

if (isset($_POST['addSalespersonData'])) {
    $empname = $_REQUEST['empname'];
    $username = $_REQUEST['username'];
    $emppass = $_REQUEST['emppass'];
    $empemail = $_REQUEST['empemail'];
    $empcontact = $_REQUEST['empcontact'];
    $empdob = $_REQUEST['empdob'];
    $empgender = $_REQUEST['empgender'];
    $empjoin = $_REQUEST['empjoin'];
    $empsalary = $_REQUEST['empsalary'];
    $empaddress = $_REQUEST['empaddress'];

    if (empty($empname) || empty($username) || empty($emppass) || empty($empemail) || empty($empcontact) || empty($empdob) || empty($empgender) || empty($empjoin) || empty($empsalary) || empty($empaddress)) {
        echo "Please fill up all correctly";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result1 = $dbObj->InsertUser($conObj, $empname, $username, $emppass, "salesperson");
        $result2 = $dbObj->InsertEmployee($conObj, $username, $empemail, $empcontact, $empdob, $empgender, $empjoin, $empsalary, $empaddress);
        echo $result1 . "<br>" . $result2;
        $dbObj->CloseConn($conObj);
    }
}
if (isset($_POST['updateSalespersonData'])) {
    $empname = $_REQUEST['empname'];
    $username = $_REQUEST['username'];
    $emppass = $_REQUEST['emppass'];
    $empemail = $_REQUEST['empemail'];
    $empcontact = $_REQUEST['empcontact'];
    $empdob = $_REQUEST['empdob'];
    $empgender = $_REQUEST['empgender'];
    $empjoin = $_REQUEST['empjoin'];
    $empsalary = $_REQUEST['empsalary'];
    $empaddress = $_REQUEST['empaddress'];
    $empid = $_REQUEST['empid'];
    $empfuid = $_REQUEST['empfuid'];

    if (empty($empname) || empty($username) || empty($emppass) || empty($empemail) || empty($empcontact) || empty($empdob) || empty($empgender) || empty($empjoin) || empty($empsalary) || empty($empaddress)) {
        echo "Please fill up all correctly";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result1 = $dbObj->UpdateUser($conObj, $empfuid, $empname, $username, $emppass, "salesperson");
        $result2 = $dbObj->UpdateEmployee($conObj, $empid, $empemail, $empcontact, $empdob, $empgender, $empjoin, $empsalary, $empaddress);
        echo $result1 . "<br>" . $result2;
        $dbObj->CloseConn($conObj);
    }
}

/////////////////////For Delete Employee////////////

if (isset($_POST['deleteSalespersonData'])) {
    $empid = $_REQUEST['eid'];
    $empfuid = $_REQUEST['fuid'];

    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result2 = $dbObj->DeleteEmployee($conObj,$empid);
    $result1 = $dbObj->DeleteUser($conObj, $empfuid);
    echo $result1 . "<br>" . $result2;
    $dbObj->CloseConn($conObj);
}

//////////////////____For Genereating Employee Table______///////////

if (isset($_POST['viewEmp'])) {
    $tableData = '<table class="emp-table">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Username</th>
                            <th>Contact</th>
                            <th id="action" colspan="2">Action</th>
                        </tr>
                    </thead>';
    $dbTry = new database();
    $conObj = $dbTry->OpenConn();
    $employees = $dbTry->RetrieveEmployees($conObj, "salesperson");

    while ($row = $employees->fetch_assoc()) {
        $eId = $row["eid"];
        $eName = $row["name"];
        $username = $row["username"];
        $password = $row["pass"];
        $email = $row["email"];
        $Contact = $row["contact"];
        $dob = $row["dob"];
        $gender = $row["gender"];
        $joinDate = $row["joindate"];
        $salary = $row["salary"];
        $address = $row["address"];
        $type = $row["type"];
        $fUid = $row['f_uid'];

        $tableData .= '<tbody>
                <tr>
                    <td>' . $eName . '</td>
                    <td>' . $username . '</td> 
                    <td>' . $Contact . '</td>
                    <td><a class="edit" onclick="FillData(' . $eId . ',`' . $eName . '`,`' . $username . '`,`' . $password . '`,`' . $email . '`,`' . $Contact . '`,`' . $dob . '`,`' . $gender . '`,`' . $joinDate . '`,`' . $salary . '`,`' . $address . '`,`' . $fUid . '`)">View/Edit</a></td>
                    <td><a class="delete" onclick="DeleteData(' . $eId . ',' . $fUid . ')">Delete</a></td>
                </tr>';
    }
    $tableData .= '</tbody>
                </table>';
    echo $tableData;
}
// <td><a class="edit" onclick="ShowPopUp(' . $pId . ',`' . $pName . '`,`' . $pCat . '`,`' . $pBrand . '`,`' . $pQuantity . '`,`' . $uprice . '`,`' . $ucost . '`,`' . $pstock . '`,`' . $pdetails . '`)">Edit</a></td>