<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Completar con su nombre', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => 'Completar con un email valido', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => 'Completar con un email valido', 'code' => 0));
  exit();
  }
}
if ($subject === ''){
  print json_encode(array('message' => 'Complete con el motivo de su mensaje', 'code' => 0));
  exit();
  }
if ($message === ''){
  print json_encode(array('message' => 'Completar con su mensaje', 'code' => 0));
  exit();
}


$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "argdan90@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Su mensaje ha sido enviado. Muchas gracias!', 'code' => 1));
/* if($email) {
  echo "<script>alert('Su mensaje a sido enviado')</script>";
  echo "<script> setTimeout(\"location.href='index.html'\",1000)</script>";
} */
exit();
?>