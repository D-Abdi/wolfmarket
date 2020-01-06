/*  Big button */
const scrollToBottomBtn = document.querySelector("#scrollToBottomBtn");

scrollToBottomBtn.addEventListener("click", function () {
    window.scrollTo( {
        top: 1550,
        left: 0,
        behavior: "smooth"

    });
});
