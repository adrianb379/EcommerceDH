<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'vendor/autoload.php';
include_once 'includes/functions.inc.php';

session_start();

loginByCookie();

  if (isset($_SESSION['login'])) {
    header("Location: reset-pwd-request.php");exit;
  }


if (!isset($_GET['userEmail'])) {
  header('Location: reset-pwd-request.php');
}

$token = random_bytes(8);

$tokenToHex = bin2hex($token);

$requests = file_get_contents('json/reset-pwd-requests.json');
$requests = json_decode($requests,true);

//Deleting previous requests
$keysToDelete = [];
foreach ($requests as $key => $request) {
  if ($request['email'] === $_GET['userEmail']) {

    $keysToDelete[] = $key;

  }
}
foreach ($keysToDelete as $key) {
  unset($requests[$key]);
}
$requests = array_values($requests);

$requests[] = [
  'email' => $_GET['userEmail'],
  'token' => $tokenToHex,
  'expirationDate' => time() + 60*60*24
];

$requests = json_encode($requests);
file_put_contents('json/reset-pwd-requests.json',$requests);


$mail = new PHPMailer();

//SMTP CONFIG
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tsl';
$mail->Username = 'noreplyiphonestore@gmail.com';
$mail->Password = 'zaobnapkumtxnspp';
$mail->Port = '587';

//EMAIL INFO
$mail->isHTML(true);
$mail->setFrom('no-reply@iphonestore.com','Iphone Store');
$mail->addAddress($_GET['userEmail'], '');
$mail->Subject = 'Password Recovery';

$href = 'http://localhost/eCommerceDH-ATLAS/reset-pwd-change.php?validator='. $tokenToHex .'&userEmail='. $_GET["userEmail"];
$mail->Body = '<h1>¡Siga el siguiente enlace para elegir una nueva contraseña!</h1>
                <a href="'. $href .'">'. $href .'</a>';


if (!$mail->send())
{
   /* PHPMailer error. */
   header('Location: reset-pwd-request.php?success=0');
}
header('Location: reset-pwd-request.php?success=1');


 ?>
