<?php 
include("../Assets/Connection/Connection.php");
session_start();
ob_start();

		$selqry="select * from tbl_seller u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id where seller_id=".$_SESSION['sid'];		
		$result=$Con->query($selqry);
		$row=$result->fetch_assoc()
		
			
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .profile-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-container img {
            width: 170px; /* Adjusted width */
            height: 170px; /* Adjusted height */
            object-fit: cover; /* Ensures the image scales proportionally */
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .profile-container td {
            padding: 8px 10px;
        }
        .profile-container .btn {
            margin-top: 10px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="profile-container">
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-borderless">
                <tr>
                    <td colspan="2">
                        <img src="../Assets/Files/seller/Logo/<?php echo $row['seller_logo']; ?>" alt="Seller Logo"/>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $row['seller_name'];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['seller_email'];?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?php echo $row['seller_contact'];?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $row['seller_address'];?></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td><?php echo $row['district_name'];?></td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><?php echo $row['place_name'];?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="EditProfile.php" class="btn btn-primary">Edit Profile</a>
                        <a href="ChangePassword.php" class="btn btn-secondary">Change Password</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>