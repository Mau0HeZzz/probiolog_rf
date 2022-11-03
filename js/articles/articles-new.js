$(document).ready(function(){
	//Отправка формы на рассылку
	$('.podpis__form-btn-js').on('click', function(){
		err = 0;
		t1 = $('.podpis__form-input').val();
		if(t1 != ''){
			$('.podpis__form-input').removeClass('error-input');
		} else {
			$('.podpis__form-input').addClass('error-input');
			err = 1;
		}
		if($('#agree-1').is(':checked')){
			$('#agree-1').removeClass('error-agree');
		} else {
			$('#agree-1').addClass('error-agree');
			err = 1;
		}
		if(err == 0){
			var formData = new FormData();
			formData.append('email', $('.podpis__form-input').val());
			formData.append('page', location.href);
			$.ajax({
		        type: "POST",
		        url: "/bitrix/templates/probiolog/ajax/fos-podpis.php",
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: formData,
		        success: function(response){
		          	$('.info__item-podpis').html(response);
		        }
		    });  
		}
	});
	//Отправка комментария о статье
	$('.info__form-btn-js').on('click', function(){
		err = 0;
		t1 = $('.comments-name').val();
		t2 = $('.comments-text').val();
		id = $(this).attr('data-id');
		if(t1 != ''){
			$('.comments-name').removeClass('error-input');
		} else {
			$('.comments-name').addClass('error-input');
			err = 1;
		}
		if(t2 != ''){
			$('.comments-text').removeClass('error-input');
		} else {
			$('.comments-text').addClass('error-input');
			err = 1;
		}
		if(err == 0){
			var formData = new FormData();
			formData.append('name', $('.comments-name').val());
			formData.append('text', $('.comments-text').val());
			formData.append('id', id);
			$.ajax({
		        type: "POST",
		        url: "/bitrix/templates/probiolog/ajax/form-reviews-articles.php",
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: formData,
		        success: function(response){
		          	$('.info__form-comments-js').html(response);
		        }
		    });  
		}
	});
	//Клик по лайк и дизлайк
	$('.like-js').on('click', function(){
		$(this).addClass('like-active');
		$('.dis-like-js').removeClass('like-active');
	});
	$('.dis-like-js').on('click', function(){
		$(this).addClass('like-active');
		$('.like-js').removeClass('like-active');
	});

	//Клик по блоку Источники
	$(document).on('click', '.istochnik__click-js', function(){
		let dropIcon = $(this).children('.drop-icon'),
	    dropWrap = $(this).parent();

	  	$(this).next().slideToggle();

	  	dropIcon.text((dropIcon.text() == 'Свернуть') ? 'Развернуть' : 'Свернуть');
	  	dropIcon.toggleClass('act');
	  	dropWrap.toggleClass('drop-bg');
	});

	$('.section_box2_foto_slider').slick({
	    infinite: true,
	    slidesToShow: 4,
	    slidesToScroll: 1,
	    dots: true,
	    arrows: false,
	    dotsClass: 'section_box2_scrol',
	    responsive: [
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
	    ]
	});
	//Кнопка Загрузить еще
	$(document).on('click', '.articles__row-next-js', function(){
		$('.articles__row-item').removeClass('no-active');
		$(this).hide();
	});
});
