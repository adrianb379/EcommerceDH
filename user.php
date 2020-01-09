<?php
include_once 'core/init.php';

loginByCookie();

$OBJ_user = new User($_SESSION['user']['id']);

if (!isset($_SESSION['login'])) {
  header('Location: index.php');exit;
}

if($_POST){
  $OBJ_user->updateFavCategories($_POST['favCategories'], $_SESSION['user']['email']);
}

$OBJ_user->setFavCategories($OBJ_user->getId());
$_SESSION['user']['fav_categories'] = $OBJ_user->getFavCategories();
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

  <section class="cart-hist-container">
    <div class="cart">
      <div class="cart__header">
        <h5>Carrito</h5>
        <button type="button" id="toHist" class="btn btn-white">Historial</button>
      </div>
      <ul>
        <li>
          <a href="#">Nombre del ítem</a>
          <span>Precio</span>
        </li>
      </ul>
    </div>
    <div class="hist">
      <div class="hist__header">
        <h5>Historial de compras</h5>
        <button type="button" id="toCart" class="btn">Carrito</button>
      </div>
      <ul>
        <li>
          <a href="#">Nombre del ítem</a>
          <span>Precio</span>
          <span>xx/xx/xx</span>
        </li>
      </ul>
    </div>
  </section>

  <section class="settings panel">
    <h5 class="panel__header">Selecciona las categorías de las cuales te gustaría recibir ofertas:</h5>
    <form action="" method="post">
      <div class="input-field">
        <input id="IPHONE8" type="checkbox" name="favCategories[]" value="1" <?php if(isset($user['fav_categories'])){if(in_array('1' ,$user['fav_categories'])){echo 'checked';}} ?>><label for="IPHONE8">IPHONE8</label>
      </div>
      <div class="input-field">
        <input id="IPHONE9" type="checkbox" name="favCategories[]" value="2" <?php if(isset($user['fav_categories'])){if(in_array('2' ,$user['fav_categories'])){echo 'checked';}} ?>><label for="IPHONE9">IPHONE9</label>
      </div>
      <div class="input-field">
        <input id="IPHONE10" type="checkbox" name="favCategories[]" value="3" <?php if(isset($user['fav_categories'])){if(in_array('3' ,$user['fav_categories'])){echo 'checked';}} ?>><label for="IPHONE10">IPHONE10</label>
      </div>
      <div class="input-field">
        <input id="IPHONE11" type="checkbox" name="favCategories[]" value="4" <?php if(isset($user['fav_categories'])){if(in_array('4' ,$user['fav_categories'])){echo 'checked';}} ?>><label for="IPHONE11">IPHONE11</label>
      </div>
      <div class="input-field">
        <input id="IPHONE12" type="checkbox" name="favCategories[]" value="5" <?php if(isset($user['fav_categories'])){if(in_array('5' ,$user['fav_categories'])){echo 'checked';}} ?>><label for="IPHONE12">IPHONE12</label>
      </div>

      <button type="submit">Actualizar</button>
    </form>
  </section>

  <section class="user-details panel">
    <div class="panel__header"><h4>Información de la cuenta</h4><a href="edit-user-info.php" class="btn btn-white">Editar</a></div>
    <ul>
      <li>
        <h5>Nombre de usuario:</h5>
        <span><?=$user['user_name']?></span>
      </li>
      <li>
        <h5>Email:</h5>
        <span><?=$user['email']?></span>
      </li>
      <li>
        <h5>Dirección:</h5>
        <span><?=$user['address']?></span>
      </li>
      <li>
        <h5>Segunda dirección:</h5>
        <span><?=$user['second_address']?></span>
      </li>
      <li>
        <h5>Ciudad:</h5>
        <span><?=$user['city']?></span>
      </li>
      <li>
        <h5>Provincia:</h5>
        <span><?=$user['province']?></span>
      </li>
      <li>
        <h5>Zip:</h5>
        <span><?=$user['zip']?></span>
      </li>
    </ul>
  </section>

<?php include 'parts/footer.php'; ?>
