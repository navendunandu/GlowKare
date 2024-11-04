<?php
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
if(isset($_POST["btn_register"]))
{
	$name = $_POST["txt_name"];
	$email=$_POST['txt_email'];
	$contact= $_POST["txt_contact"];
	$address=$_POST["txt_address"];
	$place=$_POST['sel_place'];
	$photo=$_FILES['file_photo']['name'];
	$tmpphoto=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($tmpphoto, '../Assets/Files/User/Photo/'.$photo);
	$password= $_POST['txt_password'];
	$confirmpassword=$_POST['txt_cpassword'];
	$selUser="select * from tbl_user where user_email='".$email."'";
	$selAdmin="select * from tbl_adminreg where admin_email='".$email."'";
	$selSeller="select * from tbl_seller where seller_email='".$email."'";
	$selDerma="select * from tbl_derma where derma_email='".$email."'";
	$resUser=$Con->query($selUser);
	$resAdmin=$Con->query($selAdmin);
	$resSeller=$Con->query($selSeller);
	$resDerma=$Con->query($selDerma);
	if($resUser->num_rows>0 || $resAdmin->num_rows>0 || $resSeller->num_rows>0 || $resDerma->num_rows>0){
		?>
		  <script>
		    alert("Email Already Exists");
		  </script>
		  <?php	
	}else{

        if($confirmpassword!=$password)
        {
          ?>
            <script>
              alert("Incorrect Password");
            </script>
            <?php	
  
        }
    else{

	  $InsQry = "insert into tbl_user(user_name,user_email,user_contact,user_address,place_id,user_photo,user_password)
	 values('$name','$email','$contact','$address','$place','$photo','$password')";
	  

		if($Con->query($InsQry))
		{
			
			$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'glowkare24@gmail.com'; // Your gmail
    $mail->Password = ''; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('glowkare24@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Greetings ";  //Your Subject goes here
    $mail->Body = "Welcome to glowKare"; //Mail Body goes here
  if($mail->send())
  {
    ?>
<script>
    alert("Email Send")
</script>
    <?php
  }
  else
  {
    ?>
<script>
    alert("Email Failed")
</script>
    <?php
  }
		}
		else
		{
			echo "error";
		}

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
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <div class="row">
                                <!-- First Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="txt_name" class="form-label">Name</label>
                                        <input required type="text" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"  class="form-control" name="txt_name" id="txt_name" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="txt_email" class="form-label">Email</label>
                                        <input required type="email" class="form-control" name="txt_email" id="txt_email" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="txt_contact" class="form-label">Contact</label>
                                        <input required type="text" pattern="[7-9]{1}[0-9]{9}" 
                                        title="Phone number with 7-9 and remaing 9 digit with 0-9" class="form-control" name="txt_contact" id="txt_contact" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="txt_address" class="form-label">Address</label>
                                        <textarea class="form-control" required name="txt_address" id="txt_address" rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- Second Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sel_district" class="form-label">District</label>
                                        <select  required class="form-select" name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                                            <option>--Select--</option>
                                            <?php
                                              $selQry="select * from tbl_district";
                                              $result=$Con->query($selQry);
                                              while($row=$result->fetch_assoc())
                                              {
                                            ?>
                                            <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
                                            <?php 
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sel_place" class="form-label">Place</label>
                                        <select  required class="form-select" name="sel_place" id="sel_place">
                                            <option>--Select--</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="file_photo" class="form-label">Photo</label>
                                        <input class="form-control"  required type="file" name="file_photo" id="file_photo" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="txt_password" class="form-label">Password</label>
                                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" required class="form-control" name="txt_password" id="txt_password" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="txt_cpassword" class="form-label">Confirm Password</label>
                                        <input type="password" required class="form-control" name="txt_cpassword" id="txt_cpassword" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="btn_register" id="btn_register">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }

</script>


</html>
<?php
            include("Foot.php");
            ob_flush();
            ?>