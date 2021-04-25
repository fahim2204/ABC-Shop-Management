<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');

if (isset($_POST['addUser'])) {
    $name = $_REQUEST["name"];
    $userName = $_REQUEST["uname"];
    $password = $_REQUEST["pass"];

    if (empty($name) || empty($password) || empty($userName)) {
        echo "Please Fillup All The Field!!";
    } else {
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->InsertUser($conObj,$name, $userName, $password,"customer");
        if (preg_match("/Duplicate/i", $result) == 1) {
            echo "This Username is already Registered!!";
        } else {
            echo $result;
        }
    }

}
