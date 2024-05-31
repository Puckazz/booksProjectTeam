<?php
require "../includes/validation.php";
require "../includes/database.php";
// kiểm tra dữ liệu
$error = array();
$fullname = "";
$email = "";
$phoneNumber = "";
$username = "";
$password = "";
$confPassword = "";
$rule ;
if(isset($_POST['bt-sign-up'])){
    // xử lí dữ liệu họ và tên
    if(empty($_POST['fullname'])){
        $error['fullname']="vui lòng điền họ và tên";
    }
    else{
        if(is_fullname($_POST['fullname'])){
            $fullname = $_POST['fullname'];
        }
        else{
            $error['fullname']="vui lòng nhập đúng định dạng 8-25 kí tự";
        }
    }
    //xử lí dữ liệu email
    if(empty($_POST['email'])){
        $error['email']="vui lòng điền email";
    }
    else{
        $email = $_POST['email'];
    }
    // xử lí dữ liệu số điện thoại
    if(empty($_POST['phone-number'])){
        $error['phone-number']="vui lòng điền số điện thoại";
    }
    else{
        if(is_phoneNumber($_POST['phone-number'])){
            $phoneNumber = $_POST['phone-number'];
        }
        else{
            $error['phone-number']="vui lòng nhập đúng định dạng";
        }
    }

    // xử lí sự kiện tên đăng nhập
    if(empty($_POST['username'])){
        $error['username']="vui lòng điền  username";
    }
    else{
            //lấy kết nối;
            $connect = getConnect();
            $stmt = $connect->prepare("SELECT * FROM customers WHERE username = ?");
            $stmt->bind_param("s", $_POST['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $error['username'] = "Tên đăng nhập đã tồn tại";
            }
            else{
                $username = $_POST['username'];
            }    
    }

    // xử lí dữ liệu password
    if(empty($_POST['password'])){
        $error['password']="vui lòng điền mật khẩu";
    }
    else{
        if(is_password($_POST['password'])){
           $password = $_POST['password'];
        }
        else{
            $error['password']="vui lòng nhập đúng định dạng, kí tự đầu phải viết Hoa";
        }
    }

    // xử lí xác nhận mật khẩu
    if(empty($_POST['conf-password'])){
        $error['conf-password']="không được để trống";
    }
    else{
        if( validate_password_matches($_POST['password'],$_POST['conf-password'])){
           $confPassword = $_POST['conf-password'];
        }
        else{
            $error['conf-password'] = "mật khẩu không trùng khớp";
        }
    }

    

    // xử lí chấp nhận mật khẩu

    if(isset($_POST['rules'])){
        $rule = $_POST['rules'];
    }
    else{
        $error['rules'] ="bạn cần phải đồng ý";
    }
     if(empty($error)){
        $connect = getConnect();
        $stmt = $connect->prepare(("INSERT INTO `bookdatabase`.`customers` (`name_customer`, `username`, `password_customer`, `email`, `number_phone`) 
                                    VALUES (?, ?, ?, ?, ?);"));
        $stmt->bind_param("sssss",$fullname,$username,$password,$email,$phoneNumber);
        $stmt->execute();
        
        if($stmt->affected_rows>0){
            $redict_to = $_POST['direct_to'];
            header("Location:{$redict_to}");
        }
        else{
            $error['add'] = "add failed";
        }
       
     }



    

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng KÍ</title>
  <link rel="stylesheet" href="../styles/dangKy.css">
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
            <li><a href="./sanPhamGame.php">Sản Phẩm</a></li>
            <li><a href="../page_About_us/aboutUS.php">Liên Hệ</a></li>
          </ul>
        </div>
        <div class="inner-icon">
          <ul>
            <li>
              <a href="#"><i class="fa-regular fa-user"></i></a>
            </li>
            <li>
              <a href="../page_shop_cart/cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
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

     <!-- sign up -->
      <div class="login">
        <form  action="" method="post" autocomplete="on">
          <h1>ĐĂNG KÍ</h1>
          <p class="title_username text_login">Họ và tên:</p>
          <input type="text" class="form-input" name="fullname" value="<?php echo setData($fullname) ?>">
          <!-- hiển thị lỗi -->
         <?php echo form_error('fullname'); ?>

          <p class="title_username text_login">Email:</p>
          <input type="email" class="form-input" name="email" value="<?php echo setData($email) ?>">
          <!-- hiển thị lỗi -->
            <?php echo form_error('email') ;?>

          <p class="title_username text_login">Số điện thoại:</p>
          <input type="text" class="form-input" name="phone-number" value="<?php echo setData($phoneNumber) ?>">
            <!-- hiển thị lỗi -->
            <?php echo form_error('phone-number') ?>

          <p class="title_username text_login">Tên đăng nhập:</p>
          <input type="text" class="form-input" name="username" value="<?php echo setData($username) ?>">
          <?php echo form_error('username') ?>


          <p class="title_username text_login">Mật khẩu:</p>
          <input type="password" class="form-input" name="password" value="<?php setData($password) ?>">
          <?php echo form_error('password') ?>


          <p class="title_matkhau text_login">Xác nhận mật khẩu:</p>
          <input type="password" class="form-input" name="conf-password">
          <?php echo form_error('conf-password') ?>
          <br>
          <br>
            <input type="checkbox" name="rules"> Tôi đồng ý các điều khoản.
            <?php echo form_error('rules') ?>
            <br>
            <br>
          <input type="submit" class="button_login" value="ĐĂNG KÍ" name="bt-sign-up">
          <!-- Hiển thị lỗi đăng nhập -->
         
         
          <input type="hidden" name="direct_to" id="" value="./dangNhap.php">
          <?php echo form_error('add') ?>
        </form>
      </div>
     
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