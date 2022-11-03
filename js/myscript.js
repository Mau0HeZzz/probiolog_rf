document.addEventListener('DOMContentLoaded', () => {
	
	let tabs = document.querySelectorAll("._tabs");
	for (let index = 0; index < tabs.length; index++) {
		let tab = tabs[index];
		let tabs_items = tab.querySelectorAll("._tabs-item");
		let tabs_blocks = tab.querySelectorAll("._tabs-block");
		for (let index = 0; index < tabs_items.length; index++) {
			let tabs_item = tabs_items[index];
			tabs_item.addEventListener("click", function (e) {
				for (let index = 0; index < tabs_items.length; index++) {
					let tabs_item = tabs_items[index];
					tabs_item.classList.remove('_active');
					tabs_blocks[index].classList.remove('_active');
				}
				tabs_item.classList.add('_active');
				tabs_blocks[index].classList.add('_active');
				e.preventDefault();
			});
		}
	} 
	
	let menuLink2 = document.querySelectorAll('.menu_link2'),
        dropdownMenu = document.querySelector('.dropdown-menu_item');

    menuLink2.forEach(item => {
        item.addEventListener('click', () => dropdownMenu.classList.toggle('dropdown-menu_item-active'));
        item.addEventListener('mouseenter', () => dropdownMenu.classList.add('dropdown-menu_item-active'));
        item.addEventListener('mouseleave', () => dropdownMenu.classList.remove('dropdown-menu_item-active'));
    });

    dropdownMenu.addEventListener('mouseenter', () => dropdownMenu.classList.add('dropdown-menu_item-active'));
    dropdownMenu.addEventListener('mouseleave', () => dropdownMenu.classList.remove('dropdown-menu_item-active'));

    if (window.location.pathname == '/probiolog/') {
        $('.dropdown-menu_item').css('background', '#3A8F33')
    }

    if (window.location.pathname == '/probiolog-forte/') {
        $('.dropdown-menu_item').css('background', '#A61A20')
    }

    if (window.location.pathname == '/probiolog-srk/') {
        $('.dropdown-menu_item').css('background', '#ECAA5B')
    }

    $('.hamburger_active').on('click', function () {
        $('.dropdown-menu_item').removeClass('dropdown-menu_item-active');
    });
})

function liknank(id) {
    let top = $(id).offset().top;

    $('body, html').animate({
        scrollTop: top
    }, 1500);
}

function liknankk(id) {
    let top = $(id).offset().top - 100;

    $('body, html').animate({
        scrollTop: top
    }, 1500);
}

$('.first__block-descr').on('click', function () {
    $('.first__block-descr-rec').toggleClass('first__block-descr-rec-active');
});

if ($('.menu_link').html() == 'Главная страница') {
    $('.menu_link').first().addClass('menu_link-mob');
}

if ($('.footer__wrapper-left').children().html() == 'Главная страница') {
    $('.footer__wrapper-left').children().first().addClass('menu_link-mob');
}

if ($('.footer__wrapper-left').children('a').html() == 'Главная страница') {
    $('.footer__wrapper-left').children('a').eq(1).attr("href", "/#products");
}

if (document.documentElement.clientWidth < 480) {
    $('.title__main-srk-s').html('Специальный пробиотик, разработанный <br> для&nbsp;хронических <br> расстройств ЖКТ<sup>2</sup>');
    $('.srk-p-formob').html('Наиболее частыми причинами СРК являются психоэмоциональные факторы: стресс, переутомление, недосып, а также нарушения питания. <br><br>Специалисты также отмечают, что до 33% людей после перенесенной кишечной инфекции страдают СРК<sup>3</sup>. <br><br>Эти причины ведут к нарушениям нормальной нервно-гормональной регуляции между центральной нервной системой и кишечником.');
    $('.srk-p-formob2').html('При подозрении на СРК необходимо обратиться к врачу гастроэнтерологу, который проведет комплексное обследование, даст рекомендации по питанию и образу жизни, а также назначит необходимое лечение. Нормализация образа жизни, разрешение стрессовых факторов, регулярность питания оказывают общий благоприятный эффект при СРК<sup>1</sup>. <br><br>Всемирная Гастроэнтерологическая Организация рекомендует при синдроме раздраженного кишечника принимать комбинацию штаммов бактерий ПробиоЛога<sup>®</sup>&nbsp;СРК, содержащих не менее 3 миллиардов КОЕ, то есть по 1 капсуле в день<sup>4</sup>. <br><br>Согласно инструкции по применению ПробиоЛога<sup>®</sup>&nbsp;СРК его пробиотические штаммы способны расщеплять поступающие с пищей пищевые волокна для&nbsp;получения большого количества короткоцепочечных жирных кислот, которые помогают нормализовать моторику кишечника и уменьшить висцеральную боль. <br><br>Входящие в состав ПробиоЛог<sup>®</sup>&nbsp;СРК штаммы бактерий также способны снижать воспаление слизистой кишечника, уменьшать диарею и улучшать качество жизни при регулярном приеме не менее 3-ех недель<sup>5</sup>. <br><br>Настоящая информация не является медицинской консультацией, не призывает к самолечению и не заменяет собой консультацию врача.');
    $('.title-formob').html('ПробиоЛог<sup>®</sup>. <br>Cхема применения');
    $('.title-formob2').html('Штаммы LA-5<sup>&#174;</sup> и BB-12<sup>&#174;</sup> ПробиоЛога<sup>®</sup>&nbsp;<br>у участников исследований в 2 раза уменьшили продолжительность диареи и в 3 раза уменьшили её тяжесть<sup>1</sup>');
    $('.title-formob3').html('Запатентованная технология микрокапсуляции <br>для&nbsp;максимальной выживаемости бактерий<sup>8</sup>');
    $('.title-formob4').html('ПробиоЛог<sup>®</sup>&nbsp;СРК улучшает качество жизни людей <br>с синдромом раздраженного кишечника<sup>2</sup>');
}

if (document.documentElement.clientWidth > 768) {
    $('.menu_link2').html('Линейка ПробиоЛог<sup>®</sup>');
    //$('.menu_foot2').html('Линейка ПробиоЛог<sup>®</sup>'); //wtf?!
}

if (document.documentElement.clientWidth > 1000) {
    $('.title-desc1').html('Причины возникновения дискомфорта <br>в кишечнике');
}

$('.label-pr').on('click', function () {
    if ($('#cb1').is(':checked'))
        alert('Пожалуйста, подтвердите согласие на обработку данных');
});

$('.label-pr2').on('click', function () {
    if ($('#agree').is(':checked'))
        alert('Пожалуйста, подтвердите согласие на обработку данных');
});

if (document.documentElement.clientWidth > 1228 && document.documentElement.clientWidth < 1600) {
    $('.feedback__descr-desc1').html('Если Вы хотите задать вопрос по продукции, направить предложения или пожелания, пожалуйста, отправьте их через <br>форму обратной связи.');
}

if (document.documentElement.clientWidth < 400) {
    $('.title-forte-mob').html('Двойная концентрация для&nbsp;интенсивного восстановления <br>в сложных ситуациях');
    $('.title-srk-mob').html('Действия <br>ПробиоЛога<sup>®</sup>&nbsp;СРК<sup>3</sup>');
}

//Ленивая загрузка pdf
setTimeout(function(){
    $('.lazy-pdf').each(function(){
        let url = $(this).attr('data-url');
        $(this).attr('href',url);
    });
},500);

