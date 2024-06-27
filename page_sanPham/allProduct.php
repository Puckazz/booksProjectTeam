<!-- code php -->
<?php
require '../includes/database.php';
$conn = mysqli_connect("localhost", "root", "", "bookdatabase");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$category;
if (isset($_GET['category'])) {
    $category = $_GET['category'];
} else {
    $category = '';
}
$where = "";
if (isset($_GET['bt-loc'])) {
    $selected_price = $_GET['gia'];
    echo $selected_price;
    if ($selected_price != "") {
        switch ($selected_price) {
            case "<200":
                $where = " salePrice <= 200";
                break;
            case "500-1000":
                $where = " salePrice >= 500 AND salePrice <= 1000";
                break;
            case ">1000":
                $where = "salePrice >= 1000";
                break;
            default:
                $where = "";
        }
    }
}

// lay so luong tat ca san pham
$total_category = '';
if(!empty($category)){
    $total_category = "WHERE name_category_book =  '$category'  ";
}

$product = mysqli_query($conn, "SELECT * FROM book $total_category");

$number_product = mysqli_num_rows($product);

//so luong san pham tren mot trang
$number_per_page = 12;
$total_row = $number_product;

$num_page = ceil($total_row / $number_per_page);


?>
<!-- end code php -->
<?php
$items = getproductNewFromDatabase();
$page = isset(($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $number_per_page;

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
                                        <li><a href="./allProduct.php">All Product</a></li>
                                        <li><a href="allProduct.php?category=Web">Web Development</a></li>
                                        <li><a href="allProduct.php?category=Game">Game Programing</a></li>
                                        <li><a href="allProduct.php?category=Mobile App">Mobile-app Development</a></li>
                                        <li><a href="allProduct.php?category=Data Science">Data Science</a></li>
                                        <li><a href="allProduct.php?category=Machine Learning">Machine Learning</a></li>
                                        <li><a href="allProduct.php?category=System Administration">System Administration</a></li>
                                        <li><a href="allProduct.php?category=DevOps">DevOps</a></li>

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
                    <form action="" method="get"><select name="gia" id="">
                            <option value="" selected> --chon gia--</option>
                            <option value="<200">nhỏ hơn 200</option>
                            <option value="500-1000">500-1000</option>
                            <option value=">1000">lớn hơn 1000</option>
                        </select>
                        <span> <input type="submit" value="LỌC" name="bt-loc"></span>
                    </form>
                </div>
                <div class="products">

                    <!-- code php for all san pham -->
                    <?php
                    $query = "SELECT 
                    ID_Book, 
                    name_book,
                    CONCAT(ROUND(discount * 100, 2), '%') AS discount_percentage,
                    buyPrice,
                    salePrice,
                    year_publish,
                    link,
                    status,
                    quantity_sold 
                  FROM 
                    bookdatabase.book  
                  ";
                  $conditions = [];
                  if (!empty($category)) {
                      $conditions[] = "name_category_book = '$category'";
                  }
                  if (!empty($where)) {
                      $conditions[] = $where;
                  }
                  
                  if (!empty($conditions)) {
                      $query .= " WHERE " . implode(" AND ", $conditions);
                  }

                    $query .= " LIMIT {$start}, {$number_per_page}";

                    $selected_products = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($selected_products)) {
                    ?>
                        <div class="product">
                            <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $row['ID_Book']; ?>">
                                <img src="<?php echo $row['link'] ?>" alt="" width="200px" height="300px">
                            </a>
                            <div class="description">
                                <p><?php echo $row['name_book'] ?></p>
                                <p><strong> <?php echo $row['name_book'] . "({$row['year_publish']})" ?></strong></p>
                                <p class="price"> <span class="gach"><?php echo $row['buyPrice'] . ".00đ" ?></span> <span><?php echo $row['salePrice'] . ".00đ" ?></span></p>
                                <p class="status"><i class="fa-solid fa-circle-check"></i> <span><?php echo $row['status'] ?></span></p>
                                <p class="soluongban">Đã bán <?php echo $row['quantity_sold'] ?></p>
                                <p class="sale">-<?php echo $row['discount_percentage'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- end here -->
                </div>

                <div class="xemthem">
                    <?php for ($i = 1; $i <= $num_page; $i++) { ?>
                        <a href="?category=<?php echo $category ?>&page=<?php echo $i; ?>" class="<?php echo $page == $i ? 'active_page' : ''; ?>">
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