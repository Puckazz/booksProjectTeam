<?php
session_start();

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
    <title>Giỏ Hàng Của Bạn</title>
    <link rel="stylesheet" href="./css/cart_styles.css" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="../styles/base.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/logoWP.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php include '../loader/loader.php'; ?>
</head>

<body>
    <!-- header -->
    <?php require '../includes/header.php' ?>
    <h2 class="sale">Giảm giá 20% cho tất cả sách hôm nay</h2>

    <!-- end header -->
    <div class="cart">
        <div class="cart_header">
            <h1>Giỏ Hàng</h1>
            <div class="cart_back">
                <a href="../index.php">Trang chủ</a>
                <i class="bx bx-chevron-right"></i>
                <span>Giỏ hàng của bạn</span>
            </div>
        </div>

        <div class="cart_info">
            <div class="info_container info_title">
                <div class="item-1">Sản phẩm</div>
                <div class="item-2">Giá</div>
                <div class="item-3">Số lượng</div>
                <div class="item-4">Tổng tiền</div>
            </div>

            <?php
            // Add book to cart
            $total_all = 0;
            if (isset($_POST['addToCart'])) {
                $img_book = $_POST['img_book'];
                $name_book = $_POST['name_book'];
                $author_book = $_POST['author_book'];
                $id_book = $_POST['id_book'];
                $year_publish = $_POST['year_publish'];
                $price_book = $_POST['price_book'];
                $quantity = 1;
                $id_customer = $_SESSION['id_customer'];

                $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE id_book = '$id_book'");

                if (mysqli_num_rows($select_cart) > 0) {
                    $update_cart = mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id_book = '$id_book'");
                } else {
                    $insert_cart = mysqli_query($conn, "INSERT INTO cart(id_book, name_book, img_book, author_book, year_publish, price_book, quantity, id_customer) VALUES ('$id_book', '$name_book', '$img_book', '$author_book', $year_publish, $price_book, $quantity, $id_customer)");
                }
            }

            if (isset($_GET['remove'])) {
                $remove_id = $_GET['remove'];
                mysqli_query($conn, "DELETE FROM cart WHERE id_book = '$remove_id'") or die("Query failed");
            }

            if (isset($_POST['plus'])) {
                $id_update = $_POST['id_update'];
                mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id_book = '$id_update'");
            }

            if (isset($_POST['minus'])) {
                $id_update = $_POST['id_update'];
                $qt = mysqli_query($conn, "SELECT quantity FROM cart WHERE id_book = '$id_update'");
                $row = mysqli_fetch_assoc($qt);
                $current_quantity = $row['quantity'];
                if ($current_quantity > 1) {
                    mysqli_query($conn, "UPDATE cart SET quantity = quantity - 1 WHERE id_book = '$id_update'");
                } else {
                    mysqli_query($conn, "DELETE FROM cart WHERE id_book = '$id_update'");
                }
            }

            $id_customer = $_SESSION['id_customer'];
            $select_all_cart = mysqli_query($conn, "SELECT * FROM cart WHERE id_customer = $id_customer");
            while ($row = mysqli_fetch_assoc($select_all_cart)) { ?>
                <form action="" method="post" style="width: 100%;">
                    <div class="info_container info_product">
                        <div class="info_book item-1">
                            <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $row['id_book']; ?>"><img src="<?= $row['img_book']; ?>" alt="book1" /></a>
                            <div class="info_text">
                                <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $row['id_book']; ?>">
                                    <p><?= $row['name_book']; ?></p>
                                </a>
                                <p>by <?= $row['author_book']; ?></p>
                                <p>Published <?= $row['year_publish']; ?></p>
                                <p>ISBN <?= $row['id_book']; ?></p>
                                <div class="wrapper">
                                    <div class="info_quantity">
                                        <button class="minus" type="submit" name="minus">-</button>
                                        <span class="num"><?= $row['quantity']; ?></span>
                                        <button class="plus" type="submit" name="plus">+</button>
                                    </div>
                                    <a href="cart.php?remove=<?php echo $row['id_book'] ?>" class="btn-rm">Xoá</a>
                                </div>
                            </div>
                        </div>
                        <div class="info_price item-2"><?= $row['price_book']; ?>000</div>
                        <div class="info_quantity item-3">
                            <button class="minus" type="submit" name="minus">-</button>
                            <span class="num"><?= $row['quantity']; ?></span>
                            <input type="hidden" name="id_update" value="<?php echo $row['id_book'] ?>">
                            <button class="plus" type="submit" name="plus">+</button>
                        </div>
                        <div class="info_total item-4">
                            <span class="total"><?= $row['price_book'] * $row['quantity']; ?>000</span>
                        </div>
                    </div>
                </form>
            <?php
                $total_all += $row['price_book'] * $row['quantity'];
            }
            ?>

        </div>

        <div class="cart_checkout">
            <div class="btn_back">
                <button onclick="window.location.href = '../page_sanPham/sanPhamWeb.php'">
                    <i class="bx bx-arrow-back"></i>
                    TIẾP TỤC XEM SẢN PHẨM
                </button>
            </div>
            <div class="cart_pay">
                <div class="column_item pay_total">
                    <p>TỔNG CỘNG</p>
                    <p class="total_all" id="total_all"><?= $total_all; ?>000</p>
                </div>
                <div class="column_item pay_discount">
                    <i class="bx bxs-discount"></i>
                    <p>Mã giảm giá</p>
                    <div class="open_dc">
                        Xem tất cả
                        <i class="bx bx-chevron-right"></i>
                    </div>
                </div>
                <form action="./checkouts.php" method="post" style="width: 100%;">
                    <input type="hidden" name="total_book" value="<?php echo $total_all; ?>">
                    <button class="column_item pay_btn" type="submit" name="checkout">THANH TOÁN</button>
                </form>
            </div>
        </div>

        <div id="message-container"></div>
    </div>
    <div class="coupon-opacity"></div>
    <div class="discount_code">
        <p id="header">Mã giảm giá</p>
        <div class="list_item">
            <div class="voucher">
                <div id="title">VOUCHER</div>
                <div class="col_item_1">
                    <p class="price">20,000<span>VNĐ</span></p>
                    <p class="code">Nhập mã: HKT919</p>
                </div>
                <div class="col_item_2">
                    <p class="level_price">Đơn từ 99K</p>
                    <button class="copy">Sao chép</button>
                </div>
            </div>

            <div class="voucher">
                <div id="title">VOUCHER</div>
                <div class="col_item_1">
                    <p class="price">50,000<span>VNĐ</span></p>
                    <p class="code">Nhập mã: AH789P</p>
                </div>
                <div class="col_item_2">
                    <p class="level_price">Đơn từ 300K</p>
                    <button class="copy">Sao chép</button>
                </div>
            </div>

            <div class="voucher">
                <div id="title">VOUCHER</div>
                <div class="col_item_1">
                    <p class="price">10,000<span>VNĐ</span></p>
                    <p class="code">Nhập mã: 617ADG</p>
                </div>
                <div class="col_item_2">
                    <p class="level_price">Đơn từ 50K</p>
                    <button class="copy">Sao chép</button>
                </div>
            </div>

            <div class="voucher">
                <div id="title">VOUCHER</div>
                <div class="col_item_1">
                    <p class="price">100,000<span>VNĐ</span></p>
                    <p class="code">Nhập mã: WP1234</p>
                </div>
                <div class="col_item_2">
                    <p class="level_price">Đơn từ 500K</p>
                    <button class="copy">Sao chép</button>
                </div>
            </div>
        </div>
        <div class="btn_closing"><button>Quay lại giỏ hàng</button></div>
    </div>

    <div class="container_cart">
        <div class="container_product">
            <div class="left_arrow arrow" id="prev">
                <i class="bx bx-chevron-left"></i>
            </div>
            <div class="item_like">
                <h2>Có thể bạn sẽ thích</h2>
                <div class="item_like card_like">
                    <?php
                    $sql = "SELECT book.ID_Book, book.name_book, book.discount, book.buyPrice, book.salePrice, book.year_publish, book.link, book.ID_tacgia, authors.author_name 
                    FROM book INNER JOIN authors 
                    ON book.ID_tacgia = authors.ID_tacgia
                    ORDER BY RAND()
                    LIMIT 15";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <form action="" method="post">
                            <div class="item_info">
                                <div class="card">
                                    <i class="bx bx-heart"></i>
                                    <span class="discount">-<?= $row['discount'] * 100; ?>%</span>
                                    <div class="img_item">
                                        <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $row['ID_Book']; ?>"><img src="<?= $row['link']; ?>" alt="book1" loading="lazy" /></a>
                                    </div>
                                </div>
                                <a href="../page_chiTietSanPham/detailBook.php?showbook=<?php echo $row['ID_Book']; ?>">
                                    <p><?= $row['name_book']; ?></p>
                                </a>
                                <div class="price_item">
                                    <span class="sale_price"><?= $row['salePrice']; ?>000</span>
                                    <del class="buy_price"><?= $row['buyPrice']; ?>000</del>
                                </div>
                                <button type="submit" name="addToCart">Thêm vào giỏ</button>

                                <input type="hidden" name="img_book" value="<?php echo $row['link']; ?>">
                                <input type="hidden" name="name_book" value="<?php echo $row['name_book']; ?>">
                                <input type="hidden" name="author_book" value="<?php echo $row['author_name']; ?>">
                                <input type="hidden" name="id_book" value="<?php echo $row['ID_Book']; ?>">
                                <input type="hidden" name="year_publish" value="<?php echo $row['year_publish']; ?>">
                                <input type="hidden" name="price_book" value="<?php echo $row['salePrice']; ?>">
                            </div>
                        </form>
                    <?php }
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
            <div class="right_arrow arrow" id="next">
                <i class="bx bx-chevron-right"></i>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php require '../includes/footer.php' ?>
    <!-- end footer  -->

    <script src="js/cart.js"></script>
    <script src="../loader/loader.js"></script>
</body>

</html>