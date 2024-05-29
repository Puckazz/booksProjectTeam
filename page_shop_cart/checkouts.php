<?php
$conn = mysqli_connect("localhost", "root", "", "bookdatabase");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$total_books = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_books = $_POST['total_book'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/checkout_styles.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Thanh Toán Đơn Hàng</title>

    <?php include '../loader/loader.php'; ?>
</head>

<body>
    <div class="popup_container">
        <div class="popup_box">
            <i class='bx bxs-check-circle'></i>
            <h4>Đặt hàng thành công</h4>
            <p>Cảm ơn bạn đã mua hàng tại WAMPO. Đơn hàng sẽ sớm được giao đến tay bạn!</p>
            <button onclick="window.location.href = '../index.php'" class="back_btn">Trở Về Trang Chủ</button>
        </div>
    </div>

    <div class="checkout">
        <form action="" class="column_wrapper method_pay-form">
            <h3>THÔNG TIN THANH TOÁN</h3>
            <label for="" class="form_label">Tên*</label>
            <input type="text" class="form_input" />
            <label for="" class="form_label">Số điện thoại*</label>
            <input type="text" class="form_input" />
            <label for="email" class="form_label">Địa chỉ email*</label>
            <input type="email" id="email" class="form_input" />
            <label for="" class="form_label">Quốc gia/Khu vực*</label>
            <span>Việt Nam</span>
            <label for="" class="form_label">Địa chỉ*</label>
            <input type="text" class="form_input" />
            <label for="" class="form_label">Tỉnh/Thành phố*</label>
            <div class="select_container">
                <select name="" id="form_select">
                    <option value="null" selected>
                        <p>Chọn Tỉnh/Thành phố</p>
                    </option>
                </select>
                <div class="icon_container">
                    <i class="bx bxs-down-arrow"></i>
                </div>
            </div>
            <label for="" class="form_label">Quận/Huyện*</label>
            <div class="select_container">
                <select name="" id="form_select">
                    <option value="null" selected>Chọn Quận/Huyện</option>
                </select>
                <div class="icon_container">
                    <i class="bx bxs-down-arrow"></i>
                </div>
            </div>
            <label for="" class="form_label">Phường/Xã*</label>
            <div class="select_container">
                <select name="" id="form_select">
                    <option value="null" selected>Chọn Phường/Xã</option>
                </select>
                <div class="icon_container">
                    <i class="bx bxs-down-arrow"></i>
                </div>
            </div>
            <label for="" class="form_label">Ghi chú đơn hàng (tuỳ chọn)</label>
            <textarea name="" id="form_note" cols="50" rows="5" placeholder="• Ghi chú về giao hàng: ví dụ như thời gian, chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
            <a href="./cart.php">Quay lại giỏ hàng</a>
        </form>

        <div class="column_wrapper your_order">
            <h3>ĐƠN HÀNG CỦA BẠN</h3>
            <div class="row_item item_1">
                <span>SẢN PHẨM</span>
                <p>TẠM TÍNH</p>
            </div>
            <?php
            $select_cart = mysqli_query($conn, "SELECT * FROM cart");
            while ($row = mysqli_fetch_assoc($select_cart)) { ?>
                <div class="row_item item_product">
                    <p><?= $row['name_book']; ?> x<?= $row['quantity']; ?></p>
                    <span class="price"><?= $row['price_book'] * $row['quantity']; ?>000</span>
                </div>
            <?php
            }
            ?>
            <div class="row_item discount_code">
                <input type="text" placeholder="Mã giảm giá" class="form_input" id="voucher" />
                <button type="submit" id="use_voucher">Sử dụng</button>
            </div>
            <div class="row_item item_2">
                <span>Tạm tính</span> <span class="total"><?= $total_books; ?>000</span>
            </div>
            <div class="row_item item_voucher" id="item_voucher"></div>
            <p class="shipping pad">Giao hàng</p>
            <div class="shipping pad">
                <input type="radio" name="ship" checked id="shipping-1" /> Đơn hàng từ 250K
                được miễn phí giao hàng
            </div>
            <div class="shipping">
                <input type="radio" name="ship" id="shipping-2" /> Đồng giá: 20,000 <u>đ</u>
            </div>
            <div class="row_item item_3">
                <span>Tổng</span> <span class="total_all"><?= $total_books; ?>000</span>
            </div>
            <?php mysqli_close($conn); ?>
            <p class="shipping pad">Phương thức thanh toán</p>
            <div class="method_pay">
                <div class="row_item">
                    <input type="radio" name="pay" checked />
                    <img src="img/cod.svg" alt="cod" />Trả tiền mặt khi nhận
                    hàng
                </div>
                <div class="row_item">
                    <input type="radio" name="pay" />
                    <img src="img/other.svg" alt="other" />Chuyển khoản qua
                    ngân hàng
                </div>
                <div class="row_item">
                    <input type="radio" name="pay" />
                    <img src="img/momo.svg" alt="momo" />Ví MoMo
                </div>
                <div class="row_item" id="zalo-rmborder">
                    <input type="radio" name="pay" />
                    <img src="img/zalo.png" alt="zalo" style="border-radius: 4px" />Ví ZaloPay
                </div>
            </div>
            <div class="row_item order_item">
                <button type="submit" class="show_popup">Đặt hàng</button>
                <p>
                    Tất cả thông tin của bạn chỉ được sử dụng cho việc đặt
                    hàng và cải thiện trải nghiệm sản phẩm. Ngoài ra được
                    Wampo đảm bảo về quyền riêng tư cá nhân theo quy định
                    luật pháp.
                </p>
                <p>
                    ( Email xác nhận đơn hàng có thể sẽ trong mục email
                    quảng cáo)
                </p>
            </div>
        </div>
    </div>

    <script src="js/checkouts.js"></script>
    <script src="../loader/loader.js"></script>
</body>

</html>