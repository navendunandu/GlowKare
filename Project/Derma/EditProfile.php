<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();
if(isset($_POST["btn_edit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];
	
	$UpsQry="update tbl_derma set derma_name='$name',derma_email='$email',derma_contact='$contact',derma_address='$address'where derma_id=".$_SESSION['did'];
	
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
    <title>Edit Dermatologist Profile</title>
    
    <style>
        .form-container {
            margin: 50px auto; /* Centering the container */
            max-width: 600px; /* Maximum width of the box */
        }
    </style>
</head>
<?php

$SelQry="select * from tbl_derma where derma_id=".$_SESSION['did'];
	$result=$Con->query($SelQry);
	$row=$result->fetch_assoc();
?>

<body>
<div class="container form-container">
    <div class="card">
        <div class="card-header">
            <h4>Edit Dermatologist Profile</h4>
        </div>
        <div class="card-body">
            <form id="form1" name="form1" method="post" action="">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" class="form-control" name="txt_name" id="txt_name" value="<?php echo htmlspecialchars($row['derma_name']); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?php echo htmlspecialchars($row['derma_email']); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>
                            <input type="text" class="form-control" name="txt_contact" id="txt_contact" value="<?php echo htmlspecialchars($row['derma_contact']); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <textarea class="form-control" name="txt_address" id="txt_address" cols="45" rows="5"><?php echo htmlspecialchars($row['derma_address']); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <input type="submit" class="btn btn-primary" name="btn_edit" id="btn_edit" value="Edit"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>