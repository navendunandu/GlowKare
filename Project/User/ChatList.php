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
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Chat List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Chat</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selChat = "SELECT * FROM tbl_chatlist WHERE from_id='" . $_SESSION['uid'] . "' OR to_id='" . $_SESSION['uid'] . "'";
                    $res = $Con->query($selChat);
                    $i = 0;
                    while ($data = $res->fetch_assoc()) {
                        $i++;
                        if ($data['chat_type'] == 'USER') {
                            $selUser = "SELECT * FROM tbl_derma WHERE derma_id =" . $data['from_id'];
                        } else {
                            $selUser = "SELECT * FROM tbl_derma WHERE derma_id =" . $data['to_id'];
                        }
                        $resUser = $Con->query($selUser);
                        $rowUser = $resUser->fetch_assoc();
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <p><?php echo htmlspecialchars($rowUser['derma_name']); ?></p>
                                <p><?php echo htmlspecialchars($data['chat_content']); ?></p>
                            </td>
                            <td><?php echo htmlspecialchars($data['chat_datetime']); ?></td>
                            <td>
                                <a href="Chat.php?id=<?php echo $rowUser['derma_id']; ?>" class="btn btn-primary">Chat</a>
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

.table p {
    margin: 0; /* Remove default margin for paragraphs */
}
</style>
>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>