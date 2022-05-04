<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$fio = $_POST['fio'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$organization = $_POST['organization'];
$city = $_POST['city'];
$jobTitle = $_POST['jobTitle'];
$academicDegree = $_POST['academicDegree'];
$typeParticipation = $_POST['typeParticipation'];
$articleTitleRU = $_POST['articleTitleRU'];
$articleTitleEN = $_POST['articleTitleEN'];
$authorInformationRU = $_POST['authorInformationRU'];
$authorInformationEN = $_POST['authorInformationEN'];
$organizationCityAuthorsRU = $_POST['organizationCityAuthorsRU'];
$organizationCityAuthorsEN = $_POST['organizationCityAuthorsEN'];
$hotel = $_POST['hotel'];
$bookingDate = $_POST['bookingDate'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'freme.info@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'ZsqUNMYYmrhFTQvjzyzJ'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('freme.info@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('freme.2022@mail.ru');     // Кому будет уходить письмо 
$mail->addAttachment($_FILES['article']['tmp_name'], $_FILES['article']['name']);
$mail->addAttachment($_FILES['annotation']['tmp_name'], $_FILES['annotation']['name']); 
$mail->addAttachment($_FILES['expertise']['tmp_name'], $_FILES['expertise']['name']);
$mail->addAttachment($_FILES['check']['tmp_name'], $_FILES['check']['name']);     // Optional name
$mail->isHTML(true);                                    // Set email format to HTML

$mail->Subject = 'Заявка с сайта Freme от '.$fio;
$mail->Body    = '
<h2>Новый участник конференции</h2><br>
<b>АВТОР УЧАСТНИК (ФИО):</b> '.$fio.'<br>
<b>АДРЕС ЭЛЕКТРОННОЙ ПОЧТЫ:</b> '.$email.'<br>
<b>ТЕЛЕФОН:</b> '.$tel.'<br>
<b>ОРГАНИЗАЦИЯ:</b> '.$organization.'<br>
<b>ГОРОД:</b> '.$city.'<br>
<b>ДОЛЖНОСТЬ:</b> '.$jobTitle.'<br>
<b>УЧЁНАЯ СТЕПЕНЬ/ЗВАНИЕ:</b> '.$academicDegree.'<br>
<b>НАЗВАНИЕ СТАТЬИ(RU):</b> '.$articleTitleRU.'<br>
<b>НАЗВАНИЕ СТАТЬИ(EN):</b> '.$articleTitleEN.'<br>
<b>ИНФОРМАЦИЯ ОБ АВТОРАХ(RU):</b> '.$authorInformationRU.'<br>
<b>ИНФОРМАЦИЯ ОБ АВТОРАХ(EN):</b> '.$authorInformationEN.'<br>
<b>ОРГАНИЗАЦИЯ/ГОРОД АВТОРОВ(RU):</b> '.$organizationCityAuthorsRU.'<br>
<b>ОРГАНИЗАЦИЯ/ГОРОД АВТОРОВ(EN):</b> '.$organizationCityAuthorsEN.'<br>
<b>ВИД УЧАСТИЯ:</b> '.$typeParticipation.'<br>
<b>Нужна ли гостиница:</b> '.$hotel.'<br>
<b>Даты бронирование гостиницы:</b> '.$bookingDate.'<br>
';

$mail->AltBody = '';

if(!$mail->send()) {
    header('location: popup.html');
    echo 'Error';
} else {
    header('location: sent.html');
}
?>
