<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Center the form on the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* Styling the table form container */
        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Style for table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        /* Input fields */
        input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
        
        /* General table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            font-family: Arial, sans-serif;
            text-align: left;
        }

        /* Table borders and striped rows */
        table, th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        /* Header row */
        th {
            background-color: #f2f2f2;
            color: black;
            text-align: center;
        }

        /* Striped rows */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Hover effect */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Image styling */
        img {
            width: 100px;
            height: auto; /* Maintain aspect ratio */
        }
    
    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="form-container">
    <form>
        <table>
            <tr>
                <td>Start Date</td>
                <td>
                    <input type="date" name="txt_sdate" id="txt_sdate" required />
                </td>
            </tr>
            <tr>
                <td>End Date</td>
                <td>
                    <input type="date" name="txt_edate" id="txt_edate" required />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</div>
<br>
</form>
<?php
if(isset($_POST['btn_submit']))
{
	$start=$_POST['txt_sdate'];
	$end=$_POST['txt_edate'];
	 $SelQry="SELECT * FROM tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id INNER JOIN tbl_product p on p.product_id=c.product_id where b.booking_date BETWEEN '$start' and '$end'";
	$result=$Con->query($SelQry);
	$i=0;
	
	
		?>
       <table>
    <tr>
        <th>Sl No</th>
        <th>Product</th>
        <th>Photo</th>
        <th>Price</th>
        <th>Quantity</th>
        <th></th>
    </tr>
    
    <?php
    $i = 0; // Initialize counter outside loop
    while ($row = $result->fetch_assoc()) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["product_name"]; ?></td>
            <td><img src="../Assets/Files/Seller/Productdocs/<?php echo $row['product_photo']; ?>" alt="Product Image" /></td>
            <td><?php echo $row["product_price"]; ?></td>
            <td><?php echo $row["cart_quantity"]; ?></td>
            <td><!-- Add functionality or buttons here if needed --></td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
}
?>
</body>
</html>
</?php
include("Foot.php");
ob_flush();
?>