<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat List</title>
    
    <style>
        .chat-table-container {
            margin: 50px auto; /* Centering the container */
            max-width: 800px; /* Maximum width of the box */
        }
    </style>
</head>
<body>
<div class="container chat-table-container">
    <div class="card">
        <div class="card-header">
            <h4>Chat List</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Chat</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $did = $_SESSION['did'];
                    $selChat = "SELECT * FROM tbl_chatlist WHERE from_id = ? OR to_id = ?";
                    $stmt = $Con->prepare($selChat);
                    $stmt->bind_param("ii", $did, $did);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    
                    $i = 0;
                    while ($data = $res->fetch_assoc()) {
                        $i++;
                        $userId = ($data['chat_type'] == 'USER') ? $data['from_id'] : $data['to_id'];
                        $selUser = "SELECT * FROM tbl_user WHERE user_id = ?";
                        $stmtUser = $Con->prepare($selUser);
                        $stmtUser->bind_param("i", $userId);
                        $stmtUser->execute();
                        $resUser = $stmtUser->get_result();
                        $rowUser = $resUser->fetch_assoc();
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <p><?php echo htmlspecialchars($rowUser['user_name']); ?></p>
                                <p><?php echo htmlspecialchars($data['chat_content']); ?></p>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($data['chat_datetime']); ?>
                            </td>
                            <td>
                                <a href="Chat.php?id=<?php echo htmlspecialchars($rowUser['user_id']); ?>" class="btn btn-primary">Chat</a>
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
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>