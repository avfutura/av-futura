<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "vanitha.avfutura@gmail.com"; // Replace with your email address

    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email subject and body
    $subject = "New Contact Form Message from $name";
    $body = "You received a new message from AV Futura contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: Message not sent.";
    }
} else {
    echo "Invalid request.";
}
?>