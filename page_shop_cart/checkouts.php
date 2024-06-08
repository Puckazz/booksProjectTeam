<?php
$conn = mysqli_connect("localhost", "root", "", "bookdatabase");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$id_customer = $_SESSION['id_customer'];

$total_books = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    $total_books = $_POST['total_book'];
}

$select_customer = mysqli_query($conn, "SELECT * FROM customers WHERE ID_customer_new = $id_customer");
if (isset($_POST['order'])) {
    $user = mysqli_fetch_assoc($select_customer);
    $name_customer = $user['name_customer'];
    $address = $user['address'];
    $phone_number = $user['number_phone'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date_order = date('Y-m-d H:i:s');
    $total = $_POST['total'];
    $note = $_POST['note'];

    mysqli_query($conn, "INSERT INTO bill(name_customer, address, phone_number, date_of_bill, total, note) VALUES ('$name_customer', '$address', '$phone_number', '$date_order', $total, '$note')");
    mysqli_query($conn, "DELETE FROM cart WHERE id_customer = $id_customer");

    $message = 'Cảm ơn bạn đã mua hàng tại WAMPO. Đơn hàng sẽ sớm được giao đến tay bạn!';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/checkout_styles.css" />
    <link rel="shortcut icon" href="../images/logoWP.png">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Thanh Toán Đơn Hàng</title>

    <?php include '../loader/loader.php'; ?>
</head>

<body>
    <?php
    if (isset($message)) {
        echo '<div id="popup_con" class="popup_container">
        <div id="popup_box" class="popup_box">
            <i class="bx bxs-check-circle"></i>
            <h4>Đặt hàng thành công</h4>
            <p>' . $message . '</p>
            <button class="back_btn" onclick="window.location.href = \'../index.php\'">Trở Về Trang Chủ</button>
        </div>
    </div>';
    }
    ?>

    <div class="checkout">
        <form action="" class="column_wrapper method_pay-form">
            <h3>THÔNG TIN THANH TOÁN</h3>
            <?php
            $qr_customer = mysqli_query($conn, "SELECT * FROM customers WHERE ID_customer_new = $id_customer");
            while ($row = mysqli_fetch_assoc($qr_customer)) { ?>
                <label for="" class="form_label">Tên*</label>
                <input type="text" class="form_input" value="<?= $row['name_customer']; ?>" />
                <label for="" class="form_label">Số điện thoại*</label>
                <input type="text" class="form_input" value="<?= $row['number_phone']; ?>" />
                <label for="email" class="form_label">Địa chỉ email*</label>
                <input type="email" id="email" class="form_input" value="<?= $row['email']; ?>" />
                <label for="" class="form_label">Quốc gia/Khu vực*</label>
                <span>Việt Nam</span>
                <label for="" class="form_label">Địa chỉ*</label>
                <input type="text" class="form_input" value="<?= $row['address']; ?>"/>
            <?php
            }
            $note = "";
            ?>
            <label for="" class="form_label">Tỉnh/Thành phố*</label>
            <div class="select_container">
                <select name="" id="form_select">
                    <option value="null" selected>
                        <p>Chọn Tỉnh/Thành phố</p>
                    </option>
                    <option value="Bình Định">Bình Định</option>
                </select>
                <div class="icon_container">
                    <i class="bx bxs-down-arrow"></i>
                </div>
            </div>
            <label for="" class="form_label">Quận/Huyện*</label>
            <div class="select_container">
                <select name="" id="form_select">
                    <option value="null" selected>Chọn Quận/Huyện</option>
                    <option value="Huyện An Lão">Huyện An Lão</option>
                    <option value="Huyện Vân Canh">Huyện Vân Canh</option>
                    <option value="Huyện Tây Sơn">Huyện Tây Sơn</option>
                    <option value="Huyện Hoài Ân">Huyện Hoài Ân</option>
                    <option value="Huyện Phù Mỹ">Huyện Phù Mỹ</option>
                    <option value="Huyện Vĩnh Thạnh">Huyện Vĩnh Thạnh</option>
                    <option value="Thành phố Quy Nhơn">Thành phố Quy Nhơn</option>
                    <option value="Thị xã An Nhơn">Thị xã An Nhơn</option>
                    <option value="Huyện Phù Cát">Huyện Phù Cát</option>
                    <option value="Huyện Hoài Nhơn">Huyện Hoài Nhơn</option>
                    <option value="Huyện Tuy Phước">Huyện Tuy Phước</option>
                </select>
                <div class="icon_container">
                    <i class="bx bxs-down-arrow"></i>
                </div>
            </div>
            <label for="" class="form_label">Phường/Xã*</label>
            <div class="select_container">
                <select name="" id="form_select">
                    <option value="null" selected>Chọn Phường/Xã</option>
                    <option value="Phường Ngô Mây">Phường Ngô Mây</option>
                    <option value="Phường Đống Đa">Phường Đống Đa</option>
                    <option value="Phường Quang Trung">Phường Quang Trung</option>
                </select>
                <div class="icon_container">
                    <i class="bx bxs-down-arrow"></i>
                </div>
            </div>
            <label for="" class="form_label">Ghi chú đơn hàng (tuỳ chọn)</label>
            <textarea style="resize: none;" id="form_note" cols="50" rows="5" placeholder="• Ghi chú về giao hàng: ví dụ như thời gian, chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
            <a href="./cart.php">Quay lại giỏ hàng</a>
        </form>

        <div class="column_wrapper your_order">
            <h3>ĐƠN HÀNG CỦA BẠN</h3>
            <div class="row_item item_1">
                <span>SẢN PHẨM</span>
                <p>TẠM TÍNH</p>
            </div>
            <?php
            $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE id_customer = $id_customer");
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
                <form action="" method="post">
                    <button type="submit" class="show_popup" name="order" onclick="copyNote()">Đặt hàng</button>
                    <input id="totalInput" type="hidden" name="total" value="<?php echo $total_books; ?>">
                    <textarea name="note" id="content" style="display: none;"></textarea>
                </form>
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

    <?php mysqli_close($conn); ?>
    <script src="js/checkouts.js"></script>
    <script src="../loader/loader.js"></script>
</body>

</html>