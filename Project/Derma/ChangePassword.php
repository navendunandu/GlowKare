
<?php 

include("../Assets/Connection/Connection.php");
session_start();

$selQry="select derma_password from tbl_derma where derma_id=".$_SESSION['did'];
 $result=$Con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST['btn_change']))
{
	
	$old=$_POST['txt_opassword'];
	$new=$_POST['txt_npassword'];
	$retype=$_POST['txt_rpassword'];
	if($row['derma_password']!=$old)
	{
		echo "Incorrect Password";
	}
	else if($new!=$retype)
	{
		echo "Password doesn't match";
	}
	else
	{
		$upQry="update tbl_derma set derma_password='$new' where derma_id=".$_SESSION['did'];
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
  <table width="200" border="1">
    <tr>
      <td>Old Password</td>
      <td><label for="txt_opassword"></label>
      <input type="text" name="txt_opassword" id="txt_opassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_npassword"></label>
      <input type="text" name="txt_npassword" id="txt_npassword" /></td>
    </tr>
    <tr>
      <td>Re-Type Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_rpassword" id="txt_rpassword" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_change" id="btn_change" value="Change Password" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
