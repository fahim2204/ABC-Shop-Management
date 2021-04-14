<?php

class database{

    function OpenConn(){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "shop";

        $conn = new mysqli($serverName,$userName,$password,$dbName);
            if ($conn->connect_error) {

                die("Connection failed: " . $conn->connect_error);
            }else{
                // echo "Connection ready";
                echo "<script>console.log('Connection ready');</script>";
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
    function CheckUser($connObj, $uname, $password){
        $result = $connObj->query("SELECT * FROM `user` WHERE `username`='$uname' AND `pass`='$password'");
        return $result;
    }
    
}

?>