<?php /* Template Name: Email */ ?>

<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';

// die(var_dump($_POST));
$_SESSION['errors'] = [];
$_SESSION['successes'] = [];

if(isset($_POST['applicant-email'], $_POST['path'])) {
    $from = trim(filter_var($_POST['applicant-email'], FILTER_SANITIZE_EMAIL));
    $path = trim(filter_var($_POST['path'], FILTER_SANITIZE_STRING));
    if(!$from || PHPMailer::validateAddress($_POST['applicant-email']) === false) {
        $_SESSION['errors'][] = 'Please use a valid email address.';
        redirect($path);
    }
    $name = trim(filter_var($_POST['applicant-name'], FILTER_SANITIZE_STRING));
    // Adjust this! Should be a gmail address all emails arrive to.
    $to = '';

    $mail = new PHPMailer;
    $mail->isSMTP();
    /* SMTP server address. This should be changed if a different domain to gmail is being used. */
    $mail->Host = 'smtp.gmail.com';
    /* Use SMTP authentication. */
    $mail->SMTPAuth = TRUE;
    /* Set the encryption system. */
    $mail->SMTPSecure = 'ssl';
    /* SMTP authentication username. eg. use "gathhuset" if the email address is gathhuset@gmail.com */
    $mail->Username = '';
    /* SMTP authentication password. The email above's password. */
    $mail->Password = '';
    /* Set the SMTP port. */
    $mail->Port = 465;
    $mail->CharSet = PHPMailer::CHARSET_UTF8;

    // If a venue is hired
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

        // Attach the uploaded file.
        if(isset($_FILES['event-picture'])) {
            $eventPicture = $_FILES['event-picture'];
            if (!in_array($eventPicture['type'], ['image/jpeg', 'image/png'])) {
                $_SESSION['errors'][] = 'The uploaded event image type is not allowed.';
            }
            if ($eventPicture['size'] > 2097152) {
                $_SESSION['errors'][] = 'The uploaded event image exceeds the 2MB filesize limit.';
            }
            // Put the uploaded file into the system's temp directory with a name randomly assigned by the Secure Hash Algorithm (sha265).
            $uploadedFile = tempnam(sys_get_temp_dir(), hash('sha256', $eventPicture));
            if(move_uploaded_file($eventPicture['tmp_name'], $uploadedFile) && $_SESSION['errors'] === []) {
                $mail->addAttachment($uploadedFile, $event);
            } else {
                $_SESSION['errors'] = [];
                $_SESSION['errors'][] = 'The uploaded image file could not be uploaded. Try again with another image or without an image.';
                redirect($path);
            }
        }
        if(isset($_POST['about-event'])) {
            $about = trim(filter_var($_POST['about-event'], FILTER_SANITIZE_STRING));
        } else {
            $about = "";
        }
        $subject = 'Expression of interest: ' . $venue . ' / ' . $event;
        $message = "$name / $from / $phone\nis interested in hosting '$event' ($category)\nat $time on $date with the assistance of $numberOrganisers organisers.\nAdditional info: $about";

    }

    // If a group guided tour booking enquiree is made
    if(isset($_POST['group-size'])) {
        $mail->setFrom($from, (empty($name) ? 'Guided tour group booking' : $name));
        $mail->addAddress($to);

        $phone = trim(filter_var($_POST['phone-number'], FILTER_SANITIZE_STRING));
        $numberGroup = trim(filter_var($_POST['group-size'], FILTER_SANITIZE_STRING));
        $date = trim(filter_var($_POST['group-date'], FILTER_SANITIZE_STRING));
        if(isset($_POST['group-about'])) {
            $about = trim(filter_var($_POST['group-about'], FILTER_SANITIZE_STRING));
        } else {
            $about = "";
        }
        $subject = 'Guided tour group booking: ' . $numberGroup . ' persons / ' . $date;
        $message = "$name / $from / $phone\nwould like to make a guided tour group booking\non $date for $numberGroup persons.\nAdditional info: $about";
    }

    // If the mailing list is joined
    if($_POST['path']=="/") {
        $mail->setFrom($from, (empty($name) ? 'Join the mailing list' : $name));
        $mail->addAddress($to);

        $subject = 'Join the mailing list: ' . $from;
        $message = "$from has submitted a request to be added to the Gathenhielmska mailing list.";

        $mail->Subject = $subject;
        $mail->Body = $message;

        if (!$mail->send()) {
            $_SESSION['errors'][] = 'Your email couldn\'t be added to the mailing list at this time.';
        } else {
            $_SESSION['successes'][] = 'Your email has been added to our mailing list.';
        }
        redirect($path);
    }

    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        $_SESSION['errors'][] = 'Your enquiree couldn\'t be sent at this time.';
    } else {
        $_SESSION['successes'][] = 'We have received your enquiree. One of our staff members will be in touch with you shortly.';
    }


}

redirect($path);
