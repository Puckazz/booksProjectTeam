<!-- Kết nối database -->
<?php
$conn = mysqli_connect("localhost", "root", "", "bookdatabase");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_SESSION['id_customer'];
?>
<?php
  if(isset($_GET["search_btn"])){
    $url = "/booksProjectTeam/page_sanPham/sanPham_search.php?name_book=".$_GET["name_book"];

    header('location:'.$url);
  }

?>

<div class="nav">
      <div class="container">
        <div class="inner-wrap">
          <div class="inner-logo"><img src="/booksProjectTeam/image/logoWP.png" alt="" /></div>
          <div class="inner-search">
           <form action="" method="get">
            <input placeholder="Search book" type="text" name="name_book" />
           <button class="search_btn" name="search_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          </div>
          <div class="inner-menu">
            <ul>
              <li><a href="/booksProjectTeam/index.php">Trang Chủ</a></li>
              <li><a href="#section-three">Nổi bật</a></li>
              <li><a href="#">Khuyến Mãi</a></li>
              <li><a href="/booksProjectTeam/page_sanPham/sanPhamWeb.php">Sản phẩm</a></li>
              <li><a href="/booksProjectTeam/page_About_us/aboutUS.php">Liên Hệ</a></li>
            </ul>
          </div>
          <div class="inner-icon">
            <ul>
              <li>
                <a href="/booksProjectTeam/page_profile/profile.php"><?php echo $_SESSION['username']; ?></a>
              </li>
              <li>
                <a id="num_cart" href="/booksProjectTeam/page_shop_cart/cart.php">
                  <i class="fa-solid fa-bag-shopping"></i>
                  <?php 
                  $qt = 0;
                  $sql = "0";
                  $selectCart = mysqli_query($conn, "SELECT quantity FROM cart WHERE id_customer = $id");
                  if (mysqli_num_rows($selectCart) > 0) {
                    while ($num_cart = mysqli_fetch_assoc($selectCart)) {
                      $qt += $num_cart['quantity']; ?>
                      <span class="number_cart"><?= $qt; ?></span>
                    <?php 
                    } 
                  }
                  ?>
                </a>
              </li>
              <li>
                <a href="/booksProjectTeam/page_login_logout_signup/dangXuat.php"><i class="fa-solid fa-right-from-bracket"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>