<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
if(isset($_POST["btn_submit"]))
{
	
	$quantity=$_POST['txt_quantity'];

	

	  $InsQry = "insert into tbl_stock(stock_quantity,stock_date,product_id)
	 values('$quantity',curdate(),'".$_GET['sid']."')";
	 

		if($Con->query($InsQry))
		{
			echo "inserted";
		}
		else
		{
			echo "error";
		}

	}
	if(isset($_GET["pid"]))
{
	$delQry = "delete from tbl_stock where stock_id=".$_GET["pid"];
	if($Con->query($delQry))
	{
		?>
        <script>
		window.location = "Product.php";
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add and Manage Product Stock</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="container mt-4">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h5 class="text-center">Add Stock Quantity</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="txt_quantity" class="form-label">Stock Quantity</label>
          <input type="text" class="form-control" id="txt_quantity" name="txt_quantity" placeholder="Enter Quantity">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-success" id="btn_submit" name="btn_submit">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Table to Display Stock Information -->
<div class="container mt-5">
  <table class="table table-bordered table-hover table-striped text-center">
    <thead class="table-dark">
      <tr>
        <th scope="col">Sl No</th>
        <th scope="col">Product Name</th>
        <th scope="col">Stock Date</th>
        <th scope="col">Quantity</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i=0;
      $selQry = "SELECT * FROM tbl_stock s 
                 INNER JOIN tbl_product p ON s.product_id = p.product_id";
      $result = $Con->query($selQry);
      while($row = $result->fetch_assoc()) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row["product_name"]; ?></td>
        <td><?php echo $row["stock_date"]; ?></td>
        <td><?php echo $row["stock_quantity"]; ?></td>
        <td>
          <a href="Stock.php?pid=<?php echo $row['stock_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
    
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>