<?php /* Template Name: Email */ ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';

// die(var_dump($_POST));

if(isset($_POST['applicant-email'], $_POST['path']) && PHPMailer::validateAddress($_POST['applicant-email'])) {
    $from = trim(filter_var($_POST['applicant-email'], FILTER_SANITIZE_EMAIL));
    $path = trim(filter_var($_POST['path'], FILTER_SANITIZE_STRING));
    $name = trim(filter_var($_POST['applicant-name'], FILTER_SANITIZE_STRING));
    // Adjust this! Should be a gmail address.
    $to = 'worldsurfintrigue@gmail.com';

    $mail = new PHPMailer;
    $mail->isSMTP();

        /* SMTP server address. */
    $mail->Host = 'smtp.gmail.com';

    /* Use SMTP authentication. */
    $mail->SMTPAuth = TRUE;

    /* Set the encryption system. */
    $mail->SMTPSecure = 'ssl';

    /* SMTP authentication username. */
    $mail->Username = 'kerschdominic';

    /* SMTP authentication password. */
    $mail->Password = 'Dker9586';

    /* Set the SMTP port. */
    $mail->Port = 465;

    // $mail->Host = 'smtp.gmail.com';
    // $mail->Port = 25;
    $mail->CharSet = PHPMailer::CHARSET_UTF8;

    //It's important not to use the submitter's address as the from address as it's forgery,
    //which will cause your messages to fail SPF checks.
    //Use an address in your own domain as the from address, put the submitter's address in a reply-to


    if(isset($_POST['venue'])) {
        $mail->setFrom($from, (empty($name) ? 'Venue booking' : $name));
        $mail->addAddress($to);

        $venue = trim(filter_var($_POST['venue'], FILTER_SANITIZE_STRING));
        $phone = trim(filter_var($_POST['phone-number'], FILTER_SANITIZE_STRING));
        $event = trim(filter_var($_POST['event-name'], FILTER_SANITIZE_STRING));
        $numberOrganisers = trim(filter_var($_POST['number-organisers'], FILTER_SANITIZE_STRING));
        $date = trim(filter_var($_POST['hire-date'], FILTER_SANITIZE_STRING));
        $time = trim(filter_var($_POST['hire-time'], FILTER_SANITIZE_STRING));
        $category = trim(filter_var($_POST['category'], FILTER_SANITIZE_STRING));
        if(isset($_POST['about-event'])) {
            $about = trim(filter_var($_POST['about-event'], FILTER_SANITIZE_STRING));
        } else {
            $about = "";
        }
        $subject = 'Expression of interest: ' . $venue;
        $message = "$name / $from  / $phone\nis interested in hosting '$event' ($category)\nat $time on $date with the assistance of $numberOrganisers organisers.\nAdditional info: $about";
        $mail->Subject = $subject;
        $mail->Body = $message;

    }

    if(isset($_POST['group-number'])) {

    }

    if($_POST['path']=="/") {
        $mail->setFrom($from, (empty($name) ? 'Join the mailing list' : $name));
        $mail->addAddress($to);

        $subject = 'Join the mailing list: ' . $from;
        $message = "$from has submitted a request to be added to the Gathenhielmska mailing list.";
        $mail->Subject = $subject;
        $mail->Body = $message;

    }

    if (!$mail->send()) {
        $msg .= 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        $msg .= 'Message sent!';
    }


}

redirect($path);
