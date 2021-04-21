<?php
$imageErr = "";
$validationErr = "";
if (isset($_POST['submit'])) {
  $pName = $_REQUEST['pName'];
  if (isset($_REQUEST['pCategory'])) {
    $pCategory = $_REQUEST['pCategory'];
  } else {
    $pCategory = "";
  }
  if (isset($_REQUEST['pBrand'])) {
    $pBrand = $_REQUEST['pBrand'];
  } else {
    $pBrand = "";
  }
  if (isset($_REQUEST["hiddencontainer"])) {
    $boxsize = $_REQUEST["hiddencontainer"];
  } else {
    $boxsize = "";
  }
  // $pCategory = $_REQUEST['pCategory'];
  // $pBrand = $_REQUEST['pBrand'];
  $pstock = $_REQUEST['pstock'];
  $pQuantity = $_REQUEST['pQuantity'];
  $pPrice = $_REQUEST['pPrice'];
  $pCost = $_REQUEST['pCost'];
  $pDetails = $_REQUEST['pDetails'];

  // echo $pName;
  // echo $pCategory;
  // echo $pBrand;
  // echo $pstock;
  // echo $pQuantity;
  // echo $pPrice;
  // echo $pCost;
  // echo $pDetails;




  if (empty($pName) || empty($pCategory) || empty($pBrand) || empty($pstock) || empty($pQuantity) || empty($pPrice) || empty($pCost) || empty($pDetails) || $boxsize == "10") {
    $validationErr = "Please Fill All The Field";
  } else {

    /////_____Image Upload_____//////
    $file = $_FILES['fileToUpload'];
    $fileName = $_FILES['fileToUpload']['name'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileError = $_FILES['fileToUpload']['error'];
    $fileType = $_FILES['fileToUpload']['type'];
    $tmpExt = explode('.', $fileName);
    $fileExt = strtolower(end($tmpExt));
    $allowed = array('jpg', 'jpeg', 'png', 'bmp');
    if (in_array($fileExt, $allowed)) {
      if ($fileError == 0) {
        if ($fileSize < 10000000) {
          $fileNewName = uniqid($pName . "_") . "." . $fileExt;
          $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/images/product-image/' . $fileNewName;
          move_uploaded_file($fileTmpName, $fileDestination);
          $imageErr = "Uploaded Succesfully";
        } else {
          $imageErr = "File is Too Big";
        }
      } else {
        $imageErr = "Something Went wrong";
      }
    } else {
      $imageErr = "Wrong File Type";
    }

    ////////______Databae Connection and Insert_______////////

    include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
    $dbObj = new database();
    $conObj = $dbObj->OpenConn();

    $result = $dbObj->InsertProduct($conObj, $pName, $pCategory, $pBrand, $pstock, $pQuantity, $pPrice, $pCost, $pDetails, $fileNewName);
    echo '<script>alert("' . $result . '");</script>';
    // header('location:'.$_SERVER["PHP_SELF"].'');
    header( "refresh:0;url=".$_SERVER["PHP_SELF"]."?menu=addProduct" );
  }
  // $pName,$pCategory,$pBrand,$pstock,$pQuantity,$pPrice,$pCost,$pDetails



}
