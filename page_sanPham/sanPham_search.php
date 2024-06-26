<!-- code session  -->
<?php
session_start();
if (!$_SESSION['is-login']) {
    header("Location: ../page_login_logout_signup/dangNhap.php");
}
?>
<!-- kết nối sql -->
<?php
$conn = mysqli_connect("localhost", "root", "", "bookdatabase");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}

//thực hiện câu lệnh truy vấn
$name_book = $_GET['name_book'];
$sql = "SELECT ID_Book, name_book,
    CONCAT(ROUND(discount * 100, 2), '%') AS discount_percentage,
    buyPrice,
    salePrice,
    year_publish,
    link ,
    quantity_sold,
    status FROM bookdatabase.book where name_book like '%{$name_book}%' order by name_book";
$product = mysqli_query($conn, $sql);
if (!$product) {
    die(mysqli_error($conn));
} else {
    // số dòng được trả về
    $num_row = mysqli_num_rows($product);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../styles/sanpham.css">
    <link rel="shorcut icon" href="../images/logoWP.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include '../loader/loader.php'; ?>
</head>

<body>
    <?php require '../includes/header.php'; ?>
    <div class="main">

        <ul class="link-home-page">
            <li><a href="">TRANG CHỦ</a></li>

            <li><a href="">SÁCH</a>
        </ul>
        <div class="result_search"><b>Kết quả tìm kiếm:</b> <?php echo "{$name_book}({$num_row} kết quả)"; ?></div>
        <div class="container-sanpham">

            <div class="inner-left">
                <div class="nav-book">
                    <ul>
                        <li class="sach-list">Sách
                            <ul>
                                <li class="chude-list">Chủ đề
                                    <ul>
                                        <li><a class="a" href="./allProduct.php">All Product</a></li>
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
            </div>

            <div class="inner-right">
                <div class="products">
                    <!-- code ở đây -->
                    <?php foreach ($product as  $product) {

                    ?>
                        <div class="product">
                            <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $product['ID_Book']; ?>">
                                <img src="<?php echo $product['link'] ?>" alt="" width="200px" height="300px">
                            </a>
                            <div class="description">
                                <p><?php echo $product['name_book'] ?></p>
                                <p><strong> <?php echo $product['name_book'] . "({$product['year_publish']})" ?></strong></p>
                                <p class="price"> <span class="gach"><?php echo $product['buyPrice'] . ".00đ" ?></span> <span><?php echo $product['salePrice'] . ".00đ" ?></span></p>
                                <p class="status"><i class="fa-solid fa-circle-check"></i> <span><?php echo $product['status'] ?></span></p>
                                <p class="soluongban"> Đã bán <?php echo $product['quantity_sold'] ?></p>
                                <p class="sale">-<?php echo $product['discount_percentage'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- end here -->
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php require "../includes/footer.php" ?>

        <!-- end footer -->
        <script src="../loader/loader.js"></script>
</body>

</html>