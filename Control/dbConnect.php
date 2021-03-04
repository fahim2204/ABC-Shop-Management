<?php

class db{

    function OpenConn(){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "test";

        $conn = new mysqli($serverName,$userName,$password,$dbName);
        return $conn;
    }

    function InsertUser($connObj, $name, $email, $userName, $password, $gender, $dob){
        $result = $connObj->query("INSERT INTO `user` (`name`, `email`, `username`, `password`, `gender`, `dob`) 
                                VALUES ('$name', '$email', '$userName', '$password', '$gender', '$dob')");
        return $result;
    }
    
    function CloseConn(){
        $conn->close();
    }
}

?>