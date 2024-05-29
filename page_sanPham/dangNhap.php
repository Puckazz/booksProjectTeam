<?php
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
      $error['username'] = "tên đăng nhập yêu cầu từ 6-32 kí tự";}
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
  <!-- header -->
  <div class="nav">
    <div class="container">
      <div class="inner-wrap">
        <div class="inner-logo"><img src="../images/logoWP.png  " alt="" /></div>
        <div class="inner-search">
          <input placeholder="Search book" type="text" />
        </div>
        <div class="inner-menu">
          <ul>
            <li><a href="../index.php">Trang Chủ</a></li>
            <li><a href="#">Nổi bật</a></li>
            <li><a href="#">Khuyến Mãi</a></li>
            <li><a href="./sanPhamGame.html">Sản Phẩm</a></li>
            <li><a href="../page_About_us/aboutUS.html">Liên Hệ</a></li>
          </ul>
        </div>
        <div class="inner-icon">
          <ul>
            <li>
              <a href="#"><i class="fa-regular fa-user"></i></a>
            </li>
            <li>
              <a href="../page_shop_cart/cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <h2 class="sale">Giảm giá 20% cho tất cả sách hôm nay</h2>
  <!-- end header -->
  <div class="container1">
    <div class="all">

      <!-- login -->
      <div class="login">
        <form action="" method="post" autocomplete="on">
          <h1>ĐĂNG NHẬP</h1>
          <p class="title_username text_login">Tên tài khoản hoặc địa chỉ email</p>

          <!-- giữ nguyên các trường tên nếu người dùng điền đúng -->
          <input type="text" class="textfield_taikhoan" name="username" value="<?php if (!empty($username)) echo $username ?>">

          <!-- Hiển thị lỗi username -->
          <?php echo form_error('username') ?>


          <p class="title_matkhau text_login">Mật khẩu*</p>
          <input type="password" class="textfield_matkhau" name="password">


          <!-- Hiển thị lỗi password -->
          <?php echo form_error('password') ?>


          <p class="text_login"> <input type="checkbox" class="tickghinho"> Ghi nhớ mật khẩu</p>
          <input type="submit" class="button_login" value="ĐĂNG NHẬP" name="bt_login">
          <a href="" class="quenmatkhau">Quên mật khẩu</a>
          <!-- Hiển thị lỗi đăng nhập -->
          <?php echo form_error('login') ?>
         
          <input type="hidden" name="direct_to" id="" value="../page_shop_cart/cart.php">
        </form>
      </div>

      <form action="" method="post" autocomplete="on">
        <!-- end login -->

        <!-- sign in -->
        <div class="sign_in">
          <h1>ĐĂNG KÝ</h1>
          <p class="text_login">Địa chỉ email*</p>
          <input type="email" class="textfield_diachimail">
          <p class="text_login">Mật khẩu sẽ được gửi vào email của bạn</p>
          <br>
          <article> tất cả thông tin của bạn chỉ được sử dụng cho việc đặt hàng và cải thiện trải nghiệm sản phẩm. Ngoài ra được Wampo đảm bảo về quyền riêng tư cá nhân theo quy định hợp pháp</article>
          <input class="button_login" type="submit" name="bt_login" value="ĐĂNG KÍ">
        </div>
        <!-- end sign in -->
    </div>
  </div>
  <!-- footer -->
  <footer class="footter">
    <div class="inner-wrap">
      <div class="inner-content content-first">
        <img src="../images/logoWP.png" alt="" />
        <p>Quy Nhơn</p>
        <p>0327707140</p>
        <p>wambo@gmail.com</p>
      </div>
      <div class="inner-content">
        <h3>Dịch vụ</h3>
        <a href="">Điều khoản sử dụng</a>
        <a href="">Chính sách bảo mật thông tin cá nhân cơ bản</a>
        <a href="">Giới thiệu Wampo</a>
        <a href="">Hệ thống trung tâm nhà sách</a>
      </div>
      <div class="inner-content">
        <h3>Hỗ trợ</h3>
        <a href="">Chính sách đổi trả hoàn tiền</a>
        <a href="">Chính sách bảo hành bồi hoàn</a>
        <a href="">Chính sách vận chuyển</a>
        <a href="">Phương thức thanh toán và xuất Hoá đơn</a>
      </div>
      <div class="inner-content">
        <h3>Đăng nhập tạo mới tài khoản</h3>
        <a href="#">Thay đổi địa chỉ mua hàng</a>
        <a href="">Chi tiết tài khoản</a>
        <a href="">Lịch sử mua hàng</a>
      </div>
    </div>
    <div class="inner-icon">
      <a href=""> <i class="fa-brands fa-facebook"></i></a>
      <a href=""> <i class="fa-solid fa-camera"></i></a>
      <a href=""> <i class="fa-brands fa-twitter"></i></a>
      <a href=""> <i class="fa-brands fa-youtube"></i></a>
    </div>
    <div class="end-footter">
      <p>Copyright 2024 WAMPO. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- end footer -->

  <script src="../loader/loader.js"></script>
</body>

</html>