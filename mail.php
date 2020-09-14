<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

function print_message($error_message, $code = 0) {
  header('Content-type', 'application/json');
  print json_encode(['message' => $error_message, 'code' => $code]);
  exit();
}

if ($name === ''){
  print_message('Completar con su nombre');
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  print_message('Completar con un email valido');
}

if ($subject === '') {
  print_message('Complete con el motivo de su mensaje');
}

if ($message === '') {
  print_message('Completar con su mensaje');
}


$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "sebatenergia@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print_message('Su mensaje ha sido enviado. Muchas gracias!', 1);
exit();
?>