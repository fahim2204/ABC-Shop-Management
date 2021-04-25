<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
if (!isset($_SESSION)) {
    session_start();
}

// __________For Manage Manager__________//////______

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
        $result1 = $dbObj->InsertUser($conObj, $empname, $username, $emppass, "manager");
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
        $result1 = $dbObj->UpdateUser($conObj, $empfuid, $empname, $username, $emppass, "manager");
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
    $result2 = $dbObj->DeleteEmployee($conObj, $empid);
    $result1 = $dbObj->DeleteUser($conObj, $empfuid);
    echo $result1 . "<br>" . $result2;
    $dbObj->CloseConn($conObj);
}

//////////////////____For Genereating Employee Table______///////////

if (isset($_POST['viewEmp'])) {
    $tableData = '<table class="emp-table">
                    <thead>
                        <tr>
                            <th>Manager Name</th>
                            <th>Username</th>
                            <th>Contact</th>
                            <th id="action" colspan="2">Action</th>
                        </tr>
                    </thead>';
    $dbTry = new database();
    $conObj = $dbTry->OpenConn();
    $employees = $dbTry->RetrieveEmployees($conObj, "manager");

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

if (isset($_POST['viewCustomer'])) {
    $cuname = $_SESSION['username'];

    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result = $dbObj->ViewCustomer($conObj, $cuname);
    $row = $result->fetch_assoc();
    $list = array();

        $list["name"] = $row["name"];
        $list["uname"] = $row["username"];
        $list["pass"] = $row["pass"];
        $list["email"] = $row["email"];
        $list["contact"] = $row["phone"];
        $list["dob"] = $row["dob"];
        $list["gender"] = $row["gender"];
        $list["address"] = $row["address"];
        echo json_encode( $list );

    $dbObj->CloseConn($conObj);
}
