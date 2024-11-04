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
		 $_SESSION['aname']=$data['admin_name'];
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
    else{
      ?>
      <script>
         alert("Invalid Credentials")
         </script>
      
         <?php
    }
}
	 
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="../Assets/Templates/login/style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Login Forms
         </div>
         <form action="" method="post">
            <div class="field">
               <input  name="txt_email" autocomplete="off" type="text" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input name="txt_password" autocomplete="off" type="password" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="ForgetPassword.php">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input name="btn_submit" type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="#">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>