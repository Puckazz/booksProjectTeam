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
    var messageContainer = document.getElementById("message-container");
    messageContainer.innerHTML =
        "<div class='empty-cart-message' style='margin: 180px 0;'>Không có sản phẩm nào trong giỏ hàng.</div>";
}


// format price
const quantityItem = document.querySelectorAll(".info_product");
quantityItem.forEach((item) => {
    const priceElement1 = item.querySelector(".info_price");
    const originalPrice1 = parseInt(
        priceElement1.textContent.replace(/,/g, "")
    );
    const formattedPrice1 = originalPrice1
        .toLocaleString("vi-VN", {
            style: "currency",
            currency: "VND",
        })
        .replace(".", ",")
        .replace(".", ",");

    priceElement1.textContent = formattedPrice1;

    const priceElement2 = item.querySelector(".total");
    const originalPrice2 = parseInt(
        priceElement2.textContent.replace(/,/g, "")
    );
    const formattedPrice2 = originalPrice2
        .toLocaleString("vi-VN", {
            style: "currency",
            currency: "VND",
        })
        .replace(".", ",")
        .replace(".", ",");

    priceElement2.textContent = formattedPrice2;
});

const priceElement3 = document.querySelector(".total_all");
const originalPrice3 = parseInt(priceElement3.textContent.replace(/,/g, ""));
const formattedPrice3 = originalPrice3
    .toLocaleString("vi-VN", {
        style: "currency",
        currency: "VND",
    })
    .replace(".", ",")
    .replace(".", ",");

priceElement3.textContent = formattedPrice3;

// discount code
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
