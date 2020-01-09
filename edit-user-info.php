<?php
include_once 'core/init.php';

loginByCookie();

if (!isset($_SESSION['login'])) {
  header('Location: index.php');exit;
}

if($_POST || $_FILES){
  require_once "includes/edit-user-info.inc.php";
}

$user = $_SESSION['user'];

 ?>

<?php
  $bs = 0;
  $firstStyle = 'css/header_and_footer.css';
  $secondStyle = 'css/user.css';
  $title = 'User Profile';


  include 'parts/header.php';
 ?>

 <div class="user-info">
   <div class="shadow-container">
     <img src="images/users/<?= $user['user_pic'] ?>" alt="">
   </div>
   <h3><?= $user['user_name'] ?></h3>
 </div>

 <section class="user-edit panel">
   <div class="panel__header"><h4><label for="userName">Nombre de usuario</label></h4></div>
   <form action="" method="post">
      <div class="input-field">
        <input id="userName" type="text" name="userName" value="<?= $user['user_name'] ?>">
        <p class="error-message"><?php echo (isset($errorUserName)) ? $errorUserName : "" ; ?></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4><label for="email">Dirección de email</label></h4></div>
   <form action="" method="post">
      <div class="input-field">
        <input id="email" type="email" name="email" value="<?= $user['email'] ?>">
        <p class="error-message"><?php echo (isset($errorEmail)) ? $errorEmail : "" ; ?></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4>Nuevo domicilio</h4></div>
   <form action="" method="post">
      <div class="input-field">
        <label for="address">Dirección</label>
        <input id="address" type="text" name="address" value="<?= $user['address'] ?>">
        <p class="error-message"></p>
      </div>
      <div class="input-field">
        <label for="secondAddress">Segunda dirección</label>
        <input id="secondAddress" type="text" name="secondAddress" value="<?= $user['second_address'] ?>">
        <p class="error-message"></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4>Ciudad y provincia</h4></div>
   <form action="" method="post">
      <div class="input-field">
        <label for="city">Ciudad</label>
        <input id="city" type="text" name="city" value="<?= $user['city'] ?>">
        <p class="error-message"></p>
      </div>
      <div class="input-field">
        <label for="province">Provincia</label>
        <select id="province" name="province">
          <option value="Buenos Aires" <?php if($user['province'] === 'Buenos Aires'){echo "selected";} ?>>Buenos Aires</option>
          <option value="Cordoba" <?php if($user['province'] === 'Cordoba'){echo "selected";} ?>>Cordoba</option>
          <option value="Santa Fe" <?php if($user['province'] === 'Santa Fe'){echo "selected";} ?>>Santa Fé</option>
          <option value="Entre Rios" <?php if($user['province'] === 'Entre Rios'){echo "selected";} ?>>Entre Rios</option>
          <option value="Rio Negro" <?php if($user['province'] === 'Rio Negro'){echo "selected";} ?>>Rio Negro</option>
        </select>
        <p class="error-message"></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4>Cambiar código Zip</h4></div>
   <form action="" method="post">
      <div class="input-field">
        <label for="zip">Zip</label>
        <input id="zip" type="text" name="zip" value="<?= $user['zip'] ?>">
        <p class="error-message"><?php echo (isset($errorZip)) ? $errorZip : "" ; ?></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4>Nueva foto de perfil</h4></div>
   <form action="" method="post" enctype="multipart/form-data">
      <div class="input-field">
        <label for="userPic">Foto de perfil</label>
        <input class="user-pic" id="userPic" type="file" name="userPic">
        <p class="error-message"><?php echo (isset($errorUserPic)) ? $errorUserPic : "" ; ?></p>
      </div>
      <div class="form-action">
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <section class="user-edit panel">
   <div class="panel__header"><h4>Cambiar la contraseña</h4></div>
   <form action="" method="post">
      <div class="input-field">
        <label for="newPassword">Nueva contraseña</label>
        <input id="newPassword" type="password" name="newPassword">
        <p class="error-message"></p>
      </div>
      <div class="input-field">
        <label for="newPasswordRepeat">Vuelva a escribir su nueva contraseña</label>
        <input id="newPasswordRepeat" type="password" name="newPasswordRepeat">
        <p class="error-message"><?php echo (isset($errorNewPassword)) ? $errorNewPassword : "" ; ?></p>
      </div>
      <div class="form-action">
        <div class="input-field">
          <label for="password">Antes de continuar, ingrese su contraseña actual</label>
          <input id="password" type="password" name="password">
          <p class="error-message"><?php echo (isset($confirmationPass)) ? $confirmationPass : "" ; ?></p>
        </div>
        <button type="submit" class="btn">Confirmar cambios</button>
      </div>
   </form>
 </section>

 <?php include 'parts/footer.php'; ?>
