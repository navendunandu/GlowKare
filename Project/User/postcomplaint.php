<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");

if(isset($_POST['btn_submit']))
{
	$title=$_POST['txt_title'];
	$des=$_POST['txt_des'];
	$file=$_FILES['file_complaint']['name'];
	$tempfile=$_FILES['file_complaint']['tmp_name'];
	move_uploaded_file($tempfile, '../Assets/Files/User/Complaint/'.$file);
	$pid=$_GET['pid'];
	$uid=$_SESSION['uid'];
	$InsQry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,user_id,product_id,complaint_file) values('$title','$des',curdate(),'$uid','$pid','$file')";
	if($Con->query($InsQry))
	{
	}
	else{
		echo "Error";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

<div class="card-header text-center">
                        <h3>Post Complaint</h3>
                    </div>
<form>
  <table class="table table-bordered text-center" style="max-width: 600px; margin: auto;">
    <tr>
      <td><strong>Title</strong></td>
      <td>
        <label for="txt_title" class="sr-only">Title</label>
        <input type="text" class="form-control" name="txt_title" id="txt_title" />
      </td>
    </tr>
    <tr>
      <td><strong>Description</strong></td>
      <td>
        <label for="txt_des" class="sr-only">Description</label>
        <textarea class="form-control" name="txt_des" id="txt_des" cols="45" rows="5"></textarea>
      </td>
    </tr>
    <tr>
      <td><strong>File</strong></td>
      <td>
        <label for="file_complaint" class="sr-only">Upload File</label>
        <input type="file" class="form-control-file" name="file_complaint" id="file_complaint" />
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
      </td>
    </tr>
  </table>
</form>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>