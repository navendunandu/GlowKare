<?php
include("../Assets/Connection/Connection.php");

session_start();
ob_start();


if(isset($_GET['id']))
{

	  $InsQry = "insert into tbl_saleproducts(saleproduct_percentage,product_id,sale_id)
	 values('".$_GET['per']."','".$_GET['id']."','".$_GET['sid']."')";
	 

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
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: overflow-x;
        }
        .table th {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
        }
        .table img {
            max-width: 150px;
            height: auto;
            border-radius: 4px;
        }
        .action-link {
            color: #007bff;
            text-decoration: none;
        }
        .action-link:hover {
            text-decoration: underline;
        }
    </style>
    <title>Add Product</title>
</head>
<body>



<div class="container">
    <a href="HomePage.php">
        Home
    </a>
    
    
</div>
    <div class="container-fluid">
        <h2 class="text-center mb-4">Product Management</h2>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Product Photo</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Description</th>
                    <th>Skin Type</th>
                    <th>Skin Concern</th>
                    <th>Routine</th>
                    <th>Brand</th>
                    <th>Ingredients</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 0;
                $selQry = "SELECT * FROM tbl_product p 
                            INNER JOIN tbl_skintype t ON p.skintype_id = t.skintype_id 
                            INNER JOIN tbl_skinconcern c ON p.skinconcern_id = c.skinconcern_id 
                            INNER JOIN tbl_routine r ON p.routine_id = r.routine_id 
                            INNER JOIN tbl_brand b ON p.brand_id = b.brand_id";
                $result = $Con->query($selQry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><img src="../Assets/Files/Seller/Productdocs/<?php echo $row['product_photo']; ?>" alt="<?php echo $row['product_name']; ?>" /></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["product_price"]; ?></td>
                    <td><?php echo $row["product_des"]; ?></td>
                    <td><?php echo $row["skintype_name"]; ?></td>
                    <td><?php echo $row["skinconcern_name"]; ?></td>
                    <td><?php echo $row["routine_name"]; ?></td>
                    <td><?php echo $row["brand_name"]; ?></td>
                    <td><?php echo $row["product_ingred"]; ?></td>
                    <td><a href="Product.php?did=<?php echo $row['product_id'];?>">Delete</a> <a href="Stock.php?pid=<?php echo $row['product_id'];?>">Add Stock</a>
     <a href="Gallery.php?pid=<?php echo $row['product_id'];?>">Add Pictures</a></td>
  </tr>
                    <td></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
</html>

<?php
include("Foot.php");
ob_flush();
?>