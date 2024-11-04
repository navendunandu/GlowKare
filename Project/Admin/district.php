<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$dis = $_POST["txt_name"];
	$id=$_POST['txt_id'];
	$selDis="select * from tbl_district where district_name='".$dis."'";
	$resDis=$Con->query($selDis);
    if($resDis->num_rows>0){
		?>
		  <script>
		    alert("District Already Exists");
		  </script>
		  <?php	
	}
	else{
	if($id!='')
	{
		$UpQry="update tbl_district set district_name='$dis' where district_id='$id'";
		if($Con->query($UpQry))
		{
		echo "updated";
		}
		else
		{
			echo "error";
		}
	}
	else
	{
	  $insQry = "insert into tbl_district(district_name) values('".$dis."')";

		if($Con->query($insQry))
		{
		echo "inserted";
		}
		else
		{
			echo "error";
		}

	}}
}
if(isset($_GET["did"]))
{
	$delQry = "delete from tbl_district where district_id=".$_GET["did"];
	if($Con->query($delQry))
	{
		?>
        <script>
		window.location = "district.php";
		</script>
        <?php
	}
}
$did='';
$dname='';

if(isset($_GET["eid"]))
{
	$SelQry="select * from tbl_district where district_id='".$_GET["eid"]."'" ;
	$row=$Con->query($SelQry);
	$data=$row->fetch_assoc();
	$did=$data['district_id'];
	$dname=$data['district_name'];
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
      <td>District Name</td>
      <td><label for="txt_name"></label>
      <input required stype="text" name="txt_name" id="txt_name" value="<?php echo $dname ?>" /></td>
	    <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $did ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <button type="reset" name="btn_reset" id="btn_reset">clear</button></td>
    </tr>
  </table>
</form>
</body>
<div class="container table-container">
  <table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>District</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i = 0;
      $selQry = "SELECT * FROM tbl_district";
      $result = $Con->query($selQry);
      while ($row = $result->fetch_assoc()) {
        $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['district_name']; ?></td>
        <td><a href="district.php?did=<?php echo $row['district_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
        <td><a href="district.php?eid=<?php echo $row['district_id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
      </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
</div>

</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>