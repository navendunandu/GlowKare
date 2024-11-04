<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();


if(isset($_POST["btn_submit"]))
{
	$photo=$_FILES['file_photo']['name'];
	$tmpphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tmpphoto, '../Assets/Files/Seller/Productdocs/'.$photo);
	$name=$_POST['txt_name'];
	$price= $_POST["txt_price"];
	$descrip=$_POST["txt_des"];
	$stype=$_POST['sel_stype'];
	$concern=$_POST['sel_concern'];
	$routine=$_POST['sel_routine'];
	$brand=$_POST['sel_brand'];
	$ingre= $_POST["txt_ing"];
	$selprod="select * from tbl_product where product_name='".$name."'";
	$resprod=$Con->query($selprod);
    if($resprod->num_rows>0){
		?>
		  <script>
		    alert("Product  Already Exists");
		  </script>
		  <?php	
	}
	else{
	  $InsQry = "insert into tbl_product(product_photo,product_name,product_price,product_des,skintype_id,skinconcern_id,routine_id,brand_id,product_ingred,seller_id)
	 values('$photo','$name','$price','$descrip','$stype','$concern','$routine','$brand','$ingre','".$_SESSION['sid']."')";
	  

		if($Con->query($InsQry))
		{
			echo "inserted";
		}
		else
		{
			echo "error";
		}
	}
}
	
	if(isset($_GET["did"]))
{
	$delQry = "delete from tbl_product where product_id=".$_GET["did"];
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
    <title>Product Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            margin: 50px auto;
        }
        .table img {
            width: 20px;
            height: 20px;
            object-fit: cover;
        }
        .form-container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 8px 9px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .table-container {
            padding: 20px;
            background-color: #f1f1f1;
        }
        textarea, input[type="text"] {
            resize: none;
        }
        
    </style>
</head>

<body>
<div class="container">
    <div class="form-container">
        <h2 class="text-center">Add New Product</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="mb-3">
                <label for="file_photo" class="form-label">Product Photo</label>
                <input type="file" class="form-control" name="file_photo" id="file_photo" required>
            </div>
            <div class="mb-3">
                <label for="txt_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="txt_name" id="txt_name" required>
            </div>
            <div class="mb-3">
                <label for="txt_price" class="form-label">Product Price</label>
                <input type="text" class="form-control" name="txt_price" id="txt_price" required>
            </div>
            <div class="mb-3">
                <label for="txt_des" class="form-label">Product Description</label>
                <textarea class="form-control" name="txt_des" id="txt_des" cols="65" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="sel_stype" class="form-label">Skin Type</label>
                <select class="form-select" name="sel_stype" id="sel_stype" required>
                    <option value="" disabled selected>--Select---</option>
                    <?php
                    $selQry="select * from tbl_skintype";
                    $result=$Con->query($selQry);
                    while($row=$result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['skintype_id'] ?>"><?php echo $row['skintype_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="sel_concern" class="form-label">Skin Concern</label>
                <select class="form-select" name="sel_concern" id="sel_concern" required>
                    <option value="" disabled selected>--Select---</option>
                    <?php
                    $selQry="select * from tbl_skinconcern";
                    $result=$Con->query($selQry);
                    while($row=$result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['skinconcern_id'] ?>"><?php echo $row['skinconcern_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="sel_routine" class="form-label">Routine</label>
                <select class="form-select" name="sel_routine" id="sel_routine" required>
                    <option value="" disabled selected>--Select---</option>
                    <?php
                    $selQry="select * from tbl_routine";
                    $result=$Con->query($selQry);
                    while($row=$result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['routine_id'] ?>"><?php echo $row['routine_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="sel_brand" class="form-label">Brand</label>
                <select class="form-select" name="sel_brand" id="sel_brand" required>
                    <option value="" disabled selected>--Select---</option>
                    <?php
                    $selQry="select * from tbl_brand";
                    $result=$Con->query($selQry);
                    while($row=$result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="txt_ing" class="form-label">Ingredients</label>
                <textarea class="form-control" name="txt_ing" id="txt_ing" cols="65" rows="5" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="btn_submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <div class="table-container">
        <h2 class="text-center">Product List</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
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
            $i=0;
            $selQry="SELECT * FROM tbl_product p 
                    INNER JOIN tbl_skintype t ON p.skintype_id=t.skintype_id 
                    INNER JOIN tbl_skinconcern c ON p.skinconcern_id=c.skinconcern_id 
                    INNER JOIN tbl_routine r ON p.routine_id=r.routine_id 
                    INNER JOIN tbl_brand b ON p.brand_id=b.brand_id";
            $result=$Con->query($selQry);
            while($row=$result->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><img src="../Assets/Files/Seller/Productdocs/<?php echo $row['product_photo']; ?>" alt="Product Photo"></td>
                    <td><?php echo $row["product_name"]?></td>
                    <td><?php echo $row["product_price"]?></td>
                    <td><?php echo $row["product_des"]?></td>
                    <td><?php echo $row["skintype_name"]?></td>
                    <td><?php echo $row["skinconcern_name"]?></td>
                    <td><?php echo $row["routine_name"]?></td>
                    <td><?php echo $row["brand_name"]?></td>
                    <td><?php echo $row["product_ingred"]?></td>
                    <td>
                        <a href="Product.php?did=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="Stock.php?sid=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm">Add Stock</a>
                        <a href="Gallary.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-secondary btn-sm">Add Image</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>