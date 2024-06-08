const cardlike = document.querySelector(".container_info");
const arrowBtn = document.querySelectorAll(".info_item .arrow");
const firstCardWidth = cardlike.querySelector(".info_author").offsetWidth;

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