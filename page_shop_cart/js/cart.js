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

document.addEventListener("DOMContentLoaded", function() {
    checkIfCartIsEmpty();
});

const quantityItem = document.querySelectorAll(".info_product");

quantityItem.forEach((item) => {
    const minus = item.querySelector(".item-3 .minus");
    const num = item.querySelector(".item-3 .num");
    const plus = item.querySelector(".item-3 .plus");

    const priceElement = item.querySelector(".info_price");
    const originalPrice = parseInt(priceElement.textContent.replace(/,/g, ""));
    const totalElement = item.querySelector(".info_total .total");

    const curTotal = document.querySelector(".pay_total .total_all");

    const qt = parseInt(num.textContent);
    let quantity = qt;

    minus.addEventListener("click", () => {
        if (quantity > 1) {
            quantity--;
            num.innerText = quantity;
            updateTotal();
            updateTotalAll();
        }
    });
    plus.addEventListener("click", () => {
        quantity++;
        num.innerText = quantity;
        updateTotal();
        updateTotalAll();
    });

    function updateTotal() {
        const newTotal = originalPrice * quantity;
        totalElement.textContent = newTotal
            .toLocaleString("vi-VN")
            .replace(".", ",")
            .replace(".", ",");
    }

    function updateTotalAll() {
        let newTotalAll = 0;
        quantityItem.forEach((item) => {
            const priceElement = item.querySelector(".item-4 .total");
            const price = parseInt(priceElement.textContent.replace(/,/g, ""));
            newTotalAll += price;
        });
        curTotal.textContent = newTotalAll
            .toLocaleString("vi-VN")
            .replace(".", ",")
            .replace(".", ",");
    }
});

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

arrowBtn.forEach(btn => {
    btn.addEventListener("click", () => {
        cardlike.scrollLeft += btn.id === "prev" ? -firstCardWidth : firstCardWidth;
    })
});
