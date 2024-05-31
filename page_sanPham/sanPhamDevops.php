<!-- code php -->
<?php
require "../includes/database.php";
$products = getDatabaseSanPham("DevOps")
?>
<!-- end code php -->
<?php
$items = getproductNewFromDatabase();

?>
<!-- code session  -->
<?php 
  session_start();
  if(!$_SESSION['is-login']){
    header("Location: ../page_login_logout_signup/dangNhap.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản Phẩm</title>
  <link rel="stylesheet" href="../styles/sanpham.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <?php include '../loader/loader.php'; ?>
</head>

<body>
 
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
              <!-- code php -->
            <?php
            foreach ($items as $item) {


            ?>

              <div class="product-new">
                <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $item['ID_Book']; ?>"><img src="<?php echo $item['link'] ?>" alt="" width="150px"></a>
                <div class="description">
                  <p><?php echo $item['name_book'] ?></p>
                  <p><strong><?php echo $item['name_book'] ." "; echo $item['year_publish'] ?></strong></p>
                  <p class="price"> <span class="gach"><?php echo $item['buyPrice'] . ".00đ" ?></span> <span><?php echo $item['salePrice'] . ".00đ" ?></span></p>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
        
        <div class="inner-right">

          <div class="products">

            <!-- code php for sanpham devops -->
            <?php foreach ($products as  $item) {

            ?>
              <div class="product">
              <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $item['ID_Book']; ?>">
                  <img src="<?php echo $item['link'] ?>" alt="" width="200px" height="300px">
                </a>
                <div class="description">
                  <p><?php echo $item['name_book'] ?></p>
                  <p><strong> <?php echo $item['name_book'] . "({$item['year_publish']})" ?></strong></p>
                  <p class="price"> <span class="gach"><?php echo $item['buyPrice']. ".00đ" ?></span> <span><?php echo $item['salePrice'].".00đ" ?></span></p>
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
      
      <!-- end footer -->
      <script src="../loader/loader.js"></script>
</body>

</html>