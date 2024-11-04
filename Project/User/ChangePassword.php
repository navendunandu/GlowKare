<?php 

include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");


$selQry="select user_password from tbl_user where user_id=".$_SESSION['uid'];
 $result=$Con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST['btn_change']))
{
	
	$old=$_POST['txt_opassword'];
	$new=$_POST['txt_npassword'];
	$retype=$_POST['txt_rpassword'];
	if($row['user_password']!=$old)
	{
		echo "Incorrect Password";
	}
	else if($new!=$retype)
	{
		echo "Password doesn't match";
	}
	else
	{
		$upQry="update tbl_user set user_password='$new' where user_id=".$_SESSION['uid'];
		if($Con->query($upQry))
		{
			echo "Updated";
		}
		else
		{
			echo "Error";
		}
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Change Password</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Old Password</td>
                        <td>
                            <input type="password" name="txt_opassword" id="txt_opassword" class="form-control" required />
                        </td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td>
                            <input type="password" name="txt_npassword" id="txt_npassword" class="form-control" required />
                        </td>
                    </tr>
                    <tr>
                        <td>Re-Type Password</td>
                        <td>
                            <input type="password" name="txt_rpassword" id="txt_rpassword" class="form-control" required />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" name="btn_change" id="btn_change" class="btn btn-primary">Change Password</button>
                            <button type="button" name="btn_cancel" id="btn_cancel" class="btn btn-secondary" onclick="window.location.href='Profile.php'">Cancel</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>