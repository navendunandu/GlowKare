<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Table</title>
    <!-- Bootstrap CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .table-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>

    <style>
        .table-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="table-container">
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Sl No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Product</th>
                        <th>File</th>
                        <th>Reply</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    $selQry="select*from tbl_complaint c inner join tbl_product p on c.product_id=p.product_id where p.seller_id=".$_SESSION['sid'];
                    $result=$Con->query($selQry);
                    while($row=$result->fetch_assoc()) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['complaint_title'] ?></td>
                        <td><?php echo $row['complaint_content'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><img src="../Assets/Files/User/Complaint/<?php echo $row['complaint_file'];?>" /></td>
                        <td><a href="Reply.php?cid=<?php echo $row['complaint_id'] ?>" class="btn btn-primary btn-sm">Reply</a></td>
                        <td><?php echo $row['complaint_date'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>