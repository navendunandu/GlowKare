<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_change'])){
if(isset($_SESSION['ruid']))
{
	$new=$_POST['txt_pass'];
	$retype=$_POST['txt_cpass'];
	if($new!=$retype)
	{
		echo "Password doesn't match";
	}
	else
	{
		$upQry="update tbl_user set user_password='$new' where user_id=".$_SESSION['ruid'];
		if($Con->query($upQry))
		{  ?>
			<script>
				alert("Password Updated")
				window.location="LogOut.php"
				</script>
			<?php
		}
	}

}
else if(isset($_SESSION['rsid']))
{
	$new=$_POST['txt_pass'];
	$retype=$_POST['txt_cpass'];
	if($new!=$retype)
	{
		echo "Password doesn't match";
	}
	else
	{
		$upQry="update tbl_seller set seller_password='$new' where seller_id=".$_SESSION['rsid'];
		if($Con->query($upQry))
		{
			?>
			<script>
				alert("Password Updated")
				window.location="LogOut.php"
				</script>
			<?php
			
		}
	}
}
else if(isset($_SESSION['rdid']))
{
	$new=$_POST['txt_pass'];
	$retype=$_POST['txt_cpass'];
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
		$upQry="update tbl_derma set derma_password='$new' where derma_id=".$_SESSION['rdid'];
		if($Con->query($upQry))
		{
			?>
			<script>
				alert("Password Updated")
				window.location="LogOut.php"
				</script>
			<?php
			
		}
	}
}
else{
	echo "Session Error";
}



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
    body {
        background-color: #fceaea;
        font-family: Arial, sans-serif;
    }
    .form-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .form-container h2 {
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }
    .form-label {
        color: #6c757d;
        font-weight: 500;
        display: block;
        text-align: left;
        margin-bottom: 5px;
    }
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px;
        background-color: #f9f9f9;
        color: #495057;
        width: 100%;
    }
    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.3);
        background-color: #fff;
    }
    .btn-custom {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        width: 100%;
        font-weight: bold;
        margin-top: 15px;
    }
    .btn-custom:hover {
        background-color: #c82333;
    }
</style>
</head>
<body>
<div class="form-container">
    <h2>Change Password</h2>
    <form action="" method="post">
        <div class="mb-3 text-start">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" name="txt_pass" id="new_password" required>
        </div>
        <div class="mb-3 text-start">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="txt_cpass" id="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-custom" name="btn_change">Change Password</button>
    </form>
</div>
</body>
</html>