<?php
$currentEmail = $_SESSION['user']['email'];
$MYSQL_DB = new MYSQL_DB();

if (isset($_POST['userName'])) {
  $userName = $_POST['userName'];

  $errorUserName = validateUserName($userName);

  if ($userName === $_SESSION['user']['user_name']) {
    $errorUserName = "No se ha cambiado nada!";
  }

  if ($errorUserName === "") {
    $_SESSION['user']['user_name'] = $userName;

    $MYSQL_DB->updateUser_userName($userName, $_SESSION['user']['id']);
  }
}


if (isset($_POST['email'])) {
  $email = $_POST['email'];

  $errorEmail = validateEmail($email);

  if ($email === $_SESSION['user']['email']) {
    $errorEmail = "No se ha cambiado nada!";
  }

  if ($errorEmail === "") {
    if (isset($_COOKIE['login'])) {
      setcookie('login', 'true', time() + 60*60*24*30);
      setcookie('user', $email, time() + 60*60*24*30);
    }
    $_SESSION['user']['email'] = $email;
    $MYSQL_DB->updateUser_email($email, $_SESSION['user']['id']);
  }
}

if (isset($_POST['address'])) {
  $address = $_POST['address'];
  $secondAddress = $_POST['secondAddress'];

  $_SESSION['user']['address'] = $address;
  $_SESSION['user']['second_address'] = $secondAddress;

  $MYSQL_DB->updateUser_address($address, $_SESSION['user']['id']);
  $MYSQL_DB->updateUser_secondAddress($secondAddress, $_SESSION['user']['id']);
}

if (isset($_POST['city'])) {
  $city = $_POST['city'];
  $province = $_POST['province'];

  $_SESSION['user']['city'] = $city;
  $_SESSION['user']['province'] = $province;

  $MYSQL_DB->updateUser_city($city, $_SESSION['user']['id']);
  $MYSQL_DB->updateUser_province($province, $_SESSION['user']['id']);
}

if (isset($_POST['zip'])) {
  $zip = $_POST['zip'];

  $errorZip = validateZip($zip);

  if ($zip === $_SESSION['user']['zip']) {
    $errorZip = "No se ha cambiado nada!";
  }

  if ($errorZip === "") {
    $_SESSION['user']['zip'] = $zip;

    $MYSQL_DB->updateUser_zip($zip, $_SESSION['user']['id']);
  }
}

if ($_FILES && $_FILES['userPic']['error'] !== 4) {
  $userPic = $_FILES['userPic'];

  $errorUserPic = validateUserPic($userPic);

  if ($errorUserPic === "") {
    $currentPicDirectory = "images/users/" . $_SESSION['user']['user_pic'];
    unlink($currentPicDirectory);

    $picToken = bin2hex(random_bytes(5));
    $userPicName = $picToken . $currentEmail . "." . pathinfo($userPic['name'], PATHINFO_EXTENSION);
    $_SESSION['user']['user_pic'] = $userPicName;

    $MYSQL_DB->updateUser_userPic($userPicName, $_SESSION['user']['id']);

    move_uploaded_file($userPic['tmp_name'],"images/users/" . $userPicName);
  }
}

if (isset($_POST['newPassword'])) {
  $newPassword = $_POST['newPassword'];
  $newPasswordRepeat = $_POST['newPasswordRepeat'];

  $errorNewPassword = validatePassword($newPassword);

  if ($newPassword !== $newPasswordRepeat) {
    $errorNewPassword = "Las contraseñas no coinciden";
  }

  $confirmationPass = "";
  if (!password_verify($_POST['password'], $_SESSION['user']['password'])) {
    $confirmationPass = "Contraseña incorrecta";
  }
  if ($errorNewPassword === "" && $confirmationPass === "") {
    $hashedPass = password_hash($newPassword, PASSWORD_DEFAULT);
    $_SESSION['user']['password'] = $hashedPass;

    $MYSQL_DB->updateUser_password($hashedPass, $_SESSION['user']['id']);
  }
}


$usersInJSON = getUsersJSON();
foreach ($usersInJSON as $key => $userInJSON) {
  if ($userInJSON['email'] === $currentEmail) {
    $usersInJSON[$key] = $_SESSION['user'];
    break;
  }
}

$usersInJSON = json_encode($usersInJSON);
file_put_contents("json/users.json", $usersInJSON);
