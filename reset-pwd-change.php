<?php
include_once 'core/init.php';

loginByCookie();

  if (isset($_SESSION['login'])) {
    header("Location: index.php");exit;
  }

$validated = FALSE;
  if ($_GET) {

    if (isset($_GET['validator']) && isset($_GET['userEmail'])) {

      $requests = file_get_contents('json/reset-pwd-requests.json');
      $requests = json_decode($requests, true);

      foreach ($requests as $key => $request) {
        if ($request['email'] === $_GET['userEmail'] && $request['token'] === $_GET['validator'] && $request['expirationDate'] > time()) {
          $validated = TRUE;
          $myKey = $key;
          break;
        }
      }

    } else {
      header("Location: index.php");exit;
    }

  } else {
    header("Location: index.php");exit;
  }

  if ($_POST) {
    $errorMessage = validatePassword($_POST['password']);

    if (!$validated) {
      $errorMessage = 'Hubo un error con la validación, por favor intente de nuevo';
    }

    if ($errorMessage === '' && $_POST['password'] === $_POST['password-repeat']) {

      $hashedPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $users = getUsersJSON();

      foreach ($users as $key => $user) {
        if ($user['email'] === $_GET['userEmail']) {
          $user['password'] = $hashedPass;

          $users[$key] = $user;
          break;
        }
      }

      $users = json_encode($users);
      file_put_contents('json/users.json', $users);

      unset($requests[$myKey]);
      $requests = array_values($requests);

      $requests = json_encode($requests);
      file_put_contents('json/reset-pwd-requests.json', $requests);

      $MYSQL_DB = new MYSQL_DB();

      $userInDB = $MYSQL_DB->findUser($_GET['userEmail']);
      $MYSQL_DB->updateUser_password($hashedPass, $userInDB['id']);

      header('Location: login.php');
    }
  }

 ?>

<?php
  $bs = 1;
  $firstStyle = 'css/header_and_footer.css';
  $secondStyle = 'css/login.css';
  $title = 'Login';


  include 'parts/header.php';
 ?>

  <form id="lelo" action="" method="post">
    <div class="form-row" id="lila">
      <div class="form-group col-md-6">
        <label for="password">Elija una nueva contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="***********">
      </div>
      <div class="form-group col-md-6">
        <label for="password-repeat">Escriba la contraseña de nuevo</label>
        <input type="password" name="password-repeat" class="form-control" id="password-repeat" placeholder="***********">
      </div>
      <div class="form-group col-md-6">
        <?php if(isset($errorMessage) && $errorMessage != ""){echo $errorMessage;} ?>
      </div>
    </div>
    <div class="form-action">
      <button type="submit">Cambiar contraseña</button>
    </div>
  </form>

<?php include 'parts/footer.php'; ?>
