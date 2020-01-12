<?php
include_once 'includes/functions.inc.php';

session_start();

loginByCookie();

$logged = isset($_SESSION['login']);

// echo "<pre>";
// var_dump($_COOKIE);
// echo "</pre>";
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/f20e971e07.js" crossorigin="anonymous"></script>
    <title>Proyecto DH Ecommerce</title>
</head>

<body>
    <!-- CONTENEDOR DEL SITIO-->
    <div class="container">

      <div class="top-section-wrapper">
    <header class="header-navbar">
      <div class="main-hd">

          <img src="images/logo.jpg" alt="">

        <button class="hamburger" type="button" id="hamburger"><i class="fas fa-bars"></i></button>
        <button type="button" id="search-button" class="hamburger search"><label id="label-search" for="search"><i class="fas fa-search"></i></label></button>
      </div>
      <nav id="nav" class="">
        <ul>

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
          <li><a href="./faq.php">FAQ</a></li>
          <li><a href="./carrito.php">Carrito</a></li>
        </ul>
        <form action="products.php" class="search-form" id="search-form" method="get">
          <input type="text" id="search" class="search-field" name="search" placeholder="Search">
          <button type="submit" name="button"></button>
        </form>
      </nav>
    </header>


    <div class="header__bajada">
      <?php
          if ($logged) {
            echo '<h2>Bienvenido!</h2>

                  <p>Iniciaste sesión como <span class="user-name">' . $_SESSION['user']['user_name'] . '</span></p>';

          } else {
            echo '<h2>Registrate</h2>
                  <p>Y encontrá todo lo que necesitás para surfear</p>
                  <a href="register.php" class="btn">Crear cuenta</a>';
          }

         ?>
    </div>
  </div>

        <!-- INICIO CARROUSEL-->
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/iphone-11.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Primera imagen</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/iphone-11.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Segunda imagen</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/iphone-11.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tercera imagen</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- FIN CARROUSEL-->


        <!-- ARTICULOS -->
        <section class="pricing py-5">
          <h2> Productos destacados </h2>
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Iphone 8</h5>
            <h6 class="card-title text-muted text-uppercase text-center">$50.000<span class="period">/ contado</span></h6>
            <hr>
            <img src="images/iPhone8.png" class="img-fluid" alt="Responsive image">
            <a href="logout.php" class="btn btn-block btn-primary text-uppercase">Comprar</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Iphone 8</h5>
            <h6 class="card-title text-muted text-uppercase text-center">$60.000<span class="period">/ contado</span></h6>
            <hr>
            <img src="images/iPhone8.png" class="img-fluid" alt="Responsive image">
            <a href="detallep.php" class="btn btn-block btn-primary text-uppercase">Comprar</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Iphone 8</h5>
            <h6 class="card-title text-muted text-uppercase text-center">$49.000<span class="period">/ contado</span></h6>
            <hr>
            <img src="images/iPhone8.png" class="img-fluid" alt="Responsive image">
            <a href="detallep.php" class="btn btn-block btn-primary text-uppercase">Comprar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div><img src="images/iphonebanner.jpg" class="img-fluid" alt="Responsive image" style="width:100%"></div>
</section>


        <?php include_once("parts/footer.php")?>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
