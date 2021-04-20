<?php 
    if(empty($_GET['page'])){
        include "header.php"; 
    }
?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
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


<?php 
    if(empty($_GET['page'])){
        include "footer.php"; 
    }
?>