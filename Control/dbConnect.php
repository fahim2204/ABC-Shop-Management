<?php

class db{

    function OpenConn(){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "abc_shop_management";

        $conn = new mysqli($serverName,$userName,$password,$dbName);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{
                echo "Connection ready";
            }
        return $conn;
    }

    function InsertUser($connObj, $name, $userName, $password, $type){
        $result = $connObj->query("INSERT INTO `user` (`name`, `username`, `password`, `type`) 
                                VALUES ('$name', '$userName', '$password', '$type')");
        if($result==TRUE){
            return "Data Inserted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    
    function CloseConn($connObj){
        $connObj->close();
    }
}

?>