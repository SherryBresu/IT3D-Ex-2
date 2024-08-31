<?php

$name = htmlspecialchars(trim($_POST['name']));
$gmail = htmlspecialchars(trim($_POST['gmail']));
$subject = htmlspecialchars(trim($_POST['subject']));
$message = htmlspecialchars(trim($_POST['message']));


if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}


$gmailheader .= "From: $name <$gmail>\r\n";
$gmailheader .= "Reply-To: $gmail\r\n";
$gmailheader .= "Content-Type: text/plain; charset=UTF-8\r\n";

// List of multiple recipients
$recipients = [
    'sherrymongado@gmail.com',
    'zhakira0625@gmail.com',
    'plumajennylyn@gmail.com'
];

// Send email to all recipients
$success = true;

foreach ($recipients as $recipient) {
    if (!mail($recipient, $subject, $message, $gmailheader)) {
        $success = false;
        echo "Failed to send email to $recipient.<br>";
    }
}

if ($success) {
    echo "Emails sent successfully.";
} else {
    echo "Some emails failed to send.";
}

?>