<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

 
if(isset($_GET['aid']))
	{
	$UpsQry="update tbl_derma set derma_vstatus=1 where  derma_id=".$_GET['aid'];
	if($Con->query($UpsQry))
	{echo "Updated";
	}
	
	
	else
	{echo "Error";
	}

	}	

	



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
    .table-container {
      margin-top: 50px;
    }
    .table th, .table td {
      text-align: center;
      vertical-align: middle;
    }
    .table img {
      border-radius: 10px;
    }
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="container table-container">
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
        <th>Logo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $selQry = "SELECT * FROM tbl_derma s 
                 INNER JOIN tbl_place p ON s.place_id = p.place_id 
                 INNER JOIN tbl_district d ON p.district_id = d.district_id 
                 WHERE derma_vstatus = 2";
      $result = $Con->query($selQry);
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['derma_name']; ?></td>
        <td><?php echo $row['derma_email']; ?></td>
        <td><?php echo $row['derma_contact']; ?></td>
        <td><?php echo $row['derma_address']; ?></td>
        <td><?php echo $row['place_name']; ?></td>
        <td><?php echo $row['district_name']; ?></td>
        <td><img src="../Assets/Files/Derma/Photo/<?php echo $row['derma_photo']; ?>" alt="Photo" height="100" width="100"></td>
        <td><img src="../Assets/Files/Derma/Proof/<?php echo $row['derma_proof']; ?>" alt="Logo" height="100" width="100"></td>
        <td><a href="RejectDermaList.php?aid=<?php echo $row['derma_id']; ?>" class="btn btn-success btn-sm">Accept</a></td>
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