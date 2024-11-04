
<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    td, th{
        color:black !important;
    }
</style>
</head>

<body>

<div class="container mt-5">
        <table class="table table-bordered table-hover table-striped text-dark">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sl.No</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selQry = "SELECT * FROM tbl_booking b 
                           INNER JOIN tbl_cart c ON b.booking_id = c.booking_id 
                           INNER JOIN tbl_product p ON p.product_id = c.product_id 
                           WHERE b.booking_status >= '2' AND b.user_id = " . $_SESSION['uid'];
                $result = $Con->query($selQry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><img src="../Assets/Files/Seller/Productdocs/<?php echo $row['product_photo']; ?>" class="img-fluid" height="100" alt="Product Image"/></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['cart_quantity']; ?></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td><?php echo $row['product_price'] * $row['cart_quantity']; ?></td>
                    <td>
                        <?php 
                        if ($row['cart_status'] == 2) {
                            echo '<span class="badge badge-success text-dark">Confirmed</span>';
                        } elseif ($row['cart_status'] == 3) {
                            echo '<span class="badge badge-info text-dark">Shipped</span>';
                        } elseif ($row['cart_status'] == 4) {
                            echo '<span class="badge badge-primary text-dark">Delivered</span>';
                        } else {
                            echo '<span class="badge badge-secondary text-dark">Processing</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="postcomplaint.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm">Complaint</a>
                        <a href="Rating.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-warning btn-sm">Rating</a>
                        <a href="Bill.php?id=<?php echo $row['booking_id']; ?>" class="btn btn-warning btn-sm">View Bill</a>
                    </td>
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