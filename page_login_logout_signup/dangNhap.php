<?php
 session_start();
require '../includes/validation.php';

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bookdatabase";

// Tạo kết nối
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$error = array();

// Kiểm tra dữ liệu
if (isset($_POST['bt_login'])) {

  // Kiểm tra nhập username
  if (empty($_POST['username'])) {
    $error['username'] = "Vui lòng nhập username";
  } else {
    // kiem tra tinh hop le cua du lieu
    if (is_username($_POST['username'])) {
      $username = $_POST['username'];
    } else{
      $error['username'] = "tên đăng nhập yêu cầu từ 5-35 kí tự";}
    }


    // Kiểm tra nhập password
    if (empty($_POST['password'])) {

      $error['password'] = "Vui lòng nhập password";
    } else {
      if (is_password($_POST['password'])) {
        $password = $_POST['password'];
      } else {
        $error['password'] = "bắt đầu kí tự phải viết hoa và từ 5-31 kí tự";
      }

      // Kiểm tra thông tin đăng nhập
      if (empty($error)) {
        $sql = "SELECT * FROM customers WHERE username='$username' AND password_customer='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Đăng nhập thành công
          $user = mysqli_fetch_assoc($result);
          $_SESSION['is-login'] = true;
          $_SESSION['id_customer'] = $user['ID_customer_new'];
          $_SESSION['username'] = $username;
          $redict_to = $_POST['direct_to'];
          header("Location:{$redict_to}");
        } else {
          // Đăng nhập thất bại
          $error['login'] = "Tên người dùng hoặc mật khẩu không đúng!";
        }
      }
    }
  }


// Đóng kết nối
$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" href="../styles/dangNhap.css">
  <link rel="stylesheet" href="../styles/base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <?php include '../loader/loader.php'; ?>
</head>

<body>
  
  <!-- end header -->
  <div class="container1">
    <div class="all">

      <!-- login -->
      <div class="login">
        <form action="" method="post" autocomplete="on">
          <h1>ĐĂNG NHẬP</h1>
          <p class="title_username text_login">Tên tài khoản hoặc địa chỉ email</p>

          <!-- giữ nguyên các trường tên nếu người dùng điền đúng -->
          <input type="text" class="form-input" name="username" value="<?php if (!empty($username)) echo $username ?>">

          <!-- Hiển thị lỗi username -->
          <?php echo form_error('username') ?>


          <p class="title_matkhau text_login">Mật khẩu*</p>
          <input type="password" class="form-input" name="password">


          <!-- Hiển thị lỗi password -->
          <?php echo form_error('password') ?>


          <div class="flex-item">
            <p class="text_login"> <input type="checkbox" class="tickghinho"> Ghi nhớ mật khẩu</p>
            <a href="" class="quenmatkhau">Quên mật khẩu?</a>
          </div>
          <input type="submit" class="button_login" value="ĐĂNG NHẬP" name="bt_login">
          <a href="./dangKy.php" class="without-account">Bạn chưa có tài khoản? <span>Đăng ký</span></a>
          <!-- Hiển thị lỗi đăng nhập -->
          <?php echo form_error('login') ?>
         
          <input type="hidden" name="direct_to" id="" value="../index.php">
        </form>
      </div>
     
    </div>
  </div>
  <!-- footer -->
  
  <!-- end footer -->

  <script src="../loader/loader.js"></script>
</body>

</html>