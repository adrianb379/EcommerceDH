<?php
$logged = isset($_SESSION['login']);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php if($bs){echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';} ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/f20e971e07.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?=$firstStyle?>">
  <link rel="stylesheet" href="<?=$secondStyle?>">
  <title><?=$title?></title>
</head>
<body>
  <header class="header-navbar">
    <div class="main-hd">

        <img src="images/logo.jpg" alt="">

      <button class="hamburger" type="button" id="hamburger"><i class="fas fa-bars"></i></button>
      <button type="button" id="search-button" class="hamburger search"><label id="label-search" for="search"><i class="fas fa-search"></i></label></button>
    </div>
    <nav id="nav" class="">
      <ul>
        <li><a href="./index.php">Home</a></li>
        <?php if($logged){
          echo '<li class="dropdown__toggler"><img src="images/users/'. $_SESSION['user']['user_pic'] .'" class="thumbnail-user"/><a>' . $_SESSION['user']['user_name'] . '</a>
                  <div class="dropdown__box">
                    <a href="user.php" class="dropdown__link">Ver perfil</a>
                    <a href="logout.php" class="dropdown__link">Cerrar sesión</a>
                  </div>
                </li>';
        }else {
          echo '<li><a href="./login.php">Entrar</a></li>
                <li><a href="./register.php">Registrarse</a></li>';
        } ?>
        <li><a href="./productos.php">Productos</a></li>
        <li><a href="./carrito.php">Carrito</a></li>
        <li><a href="./faq.php"><p>FAQ</p></a></li>
      </ul>
      <form action="index2.php" class="search-form" id="search-form">
        <input type="text" id="search" class="search-field" name="search" placeholder="Search">
        <button type="submit" name="button"></button>
      </form>
    </nav>
  </header>
