<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

if(isset($_POST["btn_submit"]))
{
	$stid = $_POST["txt_brand"];
	$id = $_POST["txt_id"];
	$selType="select * from tbl_brand where brand_name='".$stid."'";
	$resType=$Con->query($selType);
    if($resType->num_rows>0){
		?>
		  <script>
		    alert("Brand Already Exists");
		  </script>
		  <?php	
	}
	else{
		if($id!='')
	{
		$upQry="update tbl_brand set brand_name='$stid' where brand_id ='$id'"; 
		if($Con->query($upQry))
		{
		echo "Updated";
		?>
        <script>
		window.location="Brand.php";
		</script>
        <?php
        }
		else
		{
			echo "error";
		}
	}
	else
	{
		$insQry = "insert into tbl_brand(brand_name) values('".$stid."')";


		if($Con->query($insQry))
		{
		echo "inserted";
		}
		else
		{
			echo "error";
		
		}
		}
	}
}
	if(isset($_GET["stid"]))
		
		{
		$delQry = "delete from tbl_brand where brand_id=".$_GET["stid"];
		if($Con->query($delQry))
		{
		?>
        <script>
		alert("Deleted");
		window.location = "Brand.php";
		</script>
        <?php
		}
		
	}
	
	$did='';
	$dname='';
if(isset($_GET["eid"]))
{
	$selQry="select * from tbl_brand where brand_id='". $_GET['eid']."'";
	$row=$Con->query($selQry);
	$data=$row->fetch_assoc();
	$did=$data['brand_id'];
	$dname=$data['brand_name'];
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
    .form-container {
      margin-top: 50px;
      border: 1px solid #dee2e6;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 8px;
    }
    table {
      width: 100%;
    }
    .table td, .table th {
      border: 1px solid #dee2e6;
    }
    .table input {
      width: 100%;
    }
  </style>
</head>

<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="form-container">
	  <form id="form1" name="form1" method="post" action="">
	  <table width="200" border="1">
          <table class="table table-bordered">
            <tr>
              <th>Brand</th>
              <td>
                <label for="txt_brand"></label>
                <input required type="text" class="form-control" name="txt_brand" id="txt_brand" value="<?php echo $dname ?>" />
                <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $did ?>" />
              </td>
            </tr>
            <tr>
              <td colspan="2" class="text-center">
                <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Submit</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>

<table>
<tr>
	<td>#</td>
    <td>Brand</td>
    <td>Action</td>
</tr>
<?php 
$i=0;
		$selQry="select * from tbl_brand";
		$result=$Con->query($selQry);
		while($row=$result->fetch_assoc())
		{
			$i++;
?>
<tr>
	<td><?php echo $i;?></td>
    <td><?php echo $row["brand_name"] ?></td>
     <td><a href="Brand.php?stid=<?php echo $row["brand_id"]; ?>">Delete</a></td>
     <td><a href="Brand.php?eid=<?php echo $row["brand_id"]; ?>">Edit</a></td>
     
    
</tr>



<?php 
		}
?>
</table>
</body>
</html>

</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>