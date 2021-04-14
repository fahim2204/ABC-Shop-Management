<?php
if (!isset($_SESSION)) {
    session_start();
}
$userName = $password = "";
$ValidateLogin = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_REQUEST["userName"];
    $password = $_REQUEST["password"];

    if (empty($userName) || empty($password)) {
        $ValidateLogin = "Please Fillup All The Field!!";
    } else {
        include($_SERVER['DOCUMENT_ROOT'] . '/model/dbConnect.php');
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();

        $result = $dbObj->CheckUser($conObj, $userName, $password);


        if ($result->num_rows> 0) {
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $userName;
            if($row["type"] == "salesperson"){
                header('location:salesPerson.php');
            }
            if($row["type"] == "admin"){
                header('location:admin.php');
            }
            if($row["type"] == "manager"){
                header('location:manager.php');
            }
            if($row["type"] == "customer"){
                header('location:customer.php');
            }
        } else {
            $ValidateLogin = "Username or Password is invalid";
        }
    }
}
