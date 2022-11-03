function get_cookie(cookie_name) {
    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

    if (results)
        return (unescape(results[2]));
    else
        return null;
}

document.addEventListener('DOMContentLoaded', () => {
    let hidePromoBanner = get_cookie('promobanner');
    const promoBanner = document.querySelector('.js-event-promo'),
        buttonClosePromoBanner = document.querySelector('.js-event-promo__close');

    // if (hidePromoBanner !== '1') {
    if (promoBanner) {
        setTimeout(() => {
            promoBanner.classList.add('show');
        }, 1000)
    }

    if (buttonClosePromoBanner) {
        buttonClosePromoBanner.addEventListener('click', () => {
            promoBanner.style.display = 'none';
            document.cookie = "promobanner=1; path=/; max-age=604800";
        })
    }
})