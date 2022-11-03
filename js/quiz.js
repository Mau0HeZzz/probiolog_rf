$(function() {
	// Клик по 1 этапу
	$('.quiz-button-one-js').on('click', function (e) {
		e.preventDefault();
		if ($(this).hasClass('quiz-click')) {
			$(this).removeClass('quiz-click');
		} else {
			$(this).addClass('quiz-click');
		}
	});
	
	// Клик по 3 этапу
	$('.quiz-button-three-js').on('click', function (e) {
		e.preventDefault();
		$('.quiz-button-three-js').removeClass('quiz-click');
		$(this).addClass('quiz-click');
	});
});

//Переход по шагам и результат
function quizStep(step) {
	let nextStep = Number(step) + 1;
	if (step != 3) {
		// Переход по шагам
		if ($('.quiz-button-one-js').hasClass('quiz-click')) {
			// что-то выбрали
			$('.quiz__item_1 .quiz-down').removeClass('quiz-error');
			$('.container-progress').removeClass('container-progress-' + step);
			$('.container-progress').addClass('container-progress-' + nextStep);
			$('.quiz__item').addClass('quiz__item-hidden');
			$('.quiz__item_' + nextStep).removeClass('quiz__item-hidden');
			$('.quiz__item_3 .quiz-down').removeClass('quiz-error');
		} else {
			// ничего не выбрали
			$('.quiz__item_1 .quiz-down').addClass('quiz-error');
		}
	} else {
		// Показываем результат
		if ($('.quiz-button-three-js').hasClass('quiz-click')) {
			// что-то выбрали
			$('.container-progress').removeClass('container-progress-' + step);
			$('.container-progress').addClass('container-progress-' + nextStep);
			let stepTwo = $('.__range input[type=range]').val(); // результат 2-го шага
			let stepThree = $('.quiz__item_3 .quiz-click').attr('data-item'); //результат 3-го шага
			$('.quiz__result').addClass('quiz__result-hidden');
			$('.quiz__item').addClass('quiz__item-hidden');
			//Формулы для&nbsp;вывода нужного результата
			if ((stepTwo <= 7) && (stepThree == 'a')) {
				$('.quiz__result_1-js').removeClass('quiz__result-hidden');
			}
			if (((stepTwo >= 8) && (stepThree == 'a')) || (stepThree == 'b')) {
				$('.quiz__result_2-js').removeClass('quiz__result-hidden');
			}
			if (stepThree == 'c') {
				$('.quiz__result_3-js').removeClass('quiz__result-hidden');
			}
		} else {
			// ничего не выбрали
			$('.quiz__item_3 .quiz-down').addClass('quiz-error');
		}
	}
}

//Кнопка Назад
function quizPrev(step) {
	let nextStep = Number(step) - 1;
	$('.container-progress').removeClass('container-progress-' + step);
	$('.container-progress').addClass('container-progress-' + nextStep);
	$('.quiz__item').addClass('quiz__item-hidden');
	$('.quiz__item_' + nextStep).removeClass('quiz__item-hidden');
}