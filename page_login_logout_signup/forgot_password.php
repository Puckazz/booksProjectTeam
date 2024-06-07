<?php 
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookdatabase";

require "../includes/validation.php";
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