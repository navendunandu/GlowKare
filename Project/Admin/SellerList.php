<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
$selQry="select * from tbl_seller";
 $result=$Con->query($selQry);
 $row=$result->fetch_assoc();

 
if(isset($_GET['aid']))
	{
	$UpsQry="update tbl_seller set seller_vstatus=1 where seller_vstatus =0 and  seller_id=".$_GET['aid'];
	if($Con->query($UpsQry))
	{echo "Updated";
	}
	
	
	else
	{echo "Error";
	}

	}	
else if(isset($_GET['rid']))
	{
	$UpsQry="update tbl_seller set seller_vstatus=2 where seller_vstatus=0 and seller_id=".$_GET['rid'];
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
    }
    .table img {
      height: 100px;
      width: 100px;
      border-radius: 10px;
    }
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="container table-container">
  <table class="table table-bordered table-striped table-hover">
  <div class="form-group row">
      <label for="txt_skintype" class="col-sm-2 col-form-label">SELLER LIST</label>
      <div class="col-sm-10">
    <thead class="thead-dark">
      <tr>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Place</th>
        <th>District</th>
        <th>Logo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $selQry = "SELECT * FROM tbl_seller s 
                  INNER JOIN tbl_place p ON s.place_id = p.place_id 
                  INNER JOIN tbl_district d ON p.district_id = d.district_id 
                  WHERE seller_vstatus = 0";
      $result = $Con->query($selQry);
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['seller_name']; ?></td>
        <td><?php echo $row['seller_email']; ?></td>
        <td><?php echo $row['seller_contact']; ?></td>
        <td><?php echo $row['seller_address']; ?></td>
        <td><?php echo $row['place_name']; ?></td>
        <td><?php echo $row['district_name']; ?></td>
        <td><img src="../Assets/Files/Seller/Logo/<?php echo $row['seller_logo']; ?>" alt="Logo" /></td>
        <td>
          <a href="SellerList.php?aid=<?php echo $row['seller_id']; ?>" class="btn btn-success btn-sm">Accept</a>
          <a href="SellerList.php?rid=<?php echo $row['seller_id']; ?>" class="btn btn-danger btn-sm">Reject</a>
        </td>
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