<!-- https://mdbootstrap.com/docs/b4/jquery/forms/contact/#php -->
<?php
  if (isset($_POST['name']))
    $name = $_POST['name'];
  if (isset($_POST['email']))
    $email = $_POST['email'];
  if (isset($_POST['message']))
    $message = $_POST['message'];
  if (isset($_POST['tel']))
    $tel = $_POST['tel'];
  $subject="Enquirey from $name";

  

  if ($name === '') {
    echo "Name cannot be empty.";
    die();
  }
  if ($email === '') {
    echo "Email cannot be empty.";
    die();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Email format invalid.";
      die();
    }
  }
  if ($tel === '') {
    echo "Phone cannot be empty.";
    die();
  }
  if ($message === '') {
    echo "Message cannot be empty.";
    die();
  }

  $content="From: $name \n Email: $email \n Phone: $tel \n Message: $message";
  $recipient = "info@locksmith.direct";
  $mailheader = "From: $email \r\n";
  mail($recipient, $subject, $content, $mailheader) or die("Error!");
  echo "Email sent! to $name";
  echo "Email sent! to $email";
  echo "Email sent! to $tel";
  echo "Email sent! to $message";
  echo "Email sent! to $recipient";
?>