<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $subject = $_POST["subject"] ?? 'New Contact Message';
    $message = $_POST["message"] ?? '';

    // Receiving Email
    $to = "tamrakarshubham99@gmail.com";

    // Email Body
    $body  = "You received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Try sending
    if (mail($to, $subject, $body, $headers)) {
        echo "OK"; // VERY IMPORTANT — validate.js expects exactly "OK"
    } else {
        echo "Mail sending failed";
    }

} else {
    echo "Invalid request";
}
?>
