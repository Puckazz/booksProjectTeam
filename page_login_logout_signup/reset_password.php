<?php
require "../includes/database.php";
require "../includes/validation.php";


$error = array();
if(isset($_POST['bt-submit'])){
   if(!empty($_POST['password'])){
        if(is_password($_POST['password'])){
            $password = $_POST['password'];
        }
   
        else{
            $error['password']="nhập đúng định dạng, chữ cái đầu viết hoa";
        }
    }
   else{
    $error['password']= "vui lòng điền password";
   }

   if(!empty($_POST['confirm-password'])){
    if(validate_password_matches($_POST['confirm-password'], $_POST['password'])){
        $confPassword = $_POST['confirm-password'];
    }
    else{
        $error['confirm-password']="mật khẩu không khớp";
    }

}
else{
    $error['confirm-password']="vui lòng xác nhật mật khẩu";
}



if(isset($_GET['reset_token'])){
  
$token = $_GET['reset_token'];

if(empty($error)){
  
    if(update_password($token,"customers",$confPassword)){
        echo "update successful";
        header("Location: ./dangNhap.php");
    }
    else{
        echo "không thể update";
    }
}
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/forgot.css">
    <title>Reset password</title>
    <?php include '../loader/loader.php'; ?>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <div class="all">
                <h1>KHÔI PHỤC MẬT KHẨU</h1>
                <label for="id-password">Mật khẩu mới: </label> <br><br>
                <input type="password" name="password" id="id-password" class="form-input">
                <?php echo form_error('password') ?>
                <br><label for="id-confirm-password">Xác nhận mật khẩu mới: </label><br><br>
                <input type="password" name="confirm-password" id="id-confirm-password" class="form-input">
                <?php echo form_error('confirm-password') ?>
                <div class="submit"><input type="submit" value="Gửi" name="bt-submit" class="submit-nhap"></div>
            </div>
        </div>
    </form>
    <script src="../loader/loader.js"></script>
</body>

</html>