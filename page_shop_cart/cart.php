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
    <title>Giỏ Hàng Của Bạn</title>
    <link rel="stylesheet" href="./css/cart_styles.css" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="../styles/base.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- header -->
    <div class="nav">
        <div class="container">
            <div class="inner-wrap">
                <div class="inner-logo">
                    <img src="../images/logoWP.png" alt="" />
                </div>
                <div class="inner-search">
                    <input placeholder="Search book" type="text" />
                </div>
                <div class="inner-menu">
                    <ul>
                        <li><a href="../index.html">Trang Chủ</a></li>
                        <li><a href="#">Nổi bật</a></li>
                        <li><a href="#">Khuyến Mãi</a></li>
                        <li>
                            <a href="../page_sanPham/sanPhamWeb.html">Sản phẩm</a>
                        </li>
                        <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="inner-icon">
                    <ul>
                        <li>
                            <a href="../page_sanPham/dangNhap.html"><i class="fa-regular fa-user"></i></a>
                        </li>
                        <li>
                            <a href="../page_shop_cart/cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h2 class="sale">Giảm giá 20% cho tất cả sách hôm nay</h2>

    <!-- end header -->
    <div class="cart">
        <div class="cart_header">
            <h1>Giỏ Hàng</h1>
            <div class="cart_back">
                <a href="../index.html">Trang chủ</a>
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

                $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE id_book = '$id_book'");

                if (mysqli_num_rows($select_cart) > 0) {
                    $update_cart = mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id_book = '$id_book'");
                } else {
                    $insert_cart = mysqli_query($conn, "INSERT INTO cart(id_book, name_book, img_book, author_book, year_publish, price_book, quantity) VALUES ('$id_book', '$name_book', '$img_book', '$author_book', $year_publish, $price_book, $quantity)");
                }
            }

            if (isset($_GET['remove'])) {
                $remove_id = $_GET['remove'];
                mysqli_query($conn, "DELETE FROM cart WHERE name_book = '$remove_id'") or die("Query failed");
                header("Location:cart.php");
            }

            if (isset($_POST['plus'])) {
                $id_update = $_POST['id_update'];
                mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id_book = '$id_update'");
            }

            if (isset($_POST['minus'])) {
                $id_update = $_POST['id_update'];
                mysqli_query($conn, "UPDATE cart SET quantity = quantity - 1 WHERE id_book = '$id_update'");
            }

            $select_all_cart = mysqli_query($conn, "SELECT * FROM cart");
            while ($row = mysqli_fetch_assoc($select_all_cart)) { ?>
                <form action="" method="post" style="width: 100%;">
                    <div class="info_container info_product">
                        <div class="info_book item-1">
                            <img src="<?= $row['img_book']; ?>" alt="book1" />
                            <div class="info_text">
                                <p><?= $row['name_book']; ?></p>
                                <p>by <?= $row['author_book']; ?></p>
                                <p>Published <?= $row['year_publish']; ?></p>
                                <p>ISBN <?= $row['id_book']; ?></p>
                                <div class="wrapper">
                                    <div class="info_quantity">
                                        <button class="minus" type="submit" name="minus">-</button>
                                        <span class="num"><?= $row['quantity']; ?></span>
                                        <button class="plus" type="submit" name="plus">+</button>
                                    </div>
                                    <a href="cart.php?remove=<?php echo $row['name_book'] ?>" class="btn-rm">Xoá</a>
                                </div>
                            </div>
                        </div>
                        <div class="info_price item-2"><?= $row['price_book']; ?>,000<u>đ</u></div>
                        <div class="info_quantity item-3">
                            <button class="minus" type="submit" name="minus">-</button>
                            <span class="num"><?= $row['quantity']; ?></span>
                            <input type="hidden" name="id_update" value="<?php echo $row['id_book'] ?>">
                            <button class="plus" type="submit" name="plus">+</button>
                        </div>
                        <div class="info_total item-4">
                            <span class="total"><?= $row['price_book'] * $row['quantity']; ?>,000</span> <u>đ</u>
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
                <button>
                    <i class="bx bx-arrow-back"></i>
                    TIẾP TỤC XEM SẢN PHẨM
                </button>
            </div>
            <div class="cart_pay">
                <div class="column_item pay_total">
                    <p>TỔNG CỘNG</p>
                    <p class="total_all"><?= $total_all; ?>,000</p><u>đ</u>
                </div>
                <div class="column_item pay_discount">
                    <i class="bx bxs-discount"></i>
                    <p>Mã giảm giá</p>
                    <div class="open_dc">
                        Xem tất cả
                        <i class="bx bx-chevron-right"></i>
                    </div>
                </div>
                <a href="checkouts.html" class="column_item pay_btn">
                    <p>THANH TOÁN</p>
                </a>
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
                    <p class="code">Nhập mã: WP123</p>
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
                    <p class="code">Nhập mã: WP123</p>
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
                    <p class="code">Nhập mã: WP123</p>
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
                    <p class="code">Nhập mã: WP123</p>
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
                    $sql = "SELECT book.ID_Book, book.name_book, book.buyPrice, book.year_publish, book.link, book.ID_tacgia, authors.author_name 
                    FROM book INNER JOIN authors 
                    ON book.ID_tacgia = authors.ID_tacgia
                    ORDER BY RAND()
                    LIMIT 15";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <form action="" method="post">
                            <div class="item_info">
                                <div class="card">
                                    <i class="bx bxs-heart"></i>
                                    <div class="img_item"><img src="<?= $row['link'] ?>" alt="book1" loading="lazy" /></div>
                                </div>
                                <p><?= $row['name_book']; ?></p>
                                <span><?= $row['buyPrice']; ?>,000<u>đ</u></span>
                                <button type="submit" name="addToCart">Thêm vào giỏ</button>

                                <input type="hidden" name="img_book" value="<?php echo $row['link']; ?>">
                                <input type="hidden" name="name_book" value="<?php echo $row['name_book']; ?>">
                                <input type="hidden" name="author_book" value="<?php echo $row['author_name']; ?>">
                                <input type="hidden" name="id_book" value="<?php echo $row['ID_Book']; ?>">
                                <input type="hidden" name="year_publish" value="<?php echo $row['year_publish']; ?>">
                                <input type="hidden" name="price_book" value="<?php echo $row['buyPrice']; ?>">
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

    <!-- end footer  -->

    <script src="js/cart.js"></script>
</body>

</html>