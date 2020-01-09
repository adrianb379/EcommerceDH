<?php
include_once 'core/init.php';

loginByCookie();

  if (isset($_SESSION['login'])) {
    header("Location: index.php");exit;
  }


  if ($_POST) {
    $OBJ_user = new User(0);

    $errorMessage = $OBJ_user->login($_POST['email'], $_POST['password'], isset($_POST['remember']));
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
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control"
         id="inputEmail4" placeholder="Email" value="<?php if($_POST){echo $_POST['email']; }?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Contraseña</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="***********">
      </div>
      <div class="form-group col-md-6">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Recordarme</label>
      </div>
      <div class="form-group col-md-6">
        <?php if(isset($errorMessage) && $errorMessage != ""){echo $errorMessage;} ?>
      </div>
    </div>
    <div class="form-action">
      <button type="submit">Iniciar sesión</button>
      <a href="reset-pwd-request.php">Olvidé mi contraseña</a>
    </div>
  </form>

<?php include 'parts/footer.php'; ?>
