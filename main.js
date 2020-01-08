/*  Big button */
const scrollToBottomBtn = document.querySelector("#scrollToBottomBtn");
let offsets = document.getElementById('c3').getBoundingClientRect();
let contactx = offsets.top;



window.addEventListener("resize", function () {
    let offsets = document.getElementById('c3').getBoundingClientRect();
    contactx = offsets.top;
});

scrollToBottomBtn.addEventListener("click", function () {
    window.scrollTo( {
        top: contactx,
        left: 0,
        behavior: "smooth"

    });
});

