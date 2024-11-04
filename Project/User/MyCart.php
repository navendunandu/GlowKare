
<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
if(isset($_POST['btn_checkout']))
{
	 $rate=$_POST['txt_rate'];
	 $id=$_POST['txt_id'];
	 $address=$_POST['txt_address'];
  $upSry="update tbl_booking set booking_status='1',booking_amount='$rate',booking_date=curdate(),booking_address='".$address."' where booking_id=".$id;
  $Con->query($upSry);
  $upSry="update tbl_cart set cart_status='1' where booking_id=".$id;
  $Con->query($upSry);
  header("location:Payment.php?bid=".$id);
  	
}
if(isset($_GET["cid"]))
{
	$delQry = "delete from tbl_cart where cart_id=".$_GET["cid"];
	if($Con->query($delQry))
	{
		?>
        <script>
		window.location = "MyCart.php";
		</script>
        <?php
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
<form id="form1" name="form1" method="post" action="" class="container mt-5">
    <?php
    $i = 0;
    $bid = '';
    $checkout = 0;
    $selQry = "SELECT * FROM tbl_cart c 
               INNER JOIN tbl_booking b ON c.booking_id = b.booking_id 
               INNER JOIN tbl_product p ON c.product_id = p.product_id 
               WHERE b.booking_status = 0 AND c.cart_status = 0 AND b.user_id = " . $_SESSION['uid'];
    $result = $Con->query($selQry);
    if ($result->num_rows > 0) {
        ?>
        <h2 class="text-center mb-4">My Cart</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $bid = $row['booking_id'];
                    $i++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><img src="../Assets/Files/Seller/Productdocs/<?php echo $row['product_photo']; ?>" class="img-fluid" alt="Product" style="height: 100px;"></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td>
                            <input type="number" name="txt_quantity" id="txt_quantity" 
                            class="form-control w-50" 
                            value="<?php echo $row['cart_quantity']; ?>" 
                            onChange="TotalPrice(this.value,'<?php echo $row['cart_id']?>')"/>
                        </td>
                        <td><?php echo $row['product_price']; ?> </td>
                        <td><?php echo $total = $row['product_price'] * $row['cart_quantity']; ?></td>
                        <td><a href="MyCart.php?cid=<?php echo $row['cart_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php
                    $checkout += $total;
                }
                ?>
            </tbody>
        </table>

        <input type="hidden" name="txt_rate" id="txt_rate" value="<?php echo $checkout; ?>" />
        <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $bid; ?>" />

        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <td>Enter Shipping Address</td>
                </tr>
                <tr>
                    <td><textarea class="form-control" required name="txt_address" id=""></textarea></td>
                </tr>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4>Total Checkout Price: <span class="text-primary"><?php echo $checkout; ?></span></h4>
            <button type="submit" name="btn_checkout" id="btn_checkout" class="btn btn-success">Checkout</button>
        </div>
        
        <?php
    } else {
        echo "<h3 class='text-center text-danger mt-5'>No items in cart</h3>";
    }
    ?>
</form>

</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function TotalPrice(qty,cid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPrice.php?qty=" + qty+"&cid="+cid,
      success: function (result) {

       // $("#txt_quantity").html(result);
	   window.location.reload()

      }
    });
  }

</script>
</html>
<?php
include("Foot.php");
ob_flush();
?>
