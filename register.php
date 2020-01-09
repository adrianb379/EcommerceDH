<?php
include_once 'core/init.php';

loginByCookie();

if (isset($_SESSION['login'])) {
  header("Location: index.php");exit;
}

$valid = new Validator();

  if ($_POST) {
    $valid->validateEmail($_POST["email"]);

    $valid->validatePassword($_POST['password']);

    $valid->validateZip($_POST['zip']);

    $valid->validateUserPic($_FILES['userPic']);

    if (empty($valid->getErrors())) {
      $OBJ_user = new User(0);
      $OBJ_user->register();
      header("Location: login.php");
    }else{
      $errors = $valid->getErrors();
    }
  }

 ?>

<?php

  $bs = 1;
  $firstStyle = 'css/header_and_footer.css';
  $secondStyle = 'css/register.css';
  $title = 'Register';


  include 'parts/header.php';
 ?>

  <form id="lalala" action="" method="post" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="email">Email*</label> <?php if(isset($errors['email'])){echo '<span>'. $errors['email'] .'</span>';} ?>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php if($_POST){echo $_POST['email']; }?>">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Contraseña*</label> <?php if(isset($errors['password'])){echo '<span>'. $errors['password'] .'</span>';} ?>
        <input type="password" class="form-control" name="password" id="password" placeholder="***********">
      </div>
    </div>
    <div class="form-group">
      <label for="address">Dirrección</label>
      <input type="text" class="form-control" name="address" id="address" placeholder="Lima 1111" value="<?php if($_POST){echo $_POST['address']; }?>">
    </div>
    <div class="form-group">
      <label for="address2">Segunda dirrección</label>
      <input type="text" class="form-control" name="secondAddress" id="address2" placeholder="Av. Monroe 860" value="<?php if($_POST){echo $_POST['secondAddress']; }?>">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="city">Ciudad</label>
        <input type="text" class="form-control" name="city" id="city" value="<?php if($_POST){echo $_POST['city']; }?>">
      </div>
      <div class="form-group col-md-4">
        <label for="province">Provincia</label>
        <select id="province" name="province" class="form-control">
          <option value="Buenos Aires" selected>Buenos Aires</option>
          <option value="Cordoba">Cordoba</option>
          <option value="Santa Fe">Santa Fé</option>
          <option value="Entre Rios">Entre Rios</option>
          <option value="Rio Negro">Rio Negro</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="zip">Código postal*</label>
        <input type="text" name="zip" class="form-control" id="zip" value="<?php if($_POST){echo $_POST['zip']; }?>">
        <?php if(isset($errors['zip'])){echo '<span class="zip-error">'. $errors['zip'] .'</span>';} ?>
      </div>
      <div class="form-group col-md-2">
        <label for="userPic">Foto de perfil</label>
        <input type="file" name="userPic" id="userPic">
        <?php if(isset($errors['userPic'])){echo '<span class="zip-error">'. $errors['userPic'] .'</span>';} ?>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Registrarse</button>
    <input class="check-terms" type="checkbox" name="acepta" value="1" id="check-terms" required> <label for="check-terms">Acepta los terminos y condiciones.</label>
    <span class="aclaration">*Datos necesarios.</span>
  </form>


<?php include 'parts/footer.php'; ?>
