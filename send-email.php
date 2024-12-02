<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email
    $to = 'workmail.votrix@gmail.com';

    // Subject of the email
    $subject = 'New Contact Message from ' . $name;

    // Message content
    $body = "You have received a new message from your website contact form.\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Message:\n$message";

    // Headers to define the sender's email and reply-to address
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // Success
        echo "Message sent successfully!";
    } else {
        // Failure
        echo "There was an error sending your message.";
    }
}
?>