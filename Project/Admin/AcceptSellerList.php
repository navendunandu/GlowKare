<?php 
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
$selQry="select * from tbl_seller";
 $result=$Con->query($selQry);
 $row=$result->fetch_assoc();

 
 if(isset($_GET['rid']))
	{
	$UpsQry="update tbl_seller set seller_vstatus=2 where seller_id=".$_GET['rid'];
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Sl No.</td>
      <td>Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Place</td>
      <td>District</td>
      <td>Logo</td>
      <td>Action</td>
    </tr>
    <?php 
	$selQry="select * from tbl_seller s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where seller_vstatus=1";
    $result=$Con->query($selQry);
	$i=0;
	while($row=$result->fetch_assoc())
	{
		$i++;
	
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['seller_name'];?></td>
      <td><?php echo $row['seller_email'];?></td>
      <td><?php echo $row['seller_contact'];?></td>
      <td><?php echo $row['seller_address'];?>;</td>
      <td><?php echo $row['place_name'];?></td>
      <td><?php echo $row['district_name']?></td>
      <td><img src="../Assets/Files/Seller/Logo/<?php echo $row['seller_logo'];?>"  height="100" width="100"/></td>
     
       <td><a href="AcceptSellerList.php.?rid=<?php echo $row['seller_id']; ?>"> Reject</a></td>
    </tr>
    <?php 
	}
	?>
    
  </table>
</form>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>