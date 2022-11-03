
"use strict";

function initSliders() {
    if (document.querySelector(".slider-mauohezBlocks__slider")) new Swiper(".slider-mauohezBlocks__slider", {
        observer: true,
        observeParents: true,
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 800,
        loop: true,
        navigation: {
            prevEl: ".slider-mauohezBlocks__arrow.swiper-button-prev",
            nextEl: ".slider-mauohezBlocks__arrow.swiper-button-next"
        },
        breakpoints: {
            320: {
                autoHeight: true
            },
            768: {
                autoHeight: false
            }
        },
        on: {}
    });
}
window.addEventListener("load", (function(e) {
    initSliders();
}));
window["FLS"] = false;