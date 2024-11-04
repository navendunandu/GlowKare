<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
 $selQry="select * from tbl_user";
 $result=$Con->query($selQry);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
    .table-container {
      margin-top: 30px;
    }
    .table th, .table td {
      text-align: center;
    }
    .user-photo {
      width: 100px; /* Set a fixed width for images */
      height: auto; /* Maintain aspect ratio */
    }
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="container table-container">
  <!-- User Table -->
  <table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Place</th>
        <th>District</th>
        <th>Photo</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $selQry = "SELECT * FROM tbl_user u 
                  INNER JOIN tbl_place p ON u.place_id = p.place_id 
                  INNER JOIN tbl_district d ON p.district_id = d.district_id";
      $result = $Con->query($selQry);
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['user_email']; ?></td>
        <td><?php echo $row['user_contact']; ?></td>
        <td><?php echo $row['user_address']; ?></td>
        <td><?php echo $row['place_name']; ?></td>
        <td><?php echo $row['district_name']; ?></td>
        <td><img src="../Assets/Files/User/Photo/<?php echo $row['user_photo']; ?>" class="user-photo" /></td>
      </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
</div>
</form>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>