
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/model/db-connect.php');
if (isset($_POST["keyword"])) {
    $name = $_POST["keyword"];
    $dbObj = new database();
    $conObj = $dbObj->OpenConn();
    $result = $dbObj->RetrieveProductsBySrcName($conObj, $name);
    if(!empty($result)) {
        ?>
        <ul id="product-list">
        <?php
        foreach($result as $pname) {
        ?>
        <li onClick="selectList('<?php echo $pname["pname"]; ?>');"><?php echo $pname["pname"]; ?></li>
        <?php } ?>
        </ul>
        <?php } } ?>