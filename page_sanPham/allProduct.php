<!-- code php -->
<?php
require "../includes/database.php";

$where = "";
if (isset($_POST['bt-loc'])) {
    $selected_price = $_POST['gia'];
    echo $selected_price;
    if ($selected_price != "") {
        switch ($selected_price) {
            case "<200":
                $where = "salePrice < 200";
                break;
            case "500-1000":
                $where = "salePrice > 500 AND salePrice < 1000";
                break;
            case ">1000":
                $where = "salePrice > 1000";
                break;
            default:
                $where = "";
        }
    }
}
$number_product = getquantityProduct();

$number_per_page = 10;
$total_row = $number_product;

$num_page = ceil($total_row / $number_per_page);


?>
<!-- end code php -->
<?php
$items = getproductNewFromDatabase();
$page = isset(($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $number_per_page;
$products = getProduct($start, $number_per_page,$where);
?>
<!-- code session  -->
<?php
session_start();
if (!$_SESSION['is-login']) {
    header("Location: ../page_login_logout_signup/dangNhap.php");
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
        <div class="container-sanpham">

            <div class="inner-left">
                <div class="nav-book">
                    <ul>
                        <li class="sach-list">Sách
                            <ul>
                                <li class="chude-list">Chủ đề
                                    <ul>
                                        <li><a class="a-active" href="./allProduct.php">All Product</a></li>
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
                                <p><strong><?php echo $item['name_book'] . " ";
                                            echo $item['year_publish'] ?></strong></p>
                                <p class="price"> <span class="gach"><?php echo $item['buyPrice'] . ".00đ" ?></span> <span><?php echo $item['salePrice'] . ".00đ" ?></span></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="inner-right">
                <div class="filter">
                    <form action="" method="post"><select name="gia" id="">
                            <option value="" selected> --chon--</option>
                            <option value="<200">nhỏ hơn 200</option>
                            <option value="500-1000">500-1000</option>
                            <option value=">1000">lớn hơn 1000</option>
                        </select>
                        <span> <input type="submit" value="LỌC" name="bt-loc"></span>
                    </form>
                </div>
                <div class="products">

                    <!-- code php for all san pham -->
                    <?php foreach ($products as  $item) {

                    ?>
                        <div class="product">
                            <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $item['ID_Book']; ?>">
                                <img src="<?php echo $item['link'] ?>" alt="" width="200px" height="300px">
                            </a>
                            <div class="description">
                                <p><?php echo $item['name_book'] ?></p>
                                <p><strong> <?php echo $item['name_book'] . "({$item['year_publish']})" ?></strong></p>
                                <p class="price"> <span class="gach"><?php echo $item['buyPrice'] . ".00đ" ?></span> <span><?php echo $item['salePrice'] . ".00đ" ?></span></p>
                                <p class="status"><i class="fa-solid fa-circle-check"></i> <span><?php echo $item['status'] ?></span></p>
                                <p class="soluongban">Đã bán <?php echo $item['quantity_sold'] ?></p>
                                <p class="sale">-<?php echo $item['discount_percentage'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- end here -->
                </div>

                <div class="xemthem">
                    <?php for ($i = 1; $i <= $num_page; $i++) { ?>
                        <a href="?mod=sanpham&page=<?php echo $i; ?>" class="<?php echo $page == $i ? 'active_page' : ''; ?>">
                            <div class="circle-page"><?php echo $i; ?></div>
                        </a>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "../includes/footer.php" ?>

    <!-- end footer -->
    <script src="../loader/loader.js"></script>
</body>

</html>