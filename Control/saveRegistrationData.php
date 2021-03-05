
<?php
    
    $formData = array(
        'name' => $name,
        'email' => $email,
        'userName' => $userName,
        'password' => $password,
        'gender' => $_REQUEST["gender"],
        'dob' => $_REQUEST["dob"],
        'phone' => $phone,
        'address' => $address
    );

    $existingdata = file_get_contents('../data/userData.json');
    $tempJsonData = json_decode($existingdata);
    $tempJsonData[] = $formData;
    $jsonData = json_encode($tempJsonData, JSON_PRETTY_PRINT);

    if(file_put_contents('../data/userData.json',$jsonData)){
        $ValidateAllField = "Data Succesfully Saved.";
    }else{
        $ValidateAllField = "Opps!! No data saved.";
    }

?>
