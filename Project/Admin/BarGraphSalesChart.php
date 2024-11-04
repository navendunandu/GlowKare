<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .form-container table {
            width: 100%;
        }
        .form-container input[type="date"], .form-container input[type="submit"] {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container form-container">
<form id="form1" name="form1" method="post" action="">
        <table class="table">
            <tr>
                <td><label for="txt_sdate">Start Date</label></td>
                <td><input type="date" name="txt_sdate" id="txt_sdate" class="form-control" required /></td>
            </tr>
            <tr>
                <td><label for="txt_edate">End Date</label></td>
                <td><input type="date" name="txt_edate" id="txt_edate" class="form-control" required /></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</div>

</form>
<?php
if(isset($_POST['btn_submit']))
{
    $start=$_POST['txt_sdate'];
	$end=$_POST['txt_edate'];
    $sql = "
    SELECT MONTH(booking_date) AS month, SUM(booking_amount) AS total_sales 
    FROM tbl_booking 
    WHERE booking_date BETWEEN '$start' AND '$end'
    AND YEAR(booking_date) = YEAR(CURDATE())
    GROUP BY MONTH(booking_date)
    ORDER BY month";

$result = $Con->query($sql);

$sales_data = [];
$months = range(1, 12);

// Initialize sales_data with 0 for each month
foreach ($months as $month) {
    $sales_data[$month] = 0;
}

// Populate sales_data with actual sales amounts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sales_data[$row['month']] = $row['total_sales'];
    }
}
    ?>
<canvas id="salesChart" width="400" height="200"></canvas>
<script>
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const salesData = <?php echo json_encode(array_values($sales_data)); ?>;
    const months = <?php echo json_encode(array_keys($sales_data)); ?>;
    
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months.map(month => monthNames[month - 1]),
            datasets: [{
                label: 'Sales Amount',
                data: salesData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php
}
?>



</body>
</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>
