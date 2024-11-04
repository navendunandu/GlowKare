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
        .form-container {
            text-align: center;
            margin-bottom: 20px;
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

</form>
<?php
if(isset($_POST['btn_submit']))
{
    $start=$_POST['txt_sdate'];
	$end=$_POST['txt_edate'];
    $xValues = [];
$yValues = [];

// Fetch category names
$selX = "SELECT * FROM tbl_brand";
$resX = $Con->query($selX);
while ($dataX = $resX->fetch_assoc()) {
    $xValues[] = $dataX['brand_name'];

    // Fetch count of items in cart per category
    $selY = "SELECT COUNT(*) as count 
             FROM tbl_cart c 
             INNER JOIN tbl_product p ON p.product_id = c.product_id 
             INNER JOIN tbl_brand b ON b.brand_id = p.brand_id 
             INNER JOIN tbl_booking bk on bk.booking_id=c.booking_id
             WHERE b.brand_id = " . $dataX['brand_id'] . " 
             AND cart_status BETWEEN 0 AND 5 AND bk.booking_date BETWEEN '".$start."' AND '".$end."'";
    $resY = $Con->query($selY);
    $dataY = $resY->fetch_assoc();
    $yValues[] = $dataY['count'];
}

// Encode PHP arrays to JSON for use in JavaScript
$xValuesJson = json_encode($xValues);
$yValuesJson = json_encode($yValues);
    ?>
<div class="chart-space">
<div class="chart-box">
                        <div class="bg-light rounded p-4">
                            <h6 class="mb-4">Pie Chart</h6>
                            <canvas id="pie-chart" width="500px" height="500px"></canvas>
                        </div>
                    </div>
</div>
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
        const numColors = <?php echo count($xValues); ?>; // Number of colors based on the number of brands
        const { fillColors, borderColors } = generatePastelBrightColorPalettes(numColors);

        var ctx5 = $("#pie-chart").get(0).getContext("2d");
        var myChart5 = new Chart(ctx5, {
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
<?php
}
?>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>