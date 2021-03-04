<?php  
        session_start();
        $userName = $password = "";
        $ValidateLogin = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $userName = $_REQUEST["username"];
            $password = $_REQUEST["password"];

            if(empty($userName) || empty($password) )
            {
                $ValidateLogin = "Please Fillup All The Field!!";
            }else{
                $_SESSION["username"] = $userName;

                header("location:pos.php");
            }
            
        }

?>