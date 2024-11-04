<?php 
include("../Assets/Connection/Connection.php");
session_start();
ob_start();

if(isset($_POST["btn_edit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];
	
	$UpsQry="update tbl_seller set seller_name='$name',seller_email='$email',seller_contact='$contact',seller_address='$address'where seller_id=".$_SESSION['sid'];
	
		if($Con->query($UpsQry))
		{
			
			?>
			<script>
			alert("Updated");
			window.location="EditProfile.php";
			</script>
            <?php 
		}
		else
		{
			?>
			<script>
			alert("Error");
			</script>
            <?php
		}

	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Seller Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-container {
            max-width: 500px;
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
<?php

$SelQry="select * from tbl_seller where seller_id=".$_SESSION['sid'];
	$result=$Con->query($SelQry);
	$row=$result->fetch_assoc();
?>

<body>
<div class="container">
    <div class="form-container">
        <h2>Edit Profile</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="txt_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="txt_name" name="txt_name" value="<?php echo $row['seller_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="txt_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="txt_email" name="txt_email" value="<?php echo $row['seller_email']; ?>">
            </div>
            <div class="mb-3">
                <label for="txt_contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="txt_contact" name="txt_contact" value="<?php echo $row['seller_contact']; ?>">
            </div>
            <div class="mb-3">
                <label for="txt_address" class="form-label">Address</label>
                <textarea class="form-control" id="txt_address" name="txt_address" rows="3"><?php echo $row['seller_address']; ?></textarea>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="btn_edit" id="btn_edit" value="Edit">
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