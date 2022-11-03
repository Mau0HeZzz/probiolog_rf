<?
	$to = "dmitris-94@mail.ru";
	/*$to = 'chophytol@mayoly.ru';
	$to2 = 'restart.leads@yandex.ru';*/

	$subject = 'Подписались на рассылку статей';
	$message = '';

	// Добавляем в сообщение заполненные поля
	if ($_POST['email']) {
		$message .= '<b>E-mail: </b>'.$_POST['email'].'<br>';
	}
	if ($_POST['page']) {
		$message .= '<b>Страница, с которой написали: </b>'.$_POST['page'].'<br>';
	}

	if (($_POST['email'] !='' ) and ($_POST['email'] != ' ')) {
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From:from@probiolog.ru <from@probiolog.ru>\r\n";
		$headers .= "Reply-To: from@probiolog.ru\r\n";

		mail($to, $subject, $message, $headers, '-f from@probiolog.ru');

		echo '<div class="info__item-mess">Спасибо, ваше сообщение принято.</div>';
		
		
	}
?>