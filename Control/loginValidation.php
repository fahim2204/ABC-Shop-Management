<?php  
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $userName = $password = "";
        $ValidateLogin = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $userName = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $tmpUserName = $tmpPass = "";

            if(empty($userName) || empty($password) )
            {
                $ValidateLogin = "Please Fillup All The Field!!";
            }else{
                $data = file_get_contents('../data/userData.json');
                $mydata = json_decode($data);
                foreach($mydata as $myobject)
                 {
                    foreach($myobject as $key=>$value)
                    {
                        if($myobject->userName == $userName && $myobject->password == $password){                           
                                $_SESSION["username"] = $userName;
                                $_SESSION["profileData"] = $myobject;
                                header("location: profile.php");
                        }else{
                            $ValidateLogin = "Username or Password is incorrect!!";
                        }
                    } 
                 }
            }
            
        }

?>