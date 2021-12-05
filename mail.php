<?php

if(isset($_POST['contact-email']) && !empty($_POST['contact-email'])) {

$name = addslashes($_POST['contact-name']);
$email = addslashes($_POST['contact-email']);
$company = addslashes($_POST['contact-wpp']);
$message = addslashes($_POST['contact-message']);
if ($name == "") {
    $msg['err'] = "\n Digite um Nome!";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "\n Digite um E-mail";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if ($company == "") {
    $msg['err'] = "\n Digite seu Whatsapp";
    $msg['field'] = "contact-company";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n Digite um e-mail válido";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "\n Digite algum serviço";
    $msg['field'] = "contact-message";
    $msg['code'] = FALSE;
} else {
    $to = 'igornevesmoc@gmail.com';
    $subject = 'Formulário Site';
    $body = "Nome: ".$name. "\n"
            "E-mail: ".$email. "\n"
            "Whatsapp: ".$company. "\n"
            "Mensagem: ".$message. "\n"
    $header = "From:"        
    $_message = '<html><head></head><body>';
    $_message .= '<p>Name: ' . $name . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Company: ' . $company . '</p>';
    $_message .= '<p>Message: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:  Yuppy <igornevesmoc@gmail.com>' . "\r\n";
    $headers .= 'cc: igornevesmoc@gmail.com' . "\r\n";
    $headers .= 'bcc: igornevesmoc@gmail.com' . "\r\n";
    mail($to, $subject, $_message, $headers, '-f igornevesmoc@gmail.com');

    $msg['success'] = "\n Email has been sent successfully.";
    $msg['code'] = TRUE;
}
}
echo json_encode($msg);

?>