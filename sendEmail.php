<?php
    include 'includes/nav.php'
    ?>
    <?php
    // echo htmlspecialchars($_POST['name']);
    // echo "test";
    require_once('phpmailer/PHPMailerAutoload.php');

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];

        //Server settings
        $mail->SMTPDebug  = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.privateemail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ContactEmail';                 // SMTP username
        $mail->Password = 'supersecretpassword';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ContactEmail');
        $mail->addAddress('re-routeemail');
        $mail->addAddress($email);
        // $mail->addAddress('');     // Add a recipient



        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['message'];

        $mail->send();
        echo '<h2 class="emailSent">Page will redirect in 5 seconds. Email has been sent. You will recieve a copy in your email shortly.</h2>';
        header('refresh: 5; url=https://www.ericpatterson.me/contact');
        // header('Location: https://www.ericpatterson.me/contact');
        exit();
    } catch (Exception $e) {
        echo '<h1 class="emailSent">Message could not be sent.</h1>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    ?>
