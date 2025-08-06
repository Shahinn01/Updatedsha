<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // 📁 Save to file (optional)
  $log = "feedbacks.txt";
  $entry = "Name: $name\nEmail: $email\nMessage: $message\n---\n";
  file_put_contents($log, $entry, FILE_APPEND);

  // 📧 Email Alert (change these values)
  $to = "your-email@example.com"; // 🔁 Replace with your own email
  $subject = "🌟 New Blessing Shared on CSI Church Website";
  $body = "You have received a new testimony/feedback:\n\n".
          "Name: $name\nEmail: $email\n\nMessage:\n$message\n";
  $headers = "From: no-reply@csichurch.in";

  mail($to, $subject, $body, $headers);
}
?>
