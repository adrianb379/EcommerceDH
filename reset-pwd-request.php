<?php
include_once 'core/init.php';

loginByCookie();

  if (isset($_SESSION['login'])) {
    header("Location: index.php");exit;
  }

  if ($_POST) {
    $OBJ_user = new User();
    $user = $OBJ_user->getMYSQL_DB()->findUser($_POST["email"]);

    if ($user != FALSE) {
      header('Location: reset-pwd.inc.php?userEmail='. $_POST['email']);
    }else {
      $errorMessage = '¡No se ha encontrado al usuario!';
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
  <?php if(!isset($_GET['success'])) { ?>

    <form id="lelo" action="" method="post">
      <div class="form-row" id="lila">
        <div class="form-group col-md-12">
          <label for="inputEmail4">Porfavor ingrese el email de la cuenta que quiere recuperar. </br>
                                  Se le enviará un email con los pasos a seguir.</label>
          <input type="email" name="email" class="form-control"
           id="inputEmail4" placeholder="Email" value="<?php if($_POST){echo $_POST['email']; }?>">
        </div>
        <div class="form-group col-md-6">
          <?php if(isset($errorMessage)){echo $errorMessage;} ?>
        </div>
      </div>
      <div class="form-action">
        <button type="submit">Enviar email</button>
      </div>
    </form>
  <?php } else { ?>
    <div class="result-pwd-request">
      <?php echo ($_GET['success']) ? '¡Se ha enviado el email!' : 'Ha habido un error, por favor intenta de nuevo más tarde.'; ?>
    </div>
  <?php } ?>

<?php include 'parts/footer.php'; ?>
