<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
<tr>
	<td>Sl No</td>
    <td>Title</td>
    <td>Start Date</td>
    <td>End Date</td>
    <td>Image</td>
    
    <td>Action</td>

</tr>
<?php 
$i=0;
		$selQry="select * from tbl_sale  ";
		$result=$Con->query($selQry);
		while($row=$result->fetch_assoc())
		{
			$i++;
?>
<tr>
	<td><?php echo $i;?></td>
   
     <td><?php echo $row["sale_title"]?></td>
      <td><?php echo $row["sale_startdate"]?></td>
       <td><?php echo $row["sale_enddate"]?></td>
        <td><img src="../Assets/Files/Sale/<?php echo $row['sale_image']; ?>" height="200"/></td>
        <td><a href="AddProducts.php?sid=<?php echo $row['sale_id']?>">Add Products</td></tr>
     <?php
		}?>
        </table>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>