<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

if(isset($_POST["btn_submit"]))
{
	$stid = $_POST["txt_skintype"];
	$id = $_POST["txt_id"];
	$selType="select * from tbl_skintype where skintype_name='".$stid."'";
	$resType=$Con->query($selType);
    if($resType->num_rows>0){
		?>
		  <script>
		    alert("Skin Type Already Exists");
		  </script>
		  <?php	
	}
	else{
		if($id!='')
	{
		$upQry="update tbl_skintype set skintype_name='$stid' where skintype_id ='$id'"; 
		if($Con->query($upQry))
		{
		echo "Updated";
		?>
        <script>
		window.location="SkinType.php";
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
		$insQry = "insert into tbl_skintype(skintype_name) values('".$stid."')";


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
		$delQry = "delete from tbl_skintype where skintype_id=".$_GET["stid"];
		if($Con->query($delQry))
		{
		?>
        <script>
		alert("Deleted");
		window.location = "SkinType.php";
		</script>
        <?php
		}
		
	}
	
	$did='';
	$dname='';
if(isset($_GET["eid"]))
{
	$selQry="select * from tbl_skintype where skintype_id='". $_GET['eid']."'";
	$row=$Con->query($selQry);
	$data=$row->fetch_assoc();
	$did=$data['skintype_id'];
	$dname=$data['skintype_name'];
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
    .form-container {
      margin-top: 50px;
    }
    .table-container {
      margin-top: 30px;
    }
    .table th, .table td {
      text-align: center;
    }
  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="container form-container">
  <!-- Skin Type Form -->
  <form method="post" action="">
    <div class="form-group row">
      <label for="txt_skintype" class="col-sm-2 col-form-label">Skin Type</label>
      <div class="col-sm-10">
        <input required type="text" class="form-control" name="txt_skintype" id="txt_skintype" value="<?php echo $dname ?>" />
        <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $did ?>" />
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
      </div>
    </div>
  </form>
</div>

<div class="container table-container">
  <!-- Skin Type Table -->
  <table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Category</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i = 0;
      $selQry = "SELECT * FROM tbl_skintype";
      $result = $Con->query($selQry);
      while ($row = $result->fetch_assoc()) {
        $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row["skintype_name"]; ?></td>
        <td><a href="SkinType.php?stid=<?php echo $row["skintype_id"]; ?>" class="btn btn-danger btn-sm">Delete</a></td>
        <td><a href="SkinType.php?eid=<?php echo $row["skintype_id"]; ?>" class="btn btn-warning btn-sm">Edit</a></td>
      </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>
