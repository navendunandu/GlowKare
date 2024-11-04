<?php 

include("../Assets/Connection/Connection.php");
session_start();
ob_start();


$selQry="select seller_password from tbl_seller where seller_id=".$_SESSION['sid'];
 $result=$Con->query($selQry);
$row=$result->fetch_assoc();
if(isset($_POST['btn_change']))
{
	
	$old=$_POST['txt_opassword'];
	$new=$_POST['txt_npassword'];
	$retype=$_POST['txt_rpassword'];
	if($row['seller_password']!=$old)
	{
		echo "Incorrect Password";
	}
	else if($new!=$retype)
	{
		echo "Password doesn't match";
	}
	else
	{
		$upQry="update tbl_seller set seller_password='$new' where seller_id=".$_SESSION['sid'];
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
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="form-container">
        <h2>Change Password</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="txt_opassword" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="txt_opassword" name="txt_opassword" required>
            </div>
            <div class="mb-3">
                <label for="txt_npassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="txt_npassword" name="txt_npassword" required>
            </div>
            <div class="mb-3">
                <label for="txt_rpassword" class="form-label">Re-Type Password</label>
                <input type="password" class="form-control" id="txt_rpassword" name="txt_rpassword" required>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="btn_change" id="btn_change" value="Change Password">
                <input type="submit" class="btn btn-secondary" name="btn_cancel" id="btn_cancel" value="Cancel">
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>