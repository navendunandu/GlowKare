<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();

if(isset($_GET['cid']))
{
	$id=$_GET['cid'];
	$stat=$_GET['stat'];
	$upQry="update tbl_cart set cart_status='$stat' where cart_id='$id'";
	$Con->query($upQry);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .table-container {
            max-width: 90%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table img {
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .action-links a {
            margin: 0 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
<div class="container table-container">
    <h2 class="text-center">Booking List</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Sl.No</th>
                <th>Photo</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_booking b
                   INNER JOIN tbl_cart c ON c.booking_id = b.booking_id
                   INNER JOIN tbl_product p ON p.product_id = c.product_id
                   INNER JOIN tbl_seller s ON s.seller_id = p.seller_id
                   WHERE s.seller_id = " . $_SESSION['sid'];
        $result = $Con->query($selQry);
        while ($row = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><img src="../Assets/Files/Seller/Productdocs/<?php echo $row['product_photo']; ?>" alt="Product Photo"></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['cart_quantity']; ?></td>
            <td><?php echo $row['product_price']; ?></td>
            <td><?php echo $row['product_price'] * $row['cart_quantity']; ?></td>
            <td>
                <?php
                switch ($row['cart_status']) {
                    case 1: echo "PAYMENT RECEIVED"; break;
                    case 2: echo "ORDER PACKED"; break;
                    case 3: echo "ORDER SHIPPED"; break;
                    case 4: echo "ORDER DELIVERED"; break;
                }
                ?>
            </td>
            <td class="action-links">
                <?php if ($row['cart_status'] == 1) { ?>
                <a href="Booking.php?cid=<?php echo $row['cart_id']; ?>&stat=2" class="btn btn-warning btn-sm">Packed</a>
                <?php } ?>
                <?php if ($row['cart_status'] == 2) { ?>
                <a href="Booking.php?cid=<?php echo $row['cart_id']; ?>&stat=3" class="btn btn-primary btn-sm">Shipped</a>
                <?php } ?>
                <?php if ($row['cart_status'] == 3) { ?>
                <a href="Booking.php?cid=<?php echo $row['cart_id']; ?>&stat=4" class="btn btn-success btn-sm">Delivered</a>
                <?php } ?>
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