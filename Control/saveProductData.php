<?php
    $formData = array(
        'pname' => $pname,
        'category' => $category,
        'brand' => $brand,
        'stock' => $stock,
        'quantity' => $quantity,
        'price' => $price,
        'details' => $details
    );

    $existingdata = file_get_contents('../data/productData.json');
    $tempJsonData = json_decode($existingdata);
    $tempJsonData[] = $formData;
    $jsonData = json_encode($tempJsonData, JSON_PRETTY_PRINT);

    if(file_put_contents('../data/productData.json',$jsonData)){
        $ValidateAllField = "Data Succesfully Saved.";
    }else{
        $ValidateAllField = "Opps!! No data saved.";
    }

?>
