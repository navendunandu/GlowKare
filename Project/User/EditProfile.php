<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

if(isset($_POST["btn_edit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];
	
	$UpsQry="update tbl_user set user_name='$name',user_email='$email',user_contact='$contact',user_address='$address'where user_id=".$_SESSION['uid'];
	
		if($Con->query($UpsQry))
		{
			echo"Updated";
			?>
			<script>
			window.location="EditProfile.php";
			</script>
            <?php 
		}
		else
		{
			echo "error";
		}

	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php

$SelQry="select * from tbl_user where user_id=".$_SESSION['uid'];
	$result=$Con->query($SelQry);
	$row=$result->fetch_assoc();
?>

<body>
<form id="form1" name="form1" method="post" action="">
        <table class="table table-bordered w-50 mx-auto">
        <div class="card-header text-center">
                        <h3>Edit Profile</h3>
                    </div>
            <tr>
                <td><label for="txt_name">Name</label></td>
                <td>
                    <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo $row['user_name']; ?>" placeholder="Enter your name">
                </td>
            </tr>
            <tr>
                <td><label for="txt_email">Email</label></td>
                <td>
                    <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo $row['user_email']; ?>" placeholder="Enter your email">
                </td>
            </tr>
            <tr>
                <td><label for="txt_contact">Contact</label></td>
                <td>
                    <input type="text" class="form-control" name="txt_contact" id="txt_contact" value="<?php echo $row['user_contact']; ?>" placeholder="Enter your contact number">
                </td>
            </tr>
            <tr>
                <td><label for="txt_address">Address</label></td>
                <td>
                    <textarea class="form-control" name="txt_address" id="txt_address" rows="3" placeholder="Enter your address"><?php echo $row['user_address']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" class="btn btn-primary" name="btn_edit" id="btn_edit" value="Edit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>