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
        <div class="row justify-content-center">
                <h1 class="col-10 titulo">CONTACTO</h1>
                <p class="col-12 col-sm-10 col-md-10 col-lg-8 subtitulo">
                    Envianos tus dudas, consultas o sugerencias. Te daremos una respuesta a la mayor brevedad posible.
                </p>
        </div>

        <!-- FORMULARIO -->
        <section class="row mb-5">
            <div class="col-12 col-sm-10 col-md-10 col-lg-8">
                <form class="border border-secondary rounded">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">No compartiremos tu email con nadie
                            mas.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Motivo de consulta</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2">
                            <option>Consultas</option>
                            <option>Cambios</option>
                            <option>Formas de pago</option>
                            <option>Quejas</option>
                            <option>Trabaja con nosotros</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentarios</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

            </div>
        </section>

        <!-- FOOTER -->
        <?php include_once("parts/footer.php"); ?>

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
