<?php
include_once 'includes/functions.inc.php';

session_start();

loginByCookie();

 ?>

<?php
  $bs = 1;
  $firstStyle = 'css/header_and_footer.css';
  $secondStyle = 'css/questions.css';
  $title = 'Frequently asked questions';


  include 'parts/header.php';
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/340ad3b7b3.js" crossorigin="anonymous"></script>
    <title>Proyecto DH Ecommerce</title>
</head>

<body>
    <!-- CONTENEDOR DEL SITIO-->
    <div class="container">

      
        <!-- TITULO -->
        <div class="row">
            <div class="col-12">
                <h1 class="titulo">NUESTROS PRODUCTOS</h1>
                <p class="subtitulo">
                    Aprovechá nuestras ofertas en 3 y 6 cuotas sin interés
                </p>
            </div>
        </div>

        <!-- MAIN-->
        <section id="articulos" class="row justify-content-between">
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"> <img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php" style="color:black;"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
            <article class="col-12 col-md-6 col-lg-4 col-xl-3 border border-secondary">
                <a href="detallep.php"><img class="imgsm" src="images/iPhone8.png" alt=""></a>
                <h6>iPhone 11</h6>
                <p>$50.000</p>
            </article>
        </section>

        <!-- FOOTER -->
        <?php include_once("parts/footer.php"); ?>

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
