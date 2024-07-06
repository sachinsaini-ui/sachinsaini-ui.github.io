<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = 'From: ' . $from . "\r\n" .
               'Reply-To: ' . $from . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Email sent successfully from $from to $to</p>";
    } else {
        echo "<p>Failed to send email.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
