<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");

$id=$_GET['pid'];
$selQry="select * from tbl_product p inner join tbl_skintype t on p.skintype_id=t.skintype_id inner join tbl_skinconcern c on p.skinconcern_id=c.skinconcern_id inner join tbl_routine r on p.routine_id=r.routine_id inner join tbl_brand b on p.brand_id=b.brand_id where p.product_id='$id' ";
  $result=$Con->query($selQry);
  $row=$result->fetch_assoc();
 ?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 product-container">
            <!-- Product Title -->
            <div class="product-header">
                <h1 class="product-title">Product Details</h1>
            </div>

            <!-- Boxed Product Details -->
            <div class="product-details-box">
                <div class="row">
                    <!-- Main Product Image -->
                    <div class="col-md-6">
                        <div class="main-product-photo">
                            <img src="../Assets/Files/Seller/Productdocs/<?php echo htmlspecialchars($row['product_photo']); ?>" alt="Product Photo" class="img-fluid">
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="col-md-6">
                        <div class="product-details">
                            <div class="product-detail-item">
                                <span class="detail-label">Product Name:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($row['product_name']); ?></span>
                            </div>
                            <div class="product-detail-item">
                                <span class="detail-label">Description:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($row['product_des']); ?></span>
                            </div>
                            <div class="product-detail-item">
                                <span class="detail-label">Price:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($row['product_price']); ?></span>
                            </div>
                            <div class="product-detail-item">
                                <span class="detail-label">Brand:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($row['brand_name']); ?></span>
                            </div>
                            <div class="product-detail-item">
                                <span class="detail-label">Skin Routine:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($row['routine_name']); ?></span>
                            </div>
                            <div class="product-detail-item">
                                <span class="detail-label">Skin Concern:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($row['skinconcern_name']); ?></span>
                            </div>
                            <div class="product-detail-item">
                                <span class="detail-label">Skin Type:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($row['skintype_name']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add this CSS for styling the box -->
<style>
.product-details-box {
    border: 1px solid #ddd; /* Light grey border */
    border-radius: 8px; /* Rounded corners */
    padding: 20px; /* Padding inside the box */
    background-color: #fff; /* White background */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}
.product-detail-item {
    margin-bottom: 10px; /* Spacing between items */
}
.detail-label {
    font-weight: bold; /* Bold for labels */
}
</style>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>