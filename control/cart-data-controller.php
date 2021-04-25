<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['CartAdd'])) {
    $pid = $_REQUEST['pid'];
    if (empty($_SESSION["username"])) {
        echo "You Need to login First!!";
    } else if ($_SESSION["usertype"] != "customer") {
        echo "You are not a Customer!!";
    } else {
        $username = $_SESSION["username"];
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->InsertToCart($conObj, $pid, $username, 1);
        if (preg_match("/Duplicate/i", $result) == 1) {
            echo "Product already added into Cart!!";
        } else {
            echo $result;
        }
        $dbObj->CloseConn($conObj);
    }
}
if (isset($_POST['cartRecord'])) {
   
        $username = $_SESSION["username"];

        $tableData = '<table class="cart-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th class="center">Ammount</th>
                <th>Total Cost</th>
                <th class="center">Remove</th>
            </tr>
        </thead>';


        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->RetrieveCartItems($conObj,$username);
       
        while ($row = $result->fetch_assoc()) {
            $pName = $row["pname"];
            $pQuantity = $row["pquantity"];
            $uprice = $row["uprice"];
            $ammount = $row["ammount"];
            $uname = $row["fr_uname"];
    
    
            $tableData .= '<tbody>
                    <tr>
                        <td>' . $pName . '</td>
                        <td>' . $pQuantity . '</td>
                        <td class="center">' . $uprice . '</td>
                        <td class="center"><button id="minus" onclick="CartMinus(`'.$uname.'`,`'.$pName.'`,'.$ammount.')">-</button>' . $ammount . '<button id="plus" onclick="CartPlus(`'.$uname.'`,`'.$pName.'`,'.$ammount.')">+</button></td>
                        <td class="center"><p id="ammount">'.$uprice*$ammount.'</p></td>
                        <td class="center"><button id="delete" onclick="DeleteItem(`'.$uname.'`,`'.$pName.'`)">X</button></td>
                    </tr>';
        }
        $tableData .= '</tbody>
                    </table>';
        echo $tableData;

        
        $dbObj->CloseConn($conObj);
}
if (isset($_POST['cartMinus'])) {
    $pname = $_REQUEST['pname'];
    $uname = $_REQUEST['uname'];
    
        $username = $_SESSION["username"];
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->MinusToCart($conObj, $pname, $username);
        $dbObj->CloseConn($conObj);
 
}
if (isset($_POST['cartPlus'])) {
    $pname = $_REQUEST['pname'];
    $uname = $_REQUEST['uname'];
    
        $username = $_SESSION["username"];
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->PlusToCart($conObj, $pname, $username);
        $dbObj->CloseConn($conObj);
 
}
if (isset($_POST['DeleteItem'])) {
    $pname = $_REQUEST['pname'];
    $uname = $_REQUEST['uname'];
    
        $username = $_SESSION["username"];
        $dbObj = new database();
        $conObj = $dbObj->OpenConn();
        $result = $dbObj->DeleteItem($conObj, $pname, $username);
        $dbObj->CloseConn($conObj);
 
}