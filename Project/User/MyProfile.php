<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
// session_start();
		$selqry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id where user_id=".$_SESSION['uid'];		
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

<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>User Profile</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td colspan="2" class="text-center">
                            <img src="../Assets/Files/User/Photo/<?php echo htmlspecialchars($row['user_photo']); ?>" width="200"height="200" class="img-thumbnail" alt="User Photo"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><?php echo htmlspecialchars($row['user_contact']); ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo htmlspecialchars($row['user_address']); ?></td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td><?php echo htmlspecialchars($row['district_name']); ?></td>
                    </tr>
                    <tr>
                        <td>Place</td>
                        <td><?php echo htmlspecialchars($row['place_name']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="EditProfile.php" class="btn btn-warning">Edit Profile</a>
                            <a href="ChangePassword.php" class="btn btn-secondary">Change Password</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

<!-- Add Bootstrap CSS if not already included -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>