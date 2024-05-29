// Loader
window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");

    loader.classList.add("loader--hidden");

    loader.addEventListener("transitionend", () => {
        if (loader && loader.parentNode) {
            loader.parentNode.removeChild(loader);
        }
    });
});