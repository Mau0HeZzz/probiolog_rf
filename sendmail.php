
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '/home/m/mayoly/mayoly.beget.tech/public_html/bitrix/templates/probiolog/phpmailer/src/Exception.php';
    require '/home/m/mayoly/mayoly.beget.tech/public_html/bitrix/templates/probiolog/phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', '/home/m/mayoly/mayoly.beget.tech/public_html/bitrix/templates/probiolog/phpmailer/language');
    $mail->IsHTML(true);

//от кого
$mail->setFrom('phv@mayoly-spindler.ru', 'Сайт ПробиоЛог<sup>®</sup>');

// кому отправить
$mail->addAddress('probiolog@mayoly.ru');
$mail->addAddress('restart.leads@yandex.ru');

//тема письма
$mail->Subject = 'Обратная связь с сайта ПробиоЛог<sup>®</sup>';

//тело письма
$body = '<h1>Входящее письмо</h1>';

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}

if(trim(!empty($_POST['phone']))){
    $body.='<p><strong>Телефон:</strong> ' .$_POST['phone'].'</p>';
}

if(trim(!empty($_POST['email']))){
    $body.='<p><strong>E-mail:</strong> ' .$_POST['email'].'</p>';
}

if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Сообщение:</strong> ' .$_POST['message'].'</p>';
}

$mail->Body = $body;


//отправляем
if (!$mail->send()) {
    $message = 'Ошибка';
}else{
    $message = 'Сообщение отправлено!';
}
$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>

