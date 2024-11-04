<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
if(isset($_POST['btn_reply']))
{
	$reply=$_POST['txt_reply'];
	$upQry="update tbl_complaint set complaint_reply='$reply',complaint_status='1' where complaint_id=".$_GET['cid'];
	if($Con->query($upQry))
	{		
	}
	else
	{
		echo "ERROR";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
<div class="container">
    <div class="form-container">
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="txt_reply" class="form-label">Reply</label>
                <input type="text" class="form-control" name="txt_reply" id="txt_reply" placeholder="Type your reply here">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="btn_reply" name="btn_reply">Reply</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>