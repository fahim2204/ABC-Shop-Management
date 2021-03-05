<?php include "header.php"; ?>
<?php
    session_start();
    $ownData = $_SESSION["profileData"];

    $name = $ownData->name;
    $email = $ownData->email;
    $userName = $ownData->userName;
    $password = $ownData->password;
    $dob = $ownData->dob;
    $gender = $ownData->gender;
    $address = $ownData->address;
    $phone = $ownData->phone;
    

    if(empty($_SESSION["username"])){
        header("location:login.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])){
        session_destroy();
        header("location:login.php");
    }
?>
<html>
    <head>
        <title><?php echo $title." Profile"; ?></title>
    </head>
    <body>
        <table style="width:100%">
            <tr>
                <td width="35%">&nbsp</td>
                
                <td width="30%">
                    <br>
                    <center><h1>Welcome <?php echo $name; ?></h1></center>
                    <fieldset>
                        <legend><b>Your Info</b></legend>
                        Name: <?php echo $name; ?><br>
                        Email: <?php echo $email; ?><br>
                        User Name: <?php echo $userName; ?><br>
                        Gender: <?php echo $gender; ?><br>
                        Date of Birth: <?php echo $dob; ?><br>
                        Phone: <?php echo $phone; ?><br>
                        Address: <?php echo $address; ?><br><br>
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                            <input type="submit" name="logout" value="Logout">    
                        </form>
                    </fieldset>
                </td>
                <td width="35%">&nbsp</td>
            </tr>
        </table>
    </body>
</html>


<?php include "footer.php"; ?>