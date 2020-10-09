<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
 
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    
    $mail = new PHPMailer;
    $mail->isSMTP();

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    $mail->Host = 'smtp.escalaweb.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission

    $mail->Port = 587;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "teste@escalaweb.com.br";
    $mail->Password = "3sd54f";
    //Set who the message is to be sent from
    $mail->setFrom('teste@escalaweb.com.br', 'Escala');
    //Set an alternative reply-to address
    $mail->addReplyTo('teste@escalaweb.com.br', 'Escala');
    //Set who the message is to be sent to
    $mail->addAddress($email, $nome);
    //Copia não secreta e BCC para secreta
    $mail->addCC('teste@escalaweb.com.br');
    //Set the subject line
    $mail->Subject = 'Envio do contato'.$nome;
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents($msg));
    $mail->Body    = $msg;
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
?>