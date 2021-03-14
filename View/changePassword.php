<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title." Change Password"; ?></title>
    </head>
    <body>
    <br><br><br>
        <table style="width:100%">
            <tr>
                <td width = "30%">&nbsp</td>
                
                <td width = "40%">
                    <fieldset>
                        <legend><b>Change Password</b></legend>
                        <center>
                        <form value="Login" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST"> 
                            <table>
                                <tr>
                                    <td>
                                        <label>Current Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="currPass" name="currPass" placeholder="Current Password" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>New Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="newPassword" name="newPassword" placeholder=" New Password">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Confirm Password:</label>
                                    </td>
                                    <td>
                                        <input type="password" id="cPassword" name="cPassword" placeholder=" Confirm Password">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Change">
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </table>
                        </form>
                        </center> 
                    </fieldset>
                </td>
                <td width = "30%">&nbsp</td>
            </tr>
        </table>
    </body>
</html>