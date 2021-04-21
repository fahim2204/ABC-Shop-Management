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
        include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();

        $result = $dbObj->CheckUser($conObj, $userName, $password);


        if ($result->num_rows> 0) {
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $userName;
            $_SESSION["name"] = $row['name'];
            if($row["type"] == "salesperson"){
                $_SESSION["usertype"] = "salesperson";
                header('location:salesperson');
            }
            if($row["type"] == "admin"){
                $_SESSION["usertype"] = "admin";
                header('location:admin');
            }
            if($row["type"] == "manager"){
                $_SESSION["usertype"] = "manager";
                header('location:manager');
            }
            if($row["type"] == "customer"){
                $_SESSION["usertype"] = "customer";
                header('location:customer');
            }
        } else {
            $ValidateLogin = "Username or Password is invalid";
        }
    }
}
