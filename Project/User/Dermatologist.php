<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verified Botanist</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Dermatologists List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selQry = "SELECT * FROM tbl_derma b 
                                    INNER JOIN tbl_place p ON b.place_id = p.place_id 
                                    INNER JOIN tbl_district d ON d.district_id = p.district_id 
                                    WHERE derma_vstatus = 1";
                        $result = $Con->query($selQry);
                        $i = 0;
                        while ($data = $result->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo htmlspecialchars($data['derma_name']); ?></td>
                                <td><?php echo htmlspecialchars($data['derma_contact']); ?></td>
                                <td>
                                    <img src="../Assets/Files/Derma/Photo/<?php echo htmlspecialchars($data['derma_photo']); ?>" width="100" height="100" alt="Dermatologist Photo" class="img-thumbnail">
                                </td>
                                <td>
                                    <a href="Chat.php?id=<?php echo $data['derma_id']; ?>" class="btn btn-primary">Chat</a>
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

<!-- Add this CSS for further styling -->
<style>
.card {
    border-radius: 10px; /* Rounded corners for the card */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.table {
    margin-bottom: 0; /* Remove bottom margin */
}

.table th, .table td {
    vertical-align: middle; /* Center content vertically */
}

.img-thumbnail {
    border-radius: 10px; /* Rounded corners for images */
}
</style>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>