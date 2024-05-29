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