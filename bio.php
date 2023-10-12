<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["msg"];

  // Set up the recipient email address
  $to = "mersalnavi007@gmail.com"; // Replace with your email address

  // Set up the email subject and body
  $subject = "New message from contact form";
  $body = "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "Message: $message\n";

  // Send the email
  if (mail($to, $subject, $body)) {
    echo "Thank you for your message. We'll be in touch soon!";
  } else {
    echo "Sorry, there was an error sending your message.";
  }
}
?>
