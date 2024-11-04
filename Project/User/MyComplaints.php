<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Complaints List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Sl No.</th>
                            <th>Date</th>
                            <th>Title</th>
                           
                            <th>Product</th>
                            <th>File</th>
                            <th>Description</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $selQry = "SELECT * FROM tbl_complaint c 
                                    INNER JOIN tbl_product p ON c.product_id = p.product_id 
                                    
                                    WHERE c.user_id = " . $_SESSION['uid'];
                        $result = $Con->query($selQry);
                        while ($row = $result->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo htmlspecialchars($row['complaint_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['complaint_title']); ?></td>
                               
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td>
                                    <img src="../Assets/Files/User/Complaint/<?php echo htmlspecialchars($row['complaint_file']); ?>" width="100" height="100" class="img-thumbnail" alt="Complaint File"/>
                                </td>
                                <td><?php echo htmlspecialchars($row['complaint_content']); ?></td>
                                <td>
                                    <?php 
                                    if ($row['complaint_status'] == 0) {
                                        echo "Your complaint is not received yet";
                                    } else if ($row['complaint_status'] == 1) {
                                        echo htmlspecialchars($row['complaint_reply']);
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

<!-- Add this CSS for additional styling -->
<style>
.card {
    border-radius: 10px; /* Rounded corners for the card */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.table {
    margin-bottom: 0; /* Remove bottom margin */
}

.table td {
    vertical-align: middle; /* Center content vertically */
}

.img-thumbnail {
    border-radius: 5px; /* Rounded corners for images */
    max-width: 100px; /* Limit the width of the image */
    height: auto; /* Maintain aspect ratio */
}
</style>


</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>