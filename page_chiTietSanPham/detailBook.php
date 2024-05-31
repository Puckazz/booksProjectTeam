<?php
$conn = mysqli_connect("localhost", "root", "", "bookdatabase");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chi tiết sản phẩm</title>
  <link rel="stylesheet" href="./chitietsanpham.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../styles/base.css">

  <?php include '../loader/loader.php'; ?>
</head>

<body>
  <!-- header -->
  <div class="nav">
    <div class="container">
      <div class="inner-wrap">
        <div class="inner-logo"><img src="../images/logoWP.png" alt="" /></div>
        <div class="inner-search">
          <input placeholder="Search book" type="text" />
        </div>
        <div class="inner-menu">
          <ul>
            <li><a href="../index.php">Trang Chủ</a></li>
            <li><a href="#">Nổi bật</a></li>
            <li><a href="#">Khuyến Mãi</a></li>
            <li><a href="../page_sanPham/sanPhamWeb.html">Sản phẩm</a></li>
            <li><a href="#">Liên Hệ</a></li>
          </ul>
        </div>
        <div class="inner-icon">
          <ul>
            <li>
              <a href="../page_sanPham/dangNhap.php"><i class="fa-regular fa-user"></i></a>
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
  <div class="container">
    <div class="inner-left">
      <div class="nav-book">
        <ul>
          <li class="sach-list">
            <p>SÁCH</p>
            <ul>
              <li class="chude-list">Chủ đề
                <ul>
                  <li><a href="./sanPhamWeb.html">Web Development</a></li>
                  <li><a href="./sanPhamGame.html">Game Programing</a></li>
                  <li><a href="./sanPhamMobileApp.html">Mobile-app Development</a></li>
                  <li><a href="./sanPhamDataSience.html">Data Science</a></li>
                  <li><a href="./sanPhamMachineLearningAndAI.html">Machine Learning</a></li>
                  <li><a href="./sanPhamSystemAdministration.html">System Administration</a></li>
                  <li><a href="./sanPhamDevops.html">DevOps</a></li>
                </ul>
              </li>
              <li class="type-book">Thể loại</li>
              <li class="news-book">Tin tức mới</li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <?php
    $qt = 1;
    if (isset($_POST['addToCart'])) {
      $img_book = $_POST['img_book'];
      $name_book = $_POST['name_book'];
      $author_book = $_POST['author_book'];
      $id_book = $_POST['id_book'];
      $year_publish = $_POST['year_publish'];
      $price_book = $_POST['price_book'];
      $quantity = $_POST['quantity'];

      $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE id_book = '$id_book'");

      if (mysqli_num_rows($select_cart) > 0) {
        $update_cart = mysqli_query($conn, "UPDATE cart SET quantity = quantity + $quantity WHERE id_book = '$id_book'");
      } else {
        $insert_cart = mysqli_query($conn, "INSERT INTO cart(id_book, name_book, img_book, author_book, year_publish, price_book, quantity) VALUES ('$id_book', '$name_book', '$img_book', '$author_book', $year_publish, $price_book, $quantity)");
      }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" || isset($_POST['addToCart'])) {
      if (isset($_GET['showbook']) || isset($_POST['id_book'])) {
        $id_book = isset($_GET['showbook']) ? $_GET['showbook'] : $_POST['id_book'];

        $select_book = mysqli_query($conn, "SELECT book.ID_Book, book.name_book, book.discount, book.name_category_book, book.buyPrice, book.salePrice, book.year_publish, book.link, book.description_book, book.ID_tacgia, authors.author_name 
                    FROM book INNER JOIN authors 
                    ON book.ID_tacgia = authors.ID_tacgia WHERE ID_Book = '$id_book'");

        while ($row = mysqli_fetch_assoc($select_book)) { ?>

          <div class="inner-mid">
            <img class="image-product" src="<?= $row['link']; ?>" alt="">
            <p class="discount">-<?= $row['discount'] * 100; ?>%</p>

            <div class="image-next">
              <img class="first-img" src="<?= $row['link']; ?>" alt="firstImgBook">
              <img src="../BOOK_FOR_PROJECT/DATA_SIENCE/An Introduction to Statistical Learning/An Introduction to Statistical Learning.jpg" alt="secondImgBook">
            </div>


          </div>
          <div class="inner-right">
            <p class="turn-back-page"><a href="../index.php">TRANG CHỦ</a> / <a href="">SÁCH <?= $row['name_category_book']; ?></a></p>
            <div class="name">
              <h3><?= $row['name_book']; ?></h3>
            </div>
            <div class="price"> <span class="first-price"><?= $row['buyPrice']; ?>000</span> <span class="final-price"><?= $row['salePrice']; ?>000</span></div>
            <ul class="promotion-list">
              <p class="promotion">Khuyến mãi</p>
              <li>
                Freeship toàn quốc khi đặt hàng tại Wampo
              </li>
              <li>
                Chi nhánh bảo hành 3 miền Bắc - Trung - Nam
              </li>
              <li>
                Mua 2 cuốn tặng ngẫu nhiên 1 cuốn
              </li>
            </ul>
            <div class="type-book">
              <span class="category-book">Loại sách:</span>
              <select name="options" id="">
                <option value="option"> Sách cứng</option>
                <option value="option">Sách bìa mềm</option>
                <option value="option">Sách điện tử</option>
                <option value="option">Sách đặc biệt</option>
                <option value="option">Sách audio</option>
              </select>
            </div>
            <form action="" method="post">
              <div class="quantity">Số lượng: <div class="qt">
                  <span class="minus">-</span>
                  <span class="num"><?= $qt; ?></span>
                  <span class="plus">+</span>
                </div> <input class="add-cart" type="submit" value="Thêm Vào Giỏ" name="addToCart"> </div>

              <input type="hidden" name="img_book" value="<?php echo $row['link']; ?>">
              <input type="hidden" name="name_book" value="<?php echo $row['name_book']; ?>">
              <input type="hidden" name="author_book" value="<?php echo $row['author_name']; ?>">
              <input type="hidden" name="id_book" value="<?php echo $row['ID_Book']; ?>">
              <input type="hidden" name="year_publish" value="<?php echo $row['year_publish']; ?>">
              <input type="hidden" name="price_book" value="<?php echo $row['salePrice']; ?>">
              <input type="hidden" name="quantity" id="qtInput" value="<?php echo $qt; ?>">
            </form>
            <p class="IBSN"> <strong>IBSN: </strong><?= $row['ID_Book']; ?></p>
            <p> <strong>Danh mục: </strong> Sách</p>
            <p><i class="fa-brands fa-facebook"></i> <i class="fa-brands fa-twitter"></i> <i class="fa-brands fa-instagram"></i> <i class="fa-brands fa-youtube"></i> <i class="fa-brands fa-tiktok"></i></p>
          </div>
  </div>
  <hr style="margin: 30px 100px;">
  <div class="item_desc">
    <div class="comment-book">
      <h3>Bình luận:</h3>
      <textarea name="" id=""></textarea>
    </div>
    <div class="description-book">
      <h3>Mô tả sản phẩm</h3>
      <p><?= $row['description_book']; ?></p>
    </div>
  </div>
<?php }
      }
    }
?>

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
</div>
<script src="../loader/loader.js"></script>
<script src="./ctsp.js"></script>
</body>

</html>