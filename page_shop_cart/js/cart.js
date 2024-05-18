var removeCartItem = document.getElementsByClassName("btn-rm");
console.log(removeCartItem);
for (var i = 0; i < removeCartItem.length; i++) {
    var button = removeCartItem[i];
    button.addEventListener("click", function (event) {
        var buttonClicked = event.target;
        buttonClicked.parentElement.parentElement.parentElement.parentElement.remove();
        checkIfCartIsEmpty();
    });
}
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
        "<div class='empty-cart-message' style='margin: 150px 0;'>Không còn sản phẩm nào trong giỏ hàng.</div>";
}

const quantityItem = document.querySelectorAll(".info_product");

quantityItem.forEach((item) => {
    const minus = item.querySelector(".item-3 .minus");
    const num = item.querySelector(".item-3 .num");
    const plus = item.querySelector(".item-3 .plus");

    const priceElement = item.querySelector(".item-4 .total");
    const originalPrice = parseInt(priceElement.textContent.replace(/,/g, ""));

    const curTotal = document.querySelector(".pay_total .total_all");

    let quantity = 1;

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
        priceElement.textContent = newTotal
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
