<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

$xValues = [];
$yValues = [];

// Check if the form is submitted
if (isset($_POST['btn_submit'])) {
    $startDate = $_POST['txt_sdate'];
    $endDate = $_POST['txt_edate'];

    // Fetch category names
    $selX = "SELECT * FROM tbl_seller WHERE seller_vstatus = 1";
    $resX = $Con->query($selX);
    
    while ($dataX = $resX->fetch_assoc()) {
        $xValues[] = $dataX['seller_name'];

        // Fetch count of items in cart per category within the date range
        $selY = "SELECT COUNT(*) as count 
                 FROM tbl_cart c INNER join tbl_product p on c.product_id=p.product_id inner join tbl_booking b on c.booking_id=b.booking_id 
                 WHERE p.seller_id = " . $dataX['seller_id'] . " 
                 AND cart_status BETWEEN 0 AND 5 
                 AND b.booking_date BETWEEN '$startDate' AND '$endDate'";
        $resY = $Con->query($selY);
        $dataY = $resY->fetch_assoc();
        $yValues[] = $dataY['count'];
    }
}

// Encode PHP arrays to JSON for use in JavaScript
$xValuesJson = json_encode($xValues);
$yValuesJson = json_encode($yValues);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Assets/JQ/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
    <style>
        .chart-space {
            display: flex;
            justify-content: center;
        }
        .chart-box {
            height: 500px;
            width: 500px;
        }
    </style>
</head>
<body>

<!-- Form for Date Inputs -->
<form method="post" action="">
    <div>
        <label for="txt_sdate">Start Date:</label>
        <input type="date" name="txt_sdate" id="txt_sdate" required />
    </div>
    <div>
        <label for="txt_edate">End Date:</label>
        <input type="date" name="txt_edate" id="txt_edate" required />
    </div>
    <div>
        <input type="submit" name="btn_submit" value="Submit" />
    </div>
</form>

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
        const numColors = <?php echo count($xValues); ?>; // Number of colors based on the number of sellers
        const { fillColors, borderColors } = generatePastelBrightColorPalettes(numColors);

        var ctx = $("#pie-chart").get(0).getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                datasets: [{
                    data: <?php echo $yValuesJson; ?>, // Use PHP-encoded yValues
                    backgroundColor: fillColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }],
                labels: <?php echo $xValuesJson; ?>, // Use PHP-encoded xValues
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
