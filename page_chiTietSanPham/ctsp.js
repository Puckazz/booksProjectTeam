document.addEventListener("DOMContentLoaded", function () {
    const minus = document.querySelector(".qt .minus");
    const num = document.querySelector(".qt .num");
    const plus = document.querySelector(".qt .plus");
    const qtInput = document.getElementById("qtInput");

    let quantity = parseInt(qtInput.value);

    minus.addEventListener("click", () => {
        if (quantity > 1) {
            quantity--;
            num.textContent = quantity;
            qtInput.value = quantity;
        }
    });
    plus.addEventListener("click", () => {
        quantity++;
        num.textContent = quantity;
        qtInput.value = quantity;
    });
});

// format price in detail book
function formatPrice(str) {
    const priceElement = document.querySelector(str);
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

formatPrice(".first-price");
formatPrice(".final-price");

// hide discount if it not discount
const sale = document.querySelector(".discount");
const buyPrice = document.querySelector(".first-price");
const salePrice = document.querySelector(".final-price");
const saleInt = parseInt(sale.textContent.replace(/-|%/g, ""));
if (saleInt < 1) {
    sale.style.display = "none";
    buyPrice.style.display = "none";
    salePrice.style.margin = "0";
    salePrice.style.color = "black";
}

// message
const mes = document.getElementById("message_box");
mes.style.transform = "translateX(-15px)";
setTimeout(function () {
    mes.style.transform = "translateX(370px)";
}, 3500);