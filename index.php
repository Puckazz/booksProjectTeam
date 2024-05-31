<?php
$conn = mysqli_connect("localhost", "root", "", "bookdatabase");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['order'])) {
  mysqli_query($conn, "DELETE FROM cart") or die("Query failed");
}
?>

<!-- code session  -->
<?php 
  session_start();
  if(!$_SESSION['is-login']){
    header("Location: ./page_login_logout_signup/dangNhap.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WAMPO - Trang chủ</title>

  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/base.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="website icon" type="png" href="../bookShop/image/free-delivery.png" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <?php include './loader/loader.php'; ?>
</head>

<body>
  <!-- Header -->
  <div class="nav">
    <div class="container">
      <div class="inner-wrap">
        <div class="inner-logo"><img src="image/logoWP.png" alt="" /></div>
        <div class="inner-search">
          <input placeholder="Search book" type="text" />
        </div>
        <div class="inner-menu">
          <ul>
            <li><a href="index.php">Trang Chủ</a></li>
            <li><a href="#section-three">Nổi bật</a></li>
            <li><a href="#">Khuyến Mãi</a></li>
            <li><a href="./page_sanPham/sanPhamDevops.php">Sản phẩm</a></li>
            <li><a href="./page_About_us/aboutUS.php">Liên Hệ</a></li>
          </ul>
        </div>
        <div class="inner-icon">
          <ul>
            <li>
              <a href="./page_login_logout_signup/dangNhap.php"><i class="fa-regular fa-user"></i></a>
            </li>
            <li>
              <a href="./page_shop_cart/cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            </li>
            <li>
              <a href="./page_login_logout_signup/dangXuat.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <h2 class="sale">Giảm giá 20% cho tất cả sách hôm nay</h2>
  <!-- End Header -->
  <!-- Section-one -->
  <div class="section-one">
    <div class="container">
      <div class="inner-wrap">
        <div class="inner-left">
          <div class="Bestseller">#1 Machine Learning Bestseller</div>
          <div class="titile">now in paperback</div>
        </div>
        <div class="inner-right">
          <div class="inner-image">
            <img src="image/Ml_for_high-risk_app.jpg" alt="" />
          </div>
          <div class="inner-content">
            <div class="titile">Select IT Books</div>
            <div class="desc">
              Find the best IT books from your favorite writers, explore
              hundreds of books with all possible categories, take advantage
              of the 50% discount and much more
            </div>
            <div><a class="button1" href="./page_chiTietSanPham/book_cleanCode.html">Shop Now</a></div>
          </div>
        </div>
      </div>
      <div class="inner-bottom">
        <div class="inner-box">
          <img src="image/free-delivery.png" alt="" />
          <div class="inner-content">
            <div class="titile">Free shipping</div>
            <div class="desc">
              Free for most countries/areas. See our Shipping Policy.
            </div>
          </div>
        </div>
        <div class="inner-box">
          <img src="image/product-return.png" alt="" />
          <div class="inner-content">
            <div class="titile">7-Day Return Policy</div>
            <div class="desc">
              For New & Sealed Products. Check our Return Policy.
            </div>
          </div>
        </div>
        <div class="inner-box">
          <img src="image/shield.png" alt="" />
          <div class="inner-content">
            <div class="titile">Secured Payment</div>
            <div class="desc">
              For Books. Check our Secured Transaction Policy.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End section-one -->
  <!-- Section two -->
  <div class="section-two">
    <div class="container">
      <div class="inner-head">
        <div class="inline"></div>
        <div class="inner-title">New books</div>
      </div>
      <div class="inner-wrap">
        <?php

        if (isset($_POST['addToCart'])) {
          $img_book = $_POST['img_book'];
          $name_book = $_POST['name_book'];
          $author_book = $_POST['author_book'];
          $id_book = $_POST['id_book'];
          $year_publish = $_POST['year_publish'];
          $price_book = $_POST['price_book'];
          $quantity = 1;

          $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE id_book = '$id_book'");

          if (mysqli_num_rows($select_cart) > 0) {
            $update_cart = mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id_book = '$id_book'");
          } else {
            $insert_cart = mysqli_query($conn, "INSERT INTO cart(id_book, name_book, img_book, author_book, year_publish, price_book, quantity) VALUES ('$id_book', '$name_book', '$img_book', '$author_book', $year_publish, $price_book, $quantity)");
          }
        }

        $showMore = 6;
        if (isset($_GET['showMore'])) {
          $showMore = $showMore + 9;
        }
        $select_book = mysqli_query($conn, "SELECT book.ID_Book, book.name_book, book.discount, book.buyPrice, book.salePrice, book.year_publish, book.link, book.ID_tacgia, authors.author_name FROM book INNER JOIN authors ON book.ID_tacgia = authors.ID_tacgia ORDER BY year_publish DESC LIMIT $showMore");
        while ($row = mysqli_fetch_assoc($select_book)) { ?>
          <div class="inner-box" id="show-more">
            <div class="inner-image">
              <a href="./page_chiTietSanPham/detailBook.php?showbook=<?php echo $row['ID_Book']; ?>"><img src="<?= $row['link']; ?>" alt="" /></a>
            </div>

            <div class="inner-content">
              <div class="inner-desc">
                <a style="color: black;" href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $row['ID_Book']; ?>"><?= $row['name_book']; ?></a>
              </div>
              <span class="price"><?= $row['salePrice']; ?>,000 <u>đ</u></span>
              <del class="discount"><?= $row['buyPrice']; ?>,000 <u>đ</u></del>
              <form action="" method="post">
                <button class="button" type="submit" name="addToCart">Thêm vào giỏ</button>

                <input type="hidden" name="img_book" value="<?php echo $row['link']; ?>">
                <input type="hidden" name="name_book" value="<?php echo $row['name_book']; ?>">
                <input type="hidden" name="author_book" value="<?php echo $row['author_name']; ?>">
                <input type="hidden" name="id_book" value="<?php echo $row['ID_Book']; ?>">
                <input type="hidden" name="year_publish" value="<?php echo $row['year_publish']; ?>">
                <input type="hidden" name="price_book" value="<?php echo $row['salePrice']; ?>">
              </form>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="view-all"><a href="./index.php?showMore=#show-more">Xem thêm</a></div>
    </div>
  </div>

  <!--End Section two -->
  <!-- Section three -->
  <div class="section-three" id="section-three">
    <div class="container">
      <div class="inner-wrap">
        <div class="title">
          <p class="best-seller">Best seller</p>
          <div class="inline"></div>
        </div>
        <div class="inner-main">
          <div class="inner-box box-first">
            <div class="inner-image">
              <img src="image/Ml_for_high-risk_app.jpg" alt="" />
            </div>
            <div class="inner-content">
              <div class="bookCategory">Machine learning & AI</div>
              <div class="nameBook">
                Machine learning for Hight-Risk Applications
              </div>
              <del class="common price">$20.00</del>
              <span class="common discount">$16.80</span>
            </div>
          </div>
          <div class="inner-box">
            <div class="inner-image">
              <img src="image/Pair_programming_with_ChatGPT.jpg" alt="" />
            </div>
            <div class="inner-content">
              <div class="bookCategory">Machine learning & AI</div>
              <div class="nameBook">
                Machine learning for Hight-Risk Applications
              </div>
              <del class="common price">$20.00</del>
              <span class="common discount">$16.80</span>
            </div>
          </div>
          <div class="inner-box">
            <div class="inner-image">
              <img src="image/The_age_of_Ai.jpg" alt="" />
            </div>
            <div class="inner-content">
              <div class="bookCategory">Machine learning & AI</div>
              <div class="nameBook">
                Machine learning for Hight-Risk Applications
              </div>
              <del class="common price">$20.00</del>
              <span class="common discount">$16.80</span>
            </div>
          </div>
        </div>
        <div class="inner-background"></div>
      </div>
    </div>
  </div>
  <!--End section three -->

  <!-- Begin Author -->
  <div class="wrapper_author">
    <div class="title">
      <p>Tác Giả Nổi Bật</p>
    </div>

    <div class="info_item">
      <div class="left_arrow arrow" id="prev"><i class='bx bx-chevron-left'></i></div>
      <div class="right_arrow arrow" id="next"><i class='bx bx-chevron-right'></i></div>
      <div class="container_info">
        <?php
        $select_author = mysqli_query($conn, "SELECT * FROM authors WHERE year IN (1976,1941,1962,1943,1946,1926,1935, 1955);");
        while ($row = mysqli_fetch_assoc($select_author)) { ?>
          <div class="info_author">
            <img src="./img_author/<?= $row['author_name']; ?>.jpg" alt="authorImg">
            <p class="name"><?= $row['author_name']; ?></p>
            <span>PYTHON PROFESSOR</span>
            <p class="descript">Known for his in-depth coverage of
              Python fundamentals and his focus on
              data science applications</p>
            <div class="social_icon">
              <a href="#"> <i class="fa-brands fa-facebook"></i></a>
              <a href="#"> <i class="fa-solid fa-camera"></i></a>
              <a href="#"> <i class="fa-brands fa-youtube"></i></a>
            </div>
          </div>
        <?php }
        mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>
  <!-- End Author -->

  <!-- form -->
  <div class="section-form">
    <div class="container">
      <div class="inner-wrap">
        <form class="form" action="" method="get">
          <div class="inner-title">WAMPO NEWSLETTER</div>
          <div class="inner-subtitle">
            Stay up to date with all WAMBO news and exclusive offers
          </div>
          <div class="subcribe-email">
            <input class="input-email" type="text" required="" />
            <button class="button"><a href="">SUBCRIBE</a></button>
            <label class="input-label">Enter email</label>
          </div>
          <input type="checkbox" name="" id="" required />
          <span>Tôi đồng ý với
            <a class="term" href="">điều khoản & điều kiện</a></span>
        </form>
      </div>
    </div>
  </div>
  <!--end form -->
  <!-- footter -->
  <footer class="footter">
    <div class="inner-wrap">
      <div class="inner-content content-first">
        <img src="image/logoWP.png" alt="" />
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
  <!--end footter -->

  <script src="./loader/loader.js"></script>
  <script src="./home.js"></script>
</body>

</html>