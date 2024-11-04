<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-color: #fceaea;
        font-family: Arial, sans-serif;
    }
    .form-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .form-container h2 {
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }
    .form-label {
        color: #6c757d;
        font-weight: 500;
        display: block;
        text-align: left;
        margin-bottom: 5px;
    }
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px;
        background-color: #f9f9f9;
        color: #495057;
        width: 100%;
    }
    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.3);
        background-color: #fff;
    }
    .btn-custom {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        width: 100%;
        font-weight: bold;
        margin-top: 15px;
    }
    .btn-custom:hover {
        background-color: #c82333;
    }
</style>
</head>
<?php
session_start();
include("../Assets/Connection/Connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

function generateOTP($length = 6) {
    $digits = '0123456789';
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= $digits[rand(0, strlen($digits) - 1)];
    }
    return $otp;
}

if(isset($_POST['btn_submit'])){
    $email=$_POST['txt_mail'];
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;
    $_SESSION['mail']=$email;
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
    $message = '
   
}

?>

    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your OTP Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            border-radius: 5px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .footer {
            font-size: 12px;
            color: #999;
            margin-top: 20px;
        }
        .form-container {
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Your OTP Code
        </div>
        <p>Hello,</p>
        <p>Here is your One-Time Password (OTP) for verification:</p>
        <h2 style="font-size: 36px; color: #333;">' . $otp . '</h2>
        <p>This OTP is valid for the next 5 minutes. Please use it to complete your verification process.</p>
        <p>If you did not request this OTP, please ignore this email or contact support if you have concerns.</p>
        <p>Best regards,<br>GlowKare</p>
        <div class="footer">
            This is an automated message. Please do not reply.
        </div>
    </div>
</body>
</html>
';
    $mail->Subject = "Reset your password";  //Your Subject goes here
    $mail->Body = $message; //Mail Body goes here
  if($mail->send())
  {
    ?>
<script>
    alert("Email Send")
    window.location="OTP_validator.php";
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
?>
<body>
<div class="form-container">
    <h2>Reset Password</h2>
    <form action="" method="post">
        <div class="mb-3 text-start">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="txt_mail" id="email" required>
        </div>
        <button type="submit" class="btn btn-custom" name="btn_submit">Reset Password</button>
    </form>
</div>

</body>
</html>