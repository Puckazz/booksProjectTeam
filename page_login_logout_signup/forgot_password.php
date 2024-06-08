<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookdatabase";

require "../includes/validation.php";
require "../includes/send_email.php";
require "../includes/database.php";
// Tạo kết nối
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
 $error = array();
 $email="";
    if(isset($_POST['bt-submit'])){
        if(!empty($_POST['email'])){
             $email = $_POST['email'];
        }
        else{
            $error['email'] = "không được để trống";
        }
   
    if(empty($error)){
        $sql = "SELECT * FROM customers WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Đăng nhập thành công
            $reset_token = md5($email.time());
            $link = "http://localhost:3000/booksProjectTeam/page_login_logout_signup/reset_password.php?reset_token=".$reset_token;

            $subject = "KHÔI PHỤC GMAIL";
            $content = "<p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn liên kết với địa chỉ email này. Nếu bạn đã yêu cầu, vui lòng nhấp vào liên kết dưới đây để đặt lại mật khẩu của bạn: <strong><a href=\"$link\">click here:</a></strong></p>
                        <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này hoặc liên hệ với đội ngũ hỗ trợ của chúng tôi nếu bạn có bất kỳ câu hỏi nào.</p>
                        <p>Trân trọng,<br>WAMPO</p>";
            
           if(send_email($email,"",$subject,$content)){
            ;
            if(update_reset_token($email,'customers',$reset_token)){
                echo "update thành công";
            }

           }
           else{
            echo "lỗi";
           }
           
            
          } else {
            // Đăng nhập thất bại
            $error['email'] = "email này không tồn tại ";
          }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khôi phục mật khẩu!</title>
    <link rel="stylesheet" href="../styles/forgot.css">
</head>

<body>
    <form action="#" method="post">
        <div class="container">
            <div class="all">
                <h1>KHÔI PHỤC TÀI KHOẢN</h1>
                <label for="email">Nhập email:</label>
                <input type="email" id="email" class="form-input" name="email">
                <?php echo form_error('email') ?>
                <p>Đừng lo lắng chúng tôi sẽ khôi phục cho bạn!</p>
                <br>
                <div class="submit"><input type="submit" value="Gửi" name="bt-submit" class="submit-nhap"></div>
                
            </div>
        </div>
    </form>
</body>

</html>