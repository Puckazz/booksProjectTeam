
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="style_profile.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Document</title>
  </head>
  <body>
    <?php
    session_start();
    require "../includes/header.php";
    
    if(!isset($_SESSION['is-login']))
      header("location: /booksProjectTeam/page_login_logout_signup/dangNhap.php");
    
    ?>
    <!-- Kết nối sql -->
    <?php
    $conn = mysqli_connect("localhost", "root", "", "bookdatabase");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    if(isset($_POST['submit'])){
      $sql = "update customers set name_customer = '{$_POST['name']}',
    username = '{$_POST['username']}',email = '{$_POST['email']}',number_phone = '{$_POST['phone']}',
    address = '{$_POST['address']}' where ID_customer_new = {$_SESSION['id']}";
    
    $errol;
      if(mysqli_query($conn,$sql)){
        $errol = "Cật nhập thành công";
        $_SESSION['username'] = $_POST['username'];
        header("location: ../index.php");
      }
      else
        $errol = "Thất bại : ". mysqli_error($conn);
      echo $errol;
      }

    ?>
    <!-- Tải lại dữ liẹu -->
    <?php
    $sql = "SELECT * FROM customers WHERE ID_customer_new = {$_SESSION['id']}";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
      $row [] = mysqli_fetch_assoc($result);
      $name = $row[0]['name_customer'];
      $user = $row[0]['username'];
      $email = $row[0]['email'];
      $number_phone = $row[0]['number_phone'];
      $address = $row[0]['address'];
     
     
    }
    else
      echo "Thất bại : ". mysqli_error($conn);
    ?>
    <div class="form_profile">
      <div class="container">
        <form action="" method="post">
          <h2>Thông tin cá nhân</h2>
           
          <table>
            <tbody>
              <tr>
                <td><label for="">Tên Đăng Nhập</label></td>
                <td> <input value="<?php echo $user ?>" name="username" type="text" ></td>
              </tr>
              <tr>
                <td><label for="">Tên</label></td>
                <td> <input value="<?php echo $name?>" name="name" type="text"></td>
              </tr>
              <tr>
                <td><label for="">Email</label></td>
                <td>  <input value="<?php echo $email?>" name="email" type="text"></td>
              </tr>
              <tr>
                <td><label for="">Số điện thoại</label></td>
                <td><input value="<?php echo $number_phone?>" type="text" name="phone" id=""></td>
              </tr>
              <tr>
                <td><label for="">Địa chỉ</label></td>
                <td><input value="<?php echo $address?>" type="text" name="address"  id=""></td>
              </tr>
             
            </tbody>
          </table>
          <button  value="true" name="submit" class="submit">Lưu</button>
        </form>
      </div>
    </div>
    <?php require "../includes/footer.php" ?>
  </body>
</html>
