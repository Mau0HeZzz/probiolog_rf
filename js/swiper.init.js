document.addEventListener('DOMContentLoaded', () => {
    const reviewsSlider = new Swiper('.reviews-slider', {
        slidesPerView: 1,
        autoHeight: true,
        spaceBetween: 60,
        pagination: {
            el: '.reviews-bottom__pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.reviews-bottom__next',
            prevEl: '.reviews-bottom__prev',
        },
        breakpoints: {
            577: {
                slidesPerView: 'auto',
                autoHeight: false,
            },
        }
    });
})