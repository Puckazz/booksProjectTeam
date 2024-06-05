<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="style_profile.css" />
    <title>Document</title>
  </head>
  <body>
    <?php require "../includes/header.php" ?>
    <div class="form">
      <div class="inner-left">
        <form action="" class="form_profile" method="post">
          <h2>Thông tin cá nhân</h2>
          <label for="">Tên hiển thị</label> <br />
          <input type="text" name="name_customer" id="" /><br />
          <label for="">Tên tài khoản</label> <br />
          <input type="text" name="username" id="" /><br />
          <label for="">email</label> <br />
          <input type="text" name="email" id="" /><br />
          <label for="">Số điện thoại</label><br />
          <input type="text" name="phone_number" id="" /><br />
          <label for="">Địa chỉ</label> <br />
          <input type="text" name="address" id="" /><br />
          <button class="submit">Lưu thay đổi</button>
        </form>
      </div>
    </div>
    <?php require "../includes/footer.php" ?>
  </body>
</html>
