window.addEventListener('DOMContentLoaded', () => {
    'use strict';

    let acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            let panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
                this.classList.remove('accordion-active');
                this.querySelector('.accordion__right').textContent = 'Развернуть';
            } else {
                panel.style.display = "block";
                this.classList.add('accordion-active');
                this.querySelector('.accordion__right').textContent = 'Свернуть';
            }
        });
    }

    //гамбургер
    const menu = document.querySelector('.menu'),
        menuItem = document.querySelectorAll('.menu-link'),
        hamburger = document.querySelector('.hamburger');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('hamburger_active');
        menu.classList.toggle('menu_active');
        $('.dropdown-menu_item').removeClass('dropdown-menu_item-active');
    });

    menuItem.forEach(item => {
        item.addEventListener('click', () => {
            hamburger.classList.toggle('hamburger_active');
            menu.classList.toggle('menu_active');
            $('.dropdown-menu_item').removeClass('dropdown-menu_item-active');
        })
    });

    // slider main page
    const sliders = (slides, dir, prev, next)=> {
        let slideIndex = 1,
            paused = false;

        const items = document.querySelectorAll(slides);

        function showSlides(n) {
            if (n > items.length) {
                slideIndex = 1;
            }

            if (n < 1) {
                slideIndex = items.length;
            }

            items.forEach(item => {
                item.classList.add('animated');
                item.style.display = 'none';
            });

            items[slideIndex - 1].style.display = 'block';

            setTimeout(bLazy.revalidate, 300);
        }

        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        try {
            const prevBtn = document.querySelector(prev),
                nextBtn = document.querySelector(next);

            prevBtn.addEventListener('click', () => {
                plusSlides(-1);
                items[slideIndex - 1].classList.remove('fadeIn');
                items[slideIndex - 1].classList.add('fadeIn');
            });

            nextBtn.addEventListener('click', () => {
                plusSlides(1);
                items[slideIndex - 1].classList.remove('fadeIn');
                items[slideIndex - 1].classList.add('fadeIn');
            });

        } catch(e) {

        }

        // function activateAnimation() {
        //     if (dir === 'vertical') {
        //         paused = setInterval(function() {
        //             plusSlides(1);
        //             items[slideIndex - 1].classList.add('fadeIn');
        //         }, 6000);
        //     } else {
        //         paused = setInterval(function() {
        //             plusSlides(1);
        //             items[slideIndex - 1].classList.remove('fadeIn');
        //             items[slideIndex - 1].classList.add('fadeIn');
        //         }, 6000);

        //     }
        // }
        // activateAnimation();


        // items[0].parentNode.addEventListener('mouseenter', () => {
        //     clearInterval(paused);
        // });

        // items[0].parentNode.addEventListener('mouseleave', () => {
        //     activateAnimation();
        // });
    };

    if (document.querySelectorAll('.slider-item').length) {
        sliders('.slider-item', 'horizontal', '.main-prev-btn', '.main-next-btn');
    }

    //quiz line with smile
    document.querySelectorAll(".__range-step").forEach(function(ctrl) {
        var el = ctrl.querySelector('input');
        var output = ctrl.querySelector('output');
        var newPoint, newPlace, offset;
        el.oninput =function(){
            // colorize step options
            ctrl.querySelectorAll("option").forEach(function(opt) {
                if(opt.value<=el.valueAsNumber) {
                    opt.style.backgroundColor = 'green';
                    opt.classList.add("stepout");
                }	else {
                    opt.style.backgroundColor = '#aaa';
                    opt.classList.remove("stepout");
                }
            });
            // colorize before and after
            var valPercent = (el.valueAsNumber  - parseInt(el.min)) / (parseInt(el.max) - parseInt(el.min));
            var style = 'background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+
            valPercent+', green), color-stop('+
            valPercent+', #aaa));';
            el.style = style;

            // Popup
            if ((' ' + ctrl.className + ' ').indexOf(' ' + '__range-step-popup' + ' ') > -1) {
                var selectedOpt=ctrl.querySelector('option[value="'+el.value+'"]');
                output.innerText= selectedOpt.text;
                output.style.left = "50%";
                output.style.left = ((selectedOpt.offsetLeft + selectedOpt.offsetWidth/2) - output.offsetWidth/2) + 'px';
            }
        };
        el.oninput();
    });

    window.onresize = function(){
        document.querySelectorAll(".__range").forEach(function(ctrl) {
            var el = ctrl.querySelector('input');
            el.oninput();
        });
    };

    //header change background onscroll
    let desktop = document.querySelector('.desctop-menu');

    if (desktop) {
        let isMobile = false;
        let scrolled;

        window.onscroll = function () {
            if (window.innerWidth <= 575) {
                isMobile = true;
            }

            // for mobile
            if (isMobile) {
                desktop.style.background = "linear-gradient(90.26deg, #FC5A2C 31.39%, #E6BD5D 99.86%)";
                return;
            }

            // for other device
            if (!isMobile) {
                scrolled = window.pageYOffset || document.documentElement.scrollTop;

                desktop.style.background = (30 < scrolled) ? "linear-gradient(90.26deg, #FC5A2C 31.39%, #E6BD5D 99.86%)" : "none";
            }
        }
    }
});

window.onload = () => {
    // Ленивая загрузка ссылок (ибо серанкинг выдает ошибки на некоторые аптеки/отзывы)
    const lazyUrl = document.querySelectorAll('.js-lazy-url');

    lazyUrl.forEach(item => {
        if (item.getAttribute('data-href')) {
            item.setAttribute('href', item.getAttribute('data-href'));
            item.removeAttribute('data-href');
        }
    })
}

// jquery
//tabs to instruction and download instruction link
$(document).ready(function(){
    $('ul.catalog__tabs').on('click', 'li:not(.catalog__tab_active)', function() {
        $(this)
          .addClass('catalog__tab_active').siblings().removeClass('catalog__tab_active')
          .closest('div.container').find('a.catalog__load').removeClass('catalog__load_active').eq($(this).index()).addClass('catalog__load_active')
          .closest('div.container').find('div.catalog__content').removeClass('catalog__content_active').eq($(this).index()).addClass('catalog__content_active');
      });

    // phone validate
    $('input[name=phone]').mask("+7 (999) 999-9999");

    // pageup
    $(window).scroll(function(){
        if ($(this).scrollTop() > 600) {
            $('.pageup').fadeIn();
        } else {
            $('.pageup').fadeOut();
        }
    });
    
    $("a[href^='#up']").click(function(){
        const _href = $(this).attr("href");
        $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
        return false;
    });

    // Modal
    $('[data-modal=consultation]').on('click', function() {
        $('.overlay, #consultation').fadeIn();
    });
    $('.modal__close').on('click', function() {
        $('.overlay, #consultation, #thanks').fadeOut('slow');
    });
});
$(document).ready(function(){
  if (document.querySelector('.fact-slider')) {
    $('.fact-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        prevArrow: $('.fact__info-nav-prev-js'),
        nextArrow: $('.fact__info-nav-next-js'),
        appendDots: $('.fact__dots'),
        /*responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
        ]*/
    });
    $('.fact-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){

        $('.fact__dots li').removeClass('slick-active');
        $('.fact__dots ul').each(function(){
            $(this).find('li').eq(currentSlide).addClass('slick-active');
        });
        
        console.log('number='+currentSlide);
    });
  }
});
$('.aptsale__row-close').on('click',function(){
    $('.aptsale').hide();
});