<?php include "../view/header.php"; ?>
<?php
    session_start();
    
    echo "<br><br><br>";

    if(empty($_SESSION['post_data'])){
        echo "&nbsp &nbsp &nbsp You must Fillup the Form.<br>";
        echo '&nbsp &nbsp &nbsp <a href="../view/registration.php">Form Link</a>';
    }else{
        $REQ = $_SESSION['post_data'];
        $formData = array(
            'name' => $REQ["name"],
            'email' => $REQ["email"],
            'userName' => $REQ["username"],
            'password' => $REQ["password"],
            'gender' => $REQ["gender"],
            'dob' => $REQ["dob"],
            'phone' => $REQ["phone"],
            'address' => $REQ["address"]
        );
    
        $existingdata = file_get_contents('../data/userData.json');
        $tempJsonData = json_decode($existingdata);
        $tempJsonData[] = $formData;
        $jsonData = json_encode($tempJsonData, JSON_PRETTY_PRINT);
    
        if(file_put_contents('../data/userData.json',$jsonData)){
            echo "Data Succesfully Saved.";
            session_destroy();
        }else{
            echo "Opps!! No data saved.";
        }
    
        $data = file_get_contents('../data/userData.json');
        $mydata = json_decode($data);
    
        foreach($mydata as $myobject)
        {
            foreach($myobject as $key=>$value)
            {
                //echo "your ".$key." is ".$value."<br>";
                if($key=="userName" && $value == "hello"){
                    echo "your ".$key." is ".$value."<br>";
                }
            } 
        }
    }

    

?>
<?php include "../view/footer.php"; ?>