<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    require_once('phpmailer/PHPMailerAutoload.php');

    // if (isset($_POST['name']) && ($_POST['email'])) {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['message'];



        $mail = new PHPMailer();

        $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        $mail->Host = "mail.privateemail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'YourEmailRouter';
        $mail->Password = 'SuperSecretPassword';

        //email settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("YourEmailRouter");
        // $mail->$subject = ("$email ($subject)");
        $mail->$subject = $subject;
        $mail->Body = $body;
        $mail->Send();
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        // exit(json_encode(array("status" => $status, "response" => $response)));

    }

    ?>

</body>

</html>