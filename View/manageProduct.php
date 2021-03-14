<?php
    $data = file_get_contents('../data/productData.json');
    $mydata = json_decode($data);
    if(empty($mydata)){
        echo 'No Data Found';
    }else{
            foreach($mydata as $empObject)
            {
                foreach($empObject as $key=>$value)
                {
                    echo $key." = ".$value."<br>";
                }
                echo '<br>';
            }
         }
?>