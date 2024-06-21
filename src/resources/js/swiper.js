import Swiper from "swiper/bundle";
import "swiper/css/bundle";

const swiper = new Swiper(".product-slider__thumbnail", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});

const swiper2 = new Swiper(".product-slider", {
    loop: true,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

const swiperMv = new Swiper(".swiper__mv", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
});
