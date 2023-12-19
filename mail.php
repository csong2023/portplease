<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data from form
    $name = $_POST['contact-name'];
    $email = $_POST['contact-email'];
    $message = $_POST['contact-message'];
    $subject = $_POST['subject'];

    // Destination email address
    $to = 'yunhoson@andrew.cmu.edu';
    
    // Construct email headers
    $headers = "From: " . $email;

    // Validate email and send
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        mail($to, $subject, $message, $headers);
        echo "Email sent successfully";
    } else {
        echo "Invalid email format";
    }
}
?>
