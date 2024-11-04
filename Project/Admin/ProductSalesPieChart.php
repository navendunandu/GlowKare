<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

// Initialize arrays for product names and counts
$xValues = [];
$yValues = [];

// Check if form is submitted
if (isset($_POST['btn_submit'])) {
    // Get start and end dates
    $startDate = $_POST['txt_sdate'];
    $endDate = $_POST['txt_edate'];

    // Fetch product names
    $selX = "SELECT * FROM tbl_product";
    $resX = $Con->query($selX);
    while ($dataX = $resX->fetch_assoc()) {
        $xValues[] = $dataX['product_name'];

        // Fetch count of items in cart for each product within the date range
        $selY = "SELECT COUNT(*) as count 
                 FROM tbl_cart c 
                 INNER JOIN tbl_product p ON p.product_id = c.product_id 
                 INNER JOIN tbl_brand b ON b.brand_id = p.brand_id 
                 INNER JOIN tbl_booking bk ON bk.booking_id = c.booking_id
                 WHERE c.product_id = " . $dataX['product_id'] . " 
                 AND cart_status BETWEEN 0 AND 5 
                 AND bk.booking_date BETWEEN '$startDate' AND '$endDate'";
        $resY = $Con->query($selY);
        $dataY = $resY->fetch_assoc();
        $yValues[] = $dataY['count'];
    }

    // Encode PHP arrays to JSON for use in JavaScript
    $xValuesJson = json_encode($xValues);
    $yValuesJson = json_encode($yValues);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Assets/JQ/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Product Cart Count Pie Chart</title>
    <style>
        .chart-space {
            display: flex;
            justify-content: center;
        }
        .chart-box {
            height: 500px;
            width: 500px;
        }
        .form-container {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="form-container">
    <form method="post" action="">
        <label for="txt_sdate">Start Date:</label>
        <input type="date" name="txt_sdate" id="txt_sdate" required />
        <br />
        <label for="txt_edate">End Date:</label>
        <input type="date" name="txt_edate" id="txt_edate" required />
        <br />
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
    </form>
</div>

<div class="chart-space">
    <div class="chart-box">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Pie Chart</h6>
            <canvas id="pie-chart" width="100" height="100"></canvas>
        </div>
    </div>
</div>
<br><br><br>
<script>
    function generatePastelBrightColorPalettes(numColors) {
        const fillColors = [];
        const borderColors = [];
        const colorStep = 360 / numColors;
        for (let i = 0; i < numColors; i++) {
            const hue = Math.round(i * colorStep);

            // Generate pastel RGB values for bright colors
            const saturation = 50 + Math.random() * 30; // Adjust the saturation range
            const lightness = 65 + Math.random() * 30;  // Adjust the lightness for pastel effect

            const fillColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 0.65)`; // 0.65 alpha value for fill
            const borderColor = `hsla(${hue}, ${saturation}%, ${lightness}%, 1)`;  // 1 alpha value for border

            fillColors.push(fillColor);
            borderColors.push(borderColor);
        }
        return { fillColors, borderColors };
    }

    (function ($) {
        "use strict";

        // Fetching the color palettes
        const numColors = <?php echo count($xValues); ?>; // Number of colors based on the number of products
        const { fillColors, borderColors } = generatePastelBrightColorPalettes(numColors);

        var ctx = $("#pie-chart").get(0).getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                datasets: [{
                    data: <?php echo isset($yValuesJson) ? $yValuesJson : '[]'; ?>, // Use PHP-encoded yValues
                    backgroundColor: fillColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }],
                labels: <?php echo isset($xValuesJson) ? $xValuesJson : '[]'; ?>, // Use PHP-encoded xValues
            },
            options: {
                responsive: true
            }
        });
    })(jQuery);
</script>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
