<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();
		$selqry="select * from tbl_derma u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id where derma_id=".$_SESSION['did'];		
		$result=$Con->query($selqry);
		$row=$result->fetch_assoc()
		
			
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="container profile-container">
    <div class="card">
        <div class="card-header">
            <h4>Dermatologist Profile</h4>
        </div>
        <div class="card-body">
            <form id="form1" name="form1" method="post" action="">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" class="text-center">
                            <img src="../Assets/Files/Derma/Photo/<?php echo $row['derma_photo']; ?>" height="200" class="img-fluid"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $row['derma_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $row['derma_email']; ?></td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><?php echo $row['derma_contact']; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $row['derma_address']; ?></td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td><?php echo $row['district_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Place</td>
                        <td><?php echo $row['place_name']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="EditProfile.php" class="btn btn-warning">Edit Profile</a>
                            <a href="ChangePassword.php" class="btn btn-info">Change Password</a>
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