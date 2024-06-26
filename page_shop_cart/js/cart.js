document.addEventListener("DOMContentLoaded", function () {
    checkIfCartIsEmpty();
});

function checkIfCartIsEmpty() {
    var cartItems = document.getElementsByClassName("info_product");
    if (cartItems.length === 0) {
        var cartContainer = document.getElementsByClassName("cart_info")[0];
        var checkoutContainer =
            document.getElementsByClassName("cart_checkout")[0];
        cartContainer.remove();
        checkoutContainer.remove();
        showEmptyCartMessage();
    }
}
function showEmptyCartMessage() {
    const messageContainer = document.getElementById("message-container");
    messageContainer.style.display = "flex";
    messageContainer.innerHTML =
        "<img src='img/cart_empty.jpg' alt='cart_empty'><div class='empty-cart-message'>Không có sản phẩm nào trong giỏ hàng của bạn!</div><a href='../index.php'>Mua sắm ngay</a>";
}

// format price
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

const quantityItem = document.querySelectorAll(".info_product");
quantityItem.forEach((item) => {
    formatPrice(".info_price", item);
    formatPrice(".total", item);
});

formatPrice(".total_all", document);

const container = document.querySelectorAll(".item_info");
container.forEach((item) => {
    formatPrice(".sale_price", item);
    formatPrice(".buy_price", item);
});

// hide discount if it not discount
container.forEach((item) => {
    const sale = item.querySelector(".discount");
    const buyPrice = item.querySelector(".buy_price");
    const saleInt = parseInt(sale.textContent.replace(/-|%/g, ""));
    if (saleInt < 1) {
        sale.style.display = "none";
        buyPrice.style.display = "none";
    }
});

// vocher code
let openDiscountCode = document.querySelector(".open_dc");
let closeDiscountCode = document.querySelector(".btn_closing");
let body = document.querySelector("body");

openDiscountCode.addEventListener("click", () => {
    body.classList.add("active");
});
closeDiscountCode.addEventListener("click", () => {
    body.classList.remove("active");
});
document.addEventListener("DOMContentLoaded", function () {
    var buttonCopy = document.getElementsByClassName("copy");
    for (var i = 0; i < buttonCopy.length; i++) {
        buttonCopy[i].addEventListener("click", function () {
            var button = this;
            button.innerHTML = "Đã sao chép";

            setTimeout(function () {
                button.innerHTML = "Sao chép";
            }, 1000);
        });
    }
});

// Cart slider item like
const cardlike = document.querySelector(".card_like");
const arrowBtn = document.querySelectorAll(".container_product .arrow");
const firstCardWidth = cardlike.querySelector(".item_info").offsetWidth;

arrowBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        cardlike.scrollLeft +=
            btn.id === "prev" ? -firstCardWidth : firstCardWidth;
    });
});

// message
const mes = document.getElementById("message_box");
mes.style.transform = "translateX(-15px)";
setTimeout(function () {
    mes.style.transform = "translateX(370px)";
}, 3500);
