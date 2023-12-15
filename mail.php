if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['contact-name'];
    $email = $_POST['contact-email'];
    $subject = $_POST['subject'];
    $message = $_POST['contact-message'];

    $to = 'your_email@example.com'; // where you want to send the emails
    $headers = "From: " . $email;

    mail($to, $subject, $message, $headers);
    echo "Email sent!";
}