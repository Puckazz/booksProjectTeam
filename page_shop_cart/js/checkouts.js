// format price in checkout
function formatPrice(str, item) {
    const priceElement = item.querySelector(str);
    const originalPrice = parseInt(priceElement.textContent.replace(/,/g, ""));
    const formattedPrice = originalPrice
        .toLocaleString("vi-VN", {
            style: "currency",
            currency: "VND",
        })
        .replace(".", ",")
        .replace(".", ",");

    priceElement.textContent = formattedPrice;
}

const itemProduct = document.querySelectorAll(".item_product");
itemProduct.forEach((item) => {
    formatPrice(".price", item);
});
formatPrice(".total", document);
formatPrice(".total_all", document);

// apply vocher code
const inputVocher = document.getElementById("voucher");
const btnVoucher = document.getElementById("use_voucher");
const dcPrice = document.getElementById("item_voucher");

const totalAll = document.querySelector(".total_all");
var totalAllInt = parseInt(totalAll.textContent.replace(/,/g, ""));

btnVoucher.addEventListener("click", function () {
    const totalAll = document.querySelector(".total_all");
    var totalAllInt = parseInt(totalAll.textContent.replace(/,/g, ""));

    if (inputVocher.value == "WP1234" && totalAllInt >= 500000) {
        dcPrice.innerHTML =
            "<span>Mã giảm giá</span> <span>-100,000 <u>đ</u></span>";
        dcPrice.style.display = "flex";
        deduction(100000);
        btnVoucher.style.backgroundColor = "#8E8A8E";
        btnVoucher.disabled = true;
    } else {
        dcPrice.innerHTML =
            "<span style='color: #ff0000; font-size: 14px; margin: 0;'>Đơn hàng của bạn không thể sử dụng mã giảm giá này !</span>";
        dcPrice.style.display = "flex";
        setTimeout(function () {
            dcPrice.style.display = "none";
        }, 4000);
    }
});

function deduction(price) {
    const totalAll = document.querySelector(".total_all");
    var totalAllInt = parseInt(totalAll.textContent.replace(/,/g, ""));

    totalAllInt = totalAllInt - price;
    totalAll.textContent = totalAllInt;
    formatPrice(".total_all", document);
}

// select shipping
const inputShippingOne = document.getElementById("shipping-1");
const inputShippingTwo = document.getElementById("shipping-2");

inputShippingOne.addEventListener("click", () => {
    const totalAll = document.querySelector(".total_all");
    var totalAllInt = parseInt(totalAll.textContent.replace(/,/g, ""));

    totalAllInt = totalAllInt + 20000;
    totalAll.textContent = totalAllInt;
    formatPrice(".total_all", document);
});
inputShippingTwo.addEventListener("click", () => {
    deduction(20000);
});

// Checkout complete
const showPopup = document.querySelector(".show_popup");
const popupContainer = document.querySelector(".popup_container");

showPopup.addEventListener("click", () => {
    popupContainer.classList.add("active");
});
