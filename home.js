const cardlike = document.querySelector(".container_info");
const arrowBtn = document.querySelectorAll(".info_item .arrow");
const firstCardWidth = cardlike.querySelector(".info_author").offsetWidth;

arrowBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        cardlike.scrollLeft +=
            btn.id === "prev" ? -firstCardWidth : firstCardWidth;
    });
});
