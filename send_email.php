<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Your email address where you want to receive the messages
    $to = "riley.powell98@gmail.com";

    // Subject of the email
    $subject = "Message from Lawn Care Services Website";

    // Compose the email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Set headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to send email. Please try again later.'));
    }
} else {
    // Handle the case where POST method is not used
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
?>