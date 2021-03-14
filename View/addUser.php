<?php  
    include "../control/dbConnect.php";
            
    $uid = $name = $userName = $password = $type = "";
    $ValidateAllField = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
    {
        $name = $_REQUEST["name"];
        $userName = $_REQUEST["userName"];
        $password = $_REQUEST["password"];
        $type = $_REQUEST["type"];

        if(empty($name) || empty($userName) || empty($password) || empty($type))
        {
            $ValidateAllField = "Please Fill All The Fields!!";
        }else{
            $dbCon = new db();
            $dbObject = $dbCon->OpenConn();
            $validateSql = $dbCon->InsertUser($dbObject, $name, $userName, $password, $type);
            if($validateSql == TRUE){
                $ValidateAllField = "Data Inserted Sucessfully.";
            }else{
                $ValidateAllField = "Sorry Data is not Inserted!!";
            }
            
            $dbCon->CloseConn($dbObject);
        }
    }

?>
<!DOCTYPE html>
<html>
    <body>
    <br><br><br>
        <table style="width:100%">
            <tr>
                <td width="35%">&nbsp</td>
                
                <td width="30%">
                    <fieldset>
                    <legend><b>Add User</b></legend>
                    <center>
                        <form value="Registration" action="?page=addUser" method="POST"> 
                            <table>
                                <tr>
                                    <td>
                                        <label>Name:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name;?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>User Name:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="userName" name="userName" placeholder="User Name" value="<?php echo $userName;?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>User Type:</label>
                                    </td>
                                    <td>
                                        <select id="type" name="type">
                                            <option value="admin">Admin</option>
                                            <option value="manager">Manager</option>
                                            <option value="SalesPerson">Sales Person</option>
                                            <option value="DeliveryPerson">Delevery Person</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="password" name="password" placeholder="Password">
                                    </td>
                                </tr>                            
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <?php echo $ValidateAllField; ?>
                                    </td>
                                </tr>                            
                                <tr>
                                    <td> 
                                    </td>
                                    <td align="center"> 
                                        <input type="submit" name="submit" id="submit" value="Submit">
                                    </td>
                                </tr>
                            </table>
                    </center>
                        </form>
                </fieldset>
                </td>
                <td width="35%">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
            </tr>
        </table>
    </body>
</html>
