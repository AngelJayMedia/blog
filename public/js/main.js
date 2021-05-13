let scrollpos = window.scrollY;
const header = document.getElementById("header");
const navcontent = document.getElementById("nav-content");
const brandname = document.getElementById("brandname");
const toToggle = document.querySelectorAll(".toggleColour");

document.addEventListener("scroll", function () {
/*Apply classes for slide in bar*/
scrollpos = window.scrollY;

if (scrollpos > 10) {
    header.classList.add("bg-white");

    //Use to switch toggleColour colours
    for (let i = 0; i < toToggle.length; i++) {
    toToggle[i].classList.add("text-gray-800");
    toToggle[i].classList.remove("text-white");
    }
    header.classList.add("shadow");
    navcontent.classList.remove("bg-gray-100");
    navcontent.classList.add("bg-white");
} else {
    header.classList.remove("bg-white");
    //Use to switch toggleColour colours
    for (let i = 0; i < toToggle.length; i++) {
    toToggle[i].classList.add("text-white");
    toToggle[i].classList.remove("text-gray-800");
    }

    header.classList.remove("shadow");
    navcontent.classList.remove("bg-white");
    navcontent.classList.add("bg-gray-100");
}
});
