<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');

if (isset($_POST['change'])) {
    $uname = $_REQUEST['username'];
    $opass = $_REQUEST['oldpassword'];
    $npass = $_REQUEST['newpassword'];
    

    if (empty($uname) || empty($opass) || empty($npass)) {
        echo "Please fill up all correctly";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result1 = $dbObj->CheckUser($conObj, $uname, $opass);
        if ($result1->num_rows> 0) {
           
             $result2 = $dbObj->UpdateUserPass($conObj, $uname, $npass);
             echo  $result2;
        }else{
            echo "Old Password is incorrect!!";
        }
        $dbObj->CloseConn($conObj);
    }
}