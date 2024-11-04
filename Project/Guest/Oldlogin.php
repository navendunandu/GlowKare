<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_submit"]))
{
	 $Email =$_POST['txt_email'];
	 $Password =$_POST['txt_password'];
	 
	 $seladmin ="select * from tbl_adminreg where admin_email='$Email' and admin_password='$Password'";
	 $resultadmin=$Con->query($seladmin);
	 
	  $selseller ="select * from tbl_seller where seller_email='$Email' and seller_password='$Password'";
	 $resultseller=$Con->query($selseller);
	 
	  $selUser ="select * from tbl_user where user_email='$Email' and user_password='$Password'";
	 $resultuser=$Con->query($selUser);
	 
	 $selDerma="select * from tbl_derma where derma_email='$Email' and derma_password='$Password'";
	 $resultderma=$Con->query($selDerma);
	 
	 if($data=$resultadmin->fetch_assoc())
	 {
		 $_SESSION['aid']=$data['admin_id'];
		 header("location:../Admin/homepage.php");
	 }
	 else if($data=$resultseller->fetch_assoc())
	 {
		 if($data['seller_vstatus']==1)
	 	{
		 $_SESSION['sid']=$data['seller_id'];
		 header("location:../Seller/homepage.php");
	 	} 
		 else if($data['seller_vstatus']==2)
		 {
			 echo "Rejected";
		 }
		 else
		 {
			 echo "Pending";
		 }
	 }
	 else if($data=$resultuser->fetch_assoc())
	 {
		 $_SESSION['uid']=$data['user_id'];
		 header("location:../User/HomePage.php");
	 }
	 else if($data=$resultderma->fetch_assoc())
	 {
		 if($data['derma_vstatus']==1)
		 {$_SESSION['did']=$data['derma_id'];
		 header("location:../Derma/homepage.php");
	}
	 else if($data['derma_vstatus']==2)
		 {
			 echo "Rejected";
		 }
		 else
		 {
			 echo "Pending";
		 }
		 
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td colspan="2"><center><input type="submit" name="btn_submit" id="btn_submit" value="Login" /></center></td>
    </tr>
  </table>
</form>
</br>


</body>
</html>