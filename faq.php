<?php
include_once 'includes/functions.inc.php';

session_start();

loginByCookie();

 ?>

<?php
  $bs = 1;
  $firstStyle = 'css/header_and_footer.css';
  $secondStyle = 'css/questions.css';
  $title = 'Preguntas Frecuentes';


  include 'parts/header.php';
 ?>

	<div class="container">
			<h1 class="page-title">Preguntas Frecuentes</h1>
			<div class="jumbotron">
				<div class="flip-box">
				  <div class="flip-box-inner">
				    <div class="flip-box-front">
				      <h2>¿Realizan envios?</h2>
				    </div>
				    <div class="flip-box-back">
				      <h2>Si, en equipos mayores a 50.000 el envio es gratis</h2>
				    </div>
				  </div>
				</div>
				<div class="flip-box">
				  <div class="flip-box-inner">
				    <div class="flip-box-front">
				      <h2>¿Que hago si no funcionan?</h2>
				    </div>
				    <div class="flip-box-back">
				      <h2>Ni idea che</h2>
				    </div>
				  </div>
				</div>
				<div class="flip-box">
				  <div class="flip-box-inner">
				    <div class="flip-box-front">
				      <h2>¿Que hago si no me alcanza el dinero?</h2>
				    </div>
				    <div class="flip-box-back">
				      <h2>Comprate un nokia</h2>
				    </div>
				  </div>
				</div>
				<div class="flip-box">
				  <div class="flip-box-inner">
				    <div class="flip-box-front">
				      <h2>¿De donde son importados?</h2>
				    </div>
				    <div class="flip-box-back">
				      <h2>China. </h2>
				    </div>
				  </div>
				</div>
				<div class="flip-box">
				  <div class="flip-box-inner">
				    <div class="flip-box-front">
				      <h2>¿Tienen todos los colores?</h2>
				    </div>
				    <div class="flip-box-back">
				      <h2>Si el rosa es el mas bello</h2>
				    </div>
				  </div>
				</div>
				<div class="flip-box">
				  <div class="flip-box-inner">
				    <div class="flip-box-front">
				      <h2>¿Tienen alguna otra marca?</h2>
				    </div>
				    <div class="flip-box-back">
				      <h2>Solo aiphones papa.</h2>
				    </div>
				  </div>
				</div>
			</div>

		<!-- <section class="vip-products">

		</section>

		<footer class="main-footer">
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="#">quienes</a></li>
				<li><a href="#">servicios</a></li>
				<li><a href="#">portfolio</a></li>
				<li><a href="#">sucursales</a></li>
				<li><a href="#">contacto</a></li>
			</ul>
		</footer> -->

	</div>
