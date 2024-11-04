<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");


if(isset($_POST['btn_sub']))
{	
	$disid=$_POST['sel_dis'];
	$place=$_POST['txt_place'];
  $selDis="select * from tbl_place where place_name='".$place."'";
	$resDis=$Con->query($selDis);
    if($resDis->num_rows>0){
		?>
		  <script>
		    alert("Place Already Exists");
		  </script>
		  <?php	
	}
	else{
  $insqry="insert into tbl_place (place_name,district_id) values('$place','$disid') ";
	if($Con->query($insqry))
	{
		?>
<script>
  alert('Inserted');
</script>
<?php
  }
}
}
if(isset($_GET["did"]))
{
	echo $delQry = "delete from tbl_place where place_id=".$_GET["did"];
	if($Con->query($delQry))
	{
		?>
        <script>
          alert("Data Deleted")
		window.location = "Place.php";
		</script>
        <?php
	}
  
}
?>


<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <style>
    .form-container {
      margin-top: 50px;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }

    .form-group {
      text-align: center;
    }
  </style>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <div class="container form-container">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">
          <h4>Place</h4>
        </div>
        <div class="card-body">
          <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
              <label for="sel_dis">Select District</label>
              <select class="form-control" name="sel_dis" id="sel_dis" required>
                <option value="">--Select--</option>
                <?php
              $selQry = "SELECT * FROM tbl_district";
              $result = $Con->query($selQry);
              while ($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['district_id']; ?>">
                  <?php echo $row['district_name']; ?>
                </option>
                <?php 
              }
            ?>
              </select>
            </div>

            <div class="form-group">
              <label for="txt_place">Place</label>
              <input type="text" class="form-control" name="txt_place" id="txt_place" required />
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-success" name="btn_sub" id="btn_sub">Submit</button>
              <button type="reset" class="btn btn-secondary" name="btn_reset" id="btn_reset">Clear</button>
            </div>
          </form>
        </div>
      </div>
    </div>

</body>

<table>
  <tr>
    <td>#</td>
    <td>Place</td>
    <td>District</td>
  </tr>
  <?php 
$i=0;
		$selqry="select *  from tbl_place p inner join tbl_district d on p.district_id = d.district_id";
		$result=$Con->query($selqry);
		while($row=$result->fetch_assoc())
		{
      $i++;
			
?>
  <tr>
      <td><?php echo $i;?></td>
    <td>
      <?php echo $row["place_name"]?>
    </td>
    <td>
      <?php echo $row["district_name"]?>
    </td>
    <td><a href="Place.php?did=<?php echo $row["place_id"]?>">Delete</a> </td>


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