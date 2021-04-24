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
                //echo "<script>console.log('Connection ready');</script>";
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



//////////_____Product Section_______///////

    function RetrieveProductsAsc($connObj){
        $result = $connObj->query("SELECT * FROM `product` ORDER BY 'pname' ASC");
        return $result;
    }
    function RetrieveProducts($connObj){
        $result = $connObj->query("SELECT * FROM `product` ORDER BY RAND()");
        return $result;
    }
    function RetrieveProductsByCat($connObj,$cid){
        $result = $connObj->query("SELECT * FROM `product` whereff ORDER BY RAND()");
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
    function UpdateProduct($connObj,$pId,$pName,$pCategory,$pBrand,$pstock,$pQuantity,$pPrice,$pCost,$pDetails){
        $result = $connObj->query("UPDATE `product` SET `pname` = '$pName', `pcategory` = '$pCategory', `pbrand` = '$pBrand', `pquantity` = '$pQuantity', `uprice` = '$pPrice', `ucost` = '$pCost', `pstock` = '$pstock', `pdetails` = '$pDetails' WHERE `product`.`pid` = $pId");
        if($result==TRUE){
            return "Data Updated Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    function DeleteProduct($connObj,$pid){
        $result = $connObj->query("DELETE FROM `product` WHERE `product`.`pid` ='$pid'");
        if($result==TRUE){
            return "Data Deleted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    
    //////////_____Category Section_______///////
    
    function RetrieveCategories($connObj){
        $result = $connObj->query("SELECT * FROM `category` ORDER BY `cname` ASC");
        return $result;
    }
    //////_____For Hot Category sec_______///////
    function RetrieveCategoriesSix($connObj){
        $result = $connObj->query("SELECT * FROM `category` ORDER BY `cid` ASC LIMIT 6 ");
        return $result;
    }
    function InsertCategory($connObj,$cname){
        $result = $connObj->query("INSERT INTO `category` (`cname`) VALUES ('$cname')");
        if($result==TRUE){
            return "Data Inserted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    function UpdateCategory($connObj,$cid,$cname){
        $result = $connObj->query("UPDATE `category` SET `cname` = '$cname' WHERE `category`.`cid` = '$cid'");
        if($result==TRUE){
            return "Data Updated Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    function DeleteCategory($connObj,$cid){
        $result = $connObj->query("DELETE FROM `category` WHERE `category`.`cid` ='$cid'");
        if($result==TRUE){
            return "Data Deleted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    function Totalcategory($connObj){
        $result = $connObj->query("SELECT COUNT(*) FROM category");
        if($result==TRUE){
            return $result;
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    
    //////////_____Brand Section_______///////
    
    function RetrieveBrands($connObj){
        $result = $connObj->query("SELECT * FROM `brand` ORDER BY `bname` ASC");
        return $result;
    }
    function InsertBrand($connObj,$bname){
        $result = $connObj->query("INSERT INTO `brand` (`bname`) VALUES ('$bname')");
        if($result==TRUE){
            return "Data Inserted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    function UpdateBrand($connObj,$bid,$bname){
        $result = $connObj->query("UPDATE `brand` SET `bname` = '$bname' WHERE `brand`.`bid` = '$bid'");
        if($result==TRUE){
            return "Data Updated Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    function DeleteBrand($connObj,$bid){
        $result = $connObj->query("DELETE FROM `brand` WHERE `brand`.`bid` ='$bid'");
        if($result==TRUE){
            return "Data Deleted Sucessfully.";
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    function TotalBrand($connObj){
        $result = $connObj->query("SELECT COUNT(*) FROM brand");
        if($result==TRUE){
            return $result;
        }else{
            return "Error: <br>" . $connObj->error;
        }
    }
    
    // ?////////////////////__________Employeee Section________________/////////////////
    
    
    function InsertEmployee($conObj,$username,$empemail,$empcontact,$empdob,$empgender,$empjoin,$empsalary,$empaddress){
        $result = $conObj->query("INSERT INTO `employee` (`email`, `contact`, `dob`, `gender`, `joindate`, `salary`, `address`, `f_uid`) VALUES ('$empemail', '$empcontact', '$empdob', '$empgender', '$empjoin', '$empsalary', '$empaddress', (SELECT `uid` FROM `user` WHERE `username` = '$username'))");
        if($result==TRUE){
            return "Data Inserted Sucessfully.";
        }else{
            return "Error: <br>" . $conObj->error;
        }
    }
    function RetrieveEmployees($connObj,$type){
        $result = $connObj->query("SELECT * FROM `employee` JOIN `user` ON employee.f_uid = user.uid WHERE user.type ='$type'");
        return $result;
    }
    









}
?>