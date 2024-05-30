<?php
require "../includes/database.php";
// lấy dữ liệu từ database
$products =getDatabaseSanPham("Data science");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản Phẩm</title>
  <link rel="stylesheet" href="../styles/sanpham.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../styles/base.css">
  <?php include '../loader/loader.php'; ?>
</head>

<body>
  <div class="nav-header">
    <div class="container">
      <div class="inner-wrap">
        <div class="inner-logo"><img src="../images/logoWP.png" /></div>
        <div class="inner-search">
          <input placeholder="Search book" type="text" />
        </div>
        <div class="inner-menu">
          <ul>
            <li><a href="../index.php">Trang Chủ</a></li>
            <li><a href="#">Nổi bật</a></li>
            <li><a href="#">Khuyến Mãi</a></li>
            <li><a href="./sanPhamDataSience.php">Sản phẩm</a></li>
            <li><a href="../page_About_us/aboutUS.html">Liên Hệ</a></li>
          </ul>
        </div>
        <div class="inner-icon">
          <ul>
            <li>
              <a href="../index.php"><i class="fa-regular fa-user"></i></a>
            </li>
            <li>
              <a href="../page_shop_cart/cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <h2 class="sale-1">Giảm giá 20% cho tất cả sách hôm nay</h2>
  <div class="container">
    <div class="nav">
      <ul class="link-home-page">
        <li><a href="">TRANG CHỦ</a></li>

        <li><a href="">SÁCH</a>
      </ul>
      <div class="container-sanpham">

        <div class="inner-left">
          <div class="nav-book">
            <ul>
              <li class="sach-list">Sách
                <ul>
                  <li class="chude-list">Chủ đề
                    <ul>
                      <li><a href="./sanPhamWeb.php">Web Development</a></li>
                      <li><a href="./sanPhamGame.php">Game Programing</a></li>
                      <li><a href="./sanPhamMobileApp.php">Mobile-app Development</a></li>
                      <li><a href="./sanPhamDataSience.php">Data Science</a></li>
                      <li><a href="./sanPhamMachineLearningAndAI.php">Machine Learning</a></li>
                      <li><a href="./sanPhamSystemAdministration.php">System Administration</a></li>
                      <li><a href="./sanPhamDevops.php">DevOps</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="sanpham-moi">
            <h1>Sản phẩm mới</h1>
            <div class="product-new">
              <a href=""><img src="../BOOK_FOR_PROJECT/GAME PROGRAMING/Advanced Android 4 Games/Advanced Android 4 Games.jpg" alt="" width="150px"></a>
              <div class="description">
                <p>Advanced Android 4 Games</p>
                <p><strong>Advanced Android 4 Games</strong></p>
                <p class="price"> <span class="gach">$200.00</span> <span>$100.00</span></p>
              </div>
            </div>
            <div class="product-new">
              <a href=""><img src="../BOOK_FOR_PROJECT/MACHINE_LEARNING_AND AI/AiForCybersecurity/Ai_for_cybersecurity.jpg" alt="" width="150px"></a>
              <div class="description">
                <p>AiForCybersecurity</p>
                <p><strong>AiForCybersecurity</strong></p>
                <p class="price"> <span class="gach">$127.00</span> <span>$99.00</span></p>
              </div>
            </div>
            <div class="product-new">
              <a href=""><img src="../BOOK_FOR_PROJECT/DEVOOPS/The DevOps Handbook/The DevOps Handbook.jpg" alt="" width="150px"></a>
              <div class="description">
                <p>AiForCybersecurity</p>
                <p><strong>AiForCybersecurity for HIGHT RISKAPP</strong></p>
                <p class="price"> <span class="gach">$300.00</span> <span>$150.00</span></p>
              </div>
            </div>
            <div class="product-new">
              <a href=""><img src="../BOOK_FOR_PROJECT/SYSTEM ADMINISTRATION AND OPDEVS/2_The Linux Command Line/2_The Linux Command Line.jpg" alt="" width="150px"></a>
              <div class="description">
                <p>The Linux Command Line</p>
                <p><strong>The Linux Command Line</strong></p>
                <p class="price"> <span class="gach">$227.00</span> <span>$225.00</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="inner-right">
          <div class="products">
            <!-- code ở đây -->
            <?php foreach ($products as  $item) {

            ?>
              <div class="product">
                <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $item['ID_Book']; ?>">
                  <img src="<?php echo $item['link'] ?>" alt="" width="200px" height="300px">
                </a>
                <div class="description">
                  <p><?php echo $item['name_book'] ?></p>
                  <p><strong> <?php echo $item['name_book'] . "({$item['year_publish']})" ?></strong></p>
                  <p class="price"> <span class="gach"><?php echo $item['buyPrice'].".00đ" ?></span> <span><?php echo $item['salePrice']. ".00đ" ?></span></p>
                  <p class="status"><i class="fa-solid fa-circle-check"></i> <span><?php echo $item['status'] ?></span></p>
                  <p class="soluongban">Đã bán 20k</p>
                  <p class="sale">-<?php echo $item['discount_percentage'] ?></p>
                </div>
              </div>
            <?php
            }
            ?>
            <!-- end here -->


          </div>
          <div class="xemthem">
            <a href="">
              <div class="circle-page">1</div>
            </a>
            <a href="">
              <div class="circle-page">2</div>
            </a>
            <a href="">
              <div class="circle-page">3</div>
            </a>
            <a href="">
              <div class="circle-page">4</div>
            </a>
            <a href="">
              <div class="circle-page">5</div>
            </a>
            <a href="">
              <div class="circle-page">6</div>
            </a>
            <a href="">
              <div class="circle-page">7</div>
            </a>
            <a href="">
              <div class="circle-page">8</div>
            </a>
            <a href="">
              <div class="circle-page">9</div>
            </a>
            <a href="">
              <div class="circle-page">10</div>
            </a>


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