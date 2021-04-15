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

    function CloseConn($connObj){
        $connObj->close();
    }
    function InsertUser($connObj, $name, $userName, $password, $type){
        $result = $connObj->query("INSERT INTO `user` (`name`, `username`, `pass`, `type`) 
                                VALUES ('$name', '$userName', '$password', '$type')");
        if($result==TRUE){
            return "Data Inserted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    
    function CheckUser($connObj, $uname, $password){
        $result = $connObj->query("SELECT * FROM `user` WHERE `username`='$uname' AND `pass`='$password'");
        return $result;
    }
    function RetrieveProducts($connObj){
        $result = $connObj->query("SELECT * FROM `product` ORDER BY RAND()");
        return $result;
    }
    function RetrieveSingleProduct($connObj,$pid){
        $result = $connObj->query("SELECT * FROM `product` WHERE `pid`='$pid'");
        return $result;
    }
    function InsertProduct($connObj, $pName,$pCategory,$pBrand,$pstock,$pQuantity,$pPrice,$pCost,$pDetails,$pimage){
        $result = $connObj->query("INSERT INTO `product` (`pid`, `pname`, `pcategory`, `pbrand`, `pquantity`, `uprice`, `ucost`, `pstock`, `pimage`, `prate`, `pdetails`) VALUES (NULL, '$pName', '$pCategory', '$pBrand', '$pQuantity', '$pPrice', '$pCost', '$pstock', '$pimage', '', '$pDetails')");
        if($result==TRUE){
            return "Data Inserted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    
}

?>