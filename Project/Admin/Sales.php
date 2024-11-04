<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();

if(isset($_POST["btn_submit"]))
{
	
	$title=$_POST['txt_title'];
	$sdate= $_POST["txt_start"];
	$edate=$_POST["txt_end"];
	$image=$_FILES['file_img']['name'];
	$tmpimage=$_FILES['file_img']['tmp_name'];
	move_uploaded_file($tmpimage, '../Assets/Files/Sale/'.$image);
	
	
	  $InsQry = "insert into tbl_sale(sale_title,sale_startdate,sale_enddate,sale_image,sale_date)values('$title','$sdate','$edate','$image',curdate())";
	  

		if($Con->query($InsQry))
		{
			echo "inserted";
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

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
      <td>Start Date</td>
      <td><label for="txt_start"></label>
      <input type="text" name="txt_start" id="txt_start" /></td>
    </tr>
    <tr>
      <td>End Date</td>
      <td><label for="txt_end"></label>
      <input type="text" name="txt_end" id="txt_end" /></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label for="file_img"></label>
      <input type="file" name="file_img" id="file_img" /></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></center></td>
    </tr>
  </table>
</form>
</br>
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
        <td><img src="../Assets/Files/Sale/<?php echo $row['sale_image']; ?>" height="200"/></td></tr>
     <?php
		}?>
        </table>
</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>