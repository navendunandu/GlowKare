<?php 
include("../Assets/Connection/connection.php");
session_start();
ob_start();
if(isset($_POST['btn_submit']))
{
	$id=$_GET['pid'];
    $galimg=$_FILES['file_image']['name']; 
	$tempgalimg=$_FILES['file_image']['tmp_name']; 
	move_uploaded_file($tempgalimg, '../Assets/Files/gallary/'.$galimg);
    $insQry="insert into tbl_gallary(gallary_image,product_id) values('$galimg','$id')";
	if($Con->query($insQry))
	{
		?>
        <script>
		alert("Inserted");
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("Error");
		</script>
        <?php

	  }
  }
   if(isset($_GET["did"]))
  {
	  $delQry= "delete from tbl_gallary where gallary_id=".$_GET["did"];
	  if($Con->query($delQry))
	  {
		  ?>
          <script>
		  window.location = "gallary.php";
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
    <title>Gallery Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .form-container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="form-container">
        <h2 class="text-center">Upload Gallery Image</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="mb-3">
                <label for="file_image" class="form-label">Gallery Image</label>
                <input type="file" class="form-control" name="file_image" id="file_image" required>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit">
            </div>
        </form>
    </div>

    <h2 class="text-center">Gallery List</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>SI No</th>
                <th>Product Name</th>
                <th>Gallery Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_gallary g INNER JOIN tbl_product p ON g.product_id = p.product_id";
        $result = $Con->query($selQry);
        while ($row = $result->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["product_name"]; ?></td>
                <td><img src="../Assets/Files/gallary/<?php echo $row['gallary_image']; ?>" alt="Gallery Image"></td>
                <td><a href="gallary.php?did=<?php echo $row["gallary_id"]; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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