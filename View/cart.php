
<?php include "header.php"; ?>
<?php
    session_start();

    if(empty($_SESSION["username"])){
        header("location:login.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])){
        session_destroy();
        header("location:login.php");
    }
?>
<br><br>
You are on favourite Page
<br>
want to logout
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
    <input type="submit" name="logout" value="Logout">    
</form>

<?php include "footer.php"; ?>