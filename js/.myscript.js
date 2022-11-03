$('.menu_link2').on('click', function () {
    $('.dropdown-menu_item').toggleClass('dropdown-menu_item-active');
});

$('.menu_link2').on('mouseenter', function () {
    $('.dropdown-menu_item').addClass('dropdown-menu_item-active');
});

$('.menu_link2').on('mouseleave', function () {
    $('.dropdown-menu_item').removeClass('dropdown-menu_item-active');
});

$('.dropdown-menu_item').on('mouseenter', function () {
    $('.dropdown-menu_item').addClass('dropdown-menu_item-active');
});

$('.dropdown-menu_item').on('mouseleave', function () {
    $('.dropdown-menu_item').removeClass('dropdown-menu_item-active');
});

let menu_link2 = document.querySelectorAll('.menu_link2');

if (window.location.pathname == '/probiolog/'){
    $('.dropdown-menu_item').css('background', '#3A8F33')
};

if (window.location.pathname == '/probiolog-forte/'){
    $('.dropdown-menu_item').css('background', '#A61A20')
};

if (window.location.pathname == '/probiolog-srk/'){
    $('.dropdown-menu_item').css('background', '#ECAA5B')
};

$('.hamburger_active').on('click', function () {
    $('.dropdown-menu_item').removeClass('dropdown-menu_item-active');
});

function liknank(id) {
    var top = $(id).offset().top;
    $('body,html').animate({
        scrollTop: top
    }, 1500);
}

function liknankk(id) {
    var top = $(id).offset().top - 100;
    $('body,html').animate({
        scrollTop: top
    }, 1500);
}

$('.first__block-descr').on('click', function () {
    $('.first__block-descr-rec').toggleClass('first__block-descr-rec-active');
});

if (document.documentElement.clientWidth > 450) {
    $('.buy__itemm-new').on('mouseenter', function () {
        $(this).children('.buy-mini-items').addClass('buy-mini-items-active');
        $(this).children('.buy__img').addClass('buy__img-deactive');
    });

    $('.buy__itemm-new').on('mouseleave', function () {
        $(this).children('.buy-mini-items').removeClass('buy-mini-items-active');
        $(this).children('.buy__img').removeClass('buy__img-deactive');
    });
}

function bin1() {
    $('.bin1').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin1').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin1c, 5000);
};

function bin1c() {
    $('.bin1').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin1').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin1').on('click', function () {
        setTimeout(bin1, 100);
    });
}



function bin2() {
    $('.bin2').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin2').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin2c, 5000);
};

function bin2c() {
    $('.bin2').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin2').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin2').on('click', function () {
        setTimeout(bin2, 100);
    });
}



function bin3() {
    $('.bin3').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin3').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin3c, 5000);
};

function bin3c() {
    $('.bin3').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin3').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin3').on('click', function () {
        setTimeout(bin3, 100);
    });
}



function bin4() {
    $('.bin4').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin4').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin4c, 5000);
};

function bin4c() {
    $('.bin4').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin4').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin4').on('click', function () {
        setTimeout(bin4, 100);
    });
}




function bin5() {
    $('.bin5').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin5').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin5c, 5000);
};

function bin5c() {
    $('.bin5').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin5').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin5').on('click', function () {
        setTimeout(bin5, 100);
    });
}



function bin6() {
    $('.bin6').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin6').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin6c, 5000);
};

function bin6c() {
    $('.bin6').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin6').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin6').on('click', function () {
        setTimeout(bin6, 100);
    });
}




function bin7() {
    $('.bin7').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin7').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin7c, 5000);
};

function bin7c() {
    $('.bin7').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin7').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin7').on('click', function () {
        setTimeout(bin7, 100);
    });
}



function bin8() {
    $('.bin8').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin8').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin8c, 5000);
};

function bin8c() {
    $('.bin8').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin8').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin8').on('click', function () {
        setTimeout(bin8, 100);
    });
}



function bin9() {
    $('.bin9').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin9').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin9c, 5000);
};

function bin9c() {
    $('.bin9').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin9').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin9').on('click', function () {
        setTimeout(bin9, 100);
    });
}



function bin10() {
    $('.bin10').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin10').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin10c, 5000);
};

function bin10c() {
    $('.bin10').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin10').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin10').on('click', function () {
        setTimeout(bin10, 100);
    });
}



function bin11() {
    $('.bin11').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin11').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin11c, 5000);
};

function bin11c() {
    $('.bin11').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin11').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin11').on('click', function () {
        setTimeout(bin11, 100);
    });
}



function bin12() {
    $('.bin12').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin12').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin12c, 5000);
};

function bin12c() {
    $('.bin12').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin12').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin12').on('click', function () {
        setTimeout(bin12, 100);
    });
}



function bin13() {
    $('.bin13').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin13').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin13c, 5000);
};

function bin13c() {
    $('.bin13').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin13').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin13').on('click', function () {
        setTimeout(bin13, 100);
    });
}



function bin14() {
    $('.bin14').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin14').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin14c, 5000);
};

function bin14c() {
    $('.bin14').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin14').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin14').on('click', function () {
        setTimeout(bin14, 100);
    });
}


function bin15() {
    $('.bin15').children('.buy-mini-items').addClass('buy-mini-items-active');
    $('.bin15').children('.buy__img').addClass('buy__img-deactive');
    setTimeout(bin15c, 5000);
};

function bin15c() {
    $('.bin15').children('.buy-mini-items').removeClass('buy-mini-items-active');
    $('.bin15').children('.buy__img').removeClass('buy__img-deactive');
};


if(document.documentElement.clientWidth < 450) {
    $('.bin15').on('click', function () {
        setTimeout(bin15, 100);
    });
}



if ( $('.menu_link').html() == 'Главная страница' ) {
    $('.menu_link').first().addClass('menu_link-mob');
};

if ( $('.footer__wrapper-left').children().html() == 'Главная страница' ) {
    $('.footer__wrapper-left').children().first().addClass('menu_link-mob');
};

if ( $('.footer__wrapper-left').children('a').html() == 'Главная страница' ) {
    console.log('123');
    $('.footer__wrapper-left').children('a').eq( 1 ).attr("href", "/#products");
};


if(document.documentElement.clientWidth < 480) {
    $('.title__main-srk-s').html('Специальный пробиотик, разработанный <br> для&nbsp;хронических <br> расстройств ЖКТ<sup>2</sup>');
    $('.srk-p-formob').html('Наиболее частыми причинами СРК являются психоэмоциональные факторы: стресс, переутомление, недосып, а также нарушения питания. <br><br>Специалисты также отмечают, что до 33% людей после перенесенной кишечной инфекции страдают СРК<sup>3</sup>. <br><br>Эти причины ведут к нарушениям нормальной нервно-гормональной регуляции между центральной нервной системой и кишечником.');
    $('.srk-p-formob2').html('При подозрении на СРК необходимо обратиться к врачу гастроэнтерологу, который проведет комплексное обследование, даст рекомендации по питанию и образу жизни, а также назначит необходимое лечение. Нормализация образа жизни, разрешение стрессовых факторов, регулярность питания оказывают общий благоприятный эффект при СРК<sup>1</sup>. <br><br>Всемирная Гастроэнтерологическая Организация рекомендует при синдроме раздраженного кишечника принимать комбинацию штаммов бактерий ПробиоЛога<sup>®</sup> СРК, содержащих не менее 3 миллиардов КОЕ, то есть по 1 капсуле в день<sup>4</sup>. <br><br>Согласно инструкции по применению ПробиоЛога<sup>®</sup> СРК его пробиотические штаммы способны расщеплять поступающие с пищей пищевые волокна для&nbsp;получения большого количества короткоцепочечных жирных кислот, которые помогают нормализовать моторику кишечника и уменьшить висцеральную боль. <br><br>Входящие в состав ПробиоЛог<sup>®</sup> СРК штаммы бактерий также способны снижать воспаление слизистой кишечника, уменьшать диарею и улучшать качество жизни при регулярном приеме не менее 3-ех недель<sup>5</sup>. <br><br>Настоящая информация не является медицинской консультацией, не призывает к самолечению и не заменяет собой консультацию врача.');
    $('.title-formob').html('ПробиоЛог<sup>®</sup>. <br>Cхема применения');
    $('.title-formob2').html('Штаммы LA-5<sup>&#174;</sup> и BB-12<sup>&#174;</sup> ПробиоЛога<sup>®</sup> <br>у участников исследований в 2 раза уменьшили продолжительность диареи и в 3 раза уменьшили её тяжесть<sup>1</sup>');
    $('.title-formob3').html('Запатентованная технология микрокапсуляции <br>для&nbsp;максимальной выживаемости бактерий<sup>8</sup>');
    $('.title-formob4').html('ПробиоЛог<sup>®</sup> СРК улучшает качество жизни людей <br>с синдромом раздраженного кишечника<sup>2</sup>');
};

if(document.documentElement.clientWidth > 768){
    $('.menu_link2').html('Линейка ПробиоЛог<sup>®</sup>');
    $('.menu_foot2').html('Линейка ПробиоЛог<sup>®</sup>');
};


if(document.documentElement.clientWidth > 1000){
    $('.title-desc1').html('Причины возникновения дискомфорта <br>в кишечнике');
}


$('.label-pr').on('click', function(){
    if ($('#cb1').is(':checked')){
        alert('Пожалуйста, подтвердите согласие на обработку данных');
    } else {

    }
});

$('.label-pr2').on('click', function(){
    if ($('#agree').is(':checked')){
        alert('Пожалуйста, подтвердите согласие на обработку данных');
    } else {

    }
});

if(document.documentElement.clientWidth > 1228 && document.documentElement.clientWidth < 1600){
    $('.feedback__descr-desc1').html('Если Вы хотите задать вопрос по продукции, направить предложения или пожелания, пожалуйста, отправьте их через <br>форму обратной связи.');
}

if(document.documentElement.clientWidth < 400) {
    $('.title-forte-mob').html('Двойная концентрация для&nbsp;интенсивного восстановления <br>в сложных ситуациях');
    $('.title-srk-mob').html('Действия <br>ПробиоЛога<sup>®</sup> СРК<sup>3</sup>');
}