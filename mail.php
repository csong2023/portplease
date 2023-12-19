<?php

$name = trim($_POST['contact-name']);
$phone = trim($_POST['contact-phone']);
$email = trim($_POST['contact-email']);
$message = trim($_POST['contact-message']);

if ($name === "") {
    $msg['err'] = "\n Name cannot be empty";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
} elseif ($phone === "") {
    $msg['err'] = "\n Phone number cannot be empty";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} elseif (!preg_match("/^[\d-\s]+$/", trim($phone))) {
    $msg['err'] = "\n Invalid phone number";
    $msg['field'] = "contact-phone";
    $msg['code'] = FALSE;
} elseif ($email === "") {
    $msg['err'] = "\n Email cannot be empty";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n Please put a valid email address";
    $msg['field'] = "contact-email";
    $msg['code'] = FALSE;
} elseif ($message === "") {
    $msg['err'] = "\n Message cannot be empty";
    $msg['field'] = "contact-message";
    $msg['code'] = FALSE;
} else {
    $to = 'yunhoson@andrew.cmu.edu';
    $subject = 'Contact Form Submission';
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $body = "<html><body>";
    $body .= "<p><strong>Name:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Phone:</strong> {$phone}</p>";
    $body .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
    $body .= "</body></html>";

    if (mail($to, $subject, $body, $headers)) {
        $msg['success'] = "\n Message sent successfully";
        $msg['code'] = TRUE;
    } else {
        $msg['err'] = "\n Failed to send message";
        $msg['code'] = FALSE;
    }
}

// You can echo or return the $msg array here, depending on how you handle AJAX requests, for example:
echo json_encode($msg);
