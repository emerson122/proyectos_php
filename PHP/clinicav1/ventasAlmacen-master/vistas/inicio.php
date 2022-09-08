<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	
	<?php require_once "menu.php"; ?>
	
	<title>Clinica AGOC- INICIO</title>

<link rel="stylesheet" href="assets/css/maicons.css">

<link rel="stylesheet" href="assets/css/bootstrap.css">

<link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">

<link rel="stylesheet" href="assets/vendor/animate/animate.css">

<link rel="stylesheet" href="assets/css/theme.css">
</head>
<body>
<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
  <div class="topbar">
	<div class="container">
	  <div class="row">
		<div class="col-sm-8 text-sm">
		  <div class="site-info">
			<a href="#"><span class="mai-call text-primary"></span> +504 22-22-25-11</a>
			<span class="divider">|</span>
			<a href="#"><span class="mai-mail text-primary"></span> agoc@gmail.com</a>
		  </div>
		</div>
		<div class="col-sm-4 text-right text-sm">
		  <div class="social-mini-button">
			<a href="#"><span class="mai-logo-facebook-f"></span></a>
			<a href="#"><span class="mai-logo-twitter"></span></a>
			<a href="#"><span class="mai-logo-dribbble"></span></a>
			<a href="#"><span class="mai-logo-instagram"></span></a>
		  </div>
		</div>
	  </div> <!-- .row -->
	</div> <!-- .container -->
  </div> <!-- .topbar -->

  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
	<div class="container">
	  <a class="navbar-brand" href="#"><span class="text-primary">Clínica</span> AGOC</a>

	  <form action="#">
		<div class="input-group input-navbar">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
		  </div>
		  <input type="text" class="form-control" placeholder="Que buscas?" aria-label="Username" aria-describedby="icon-addon1">
		</div>
	  </form>

	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupport">
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="index3.html">Inicio</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="about.html">Servicios</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="doctors.html">Doctores</a>
		  </li>
		  
		  <li class="nav-item">
			<a class="nav-link" href="contact.html">Ubicacion</a>
		  </li>
		  <li class="nav-item">
			<a class="btn btn-primary ml-lg-3" href="index.html">Login / Register</a>
		  </li>
		</ul>
	  </div> <!-- .navbar-collapse -->
	</div> <!-- .container -->
  </nav>
</header>

<div class="page-hero bg-image overlay-dark" style="background-image: url(11.jpg);">
  <div class="hero-section">
	<div class="container text-center wow zoomIn">
	  <span class="subhead">Bienvenidos a Clinica AGOC</span>
	  <h1 class="display-4">Puedes ver los Doctores Disponibles aqui</h1>
	  <a href="doctors.html" class="btn btn-primary">Doctores</a>
	</div>
  </div>
</div>


<div class="bg-light">
  <div class="page-section py-3 mt-md-n5 custom-index">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-md-4 py-3 py-md-0">
		  <div class="card-service wow fadeInUp">
			<div class="circle-shape bg-secondary text-white">
			  <span class="mai-chatbubbles-outline"></span>
			</div>
			<p><span>Médicos</span> de calidad</p>
		  </div>
		</div>
		<div class="col-md-4 py-3 py-md-0">
		  <div class="card-service wow fadeInUp">
			<div class="circle-shape bg-primary text-white">
			  <span class="mai-shield-checkmark"></span>
			</div>
			<p><span>#1 en Proteccion</span> de la Salud</p>
		  </div>
		</div>
		<div class="col-md-4 py-3 py-md-0">
		  <div class="card-service wow fadeInUp">
			<div class="circle-shape bg-accent text-white">
			  <span class="mai-basket"></span>
			</div>
			<p><span>Calidad en los servicios</span></p>
		  </div>
		</div>
	  </div>
	</div>
  </div> <!-- .page-section -->

  <div class="page-section pb-0">
	<div class="container">
	  <div class="row align-items-center">
		<div class="col-lg-6 py-3 wow fadeInUp">
		  <h1>Cuidaremos de tu <br>Salud </h1>
		  <p class="text-grey mb-4">Bienvenidos al centro de salud Aqui podras conocer nuestra clinica los Doctores con los que contamos,enterate de las ultimas tendencias en salud todo esto y mucho mas en clinica Medica AGOC...</p>
		  <a href="about.html" class="btn btn-primary">Saber más</a>
		</div>
		<div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
		  <div class="img-place custom-img-1">
			<img src="assets/img/bg-doctor.png" alt="">
		  </div>
		</div>
	  </div>
	</div>
  </div> <!-- .bg-light -->
</div> <!-- .bg-light -->

<div class="page-section">
  <div class="container">
	<h1 class="text-center mb-5 wow fadeInUp">Nuestros Doctores</h1>

	<div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
	  <div class="item">
		<div class="card-doctor">
		  <div class="header">
			<img src="assets/img/doctors/doctor_1.jpg" alt="">
			<div class="meta">
			  <a href="#"><span class="mai-call"></span></a>
			  <a href="#"><span class="mai-logo-whatsapp"></span></a>
			</div>
		  </div>
		  <div class="body">
			<p class="text-xl mb-0">Dr. Stein Albert</p>
			<span class="text-sm text-grey">Cardióloga</span>
		  </div>
		</div>
	  </div>
	  <div class="item">
		<div class="card-doctor">
		  <div class="header">
			<img src="assets/img/doctors/doctor_2.jpg" alt="">
			<div class="meta">
			  <a href="#"><span class="mai-call"></span></a>
			  <a href="#"><span class="mai-logo-whatsapp"></span></a>
			</div>
		  </div>
		  <div class="body">
			<p class="text-xl mb-0">Dr. Alexa Melvin</p>
			<span class="text-sm text-grey">Dental</span>
		  </div>
		</div>
	  </div>
	  <div class="item">
		<div class="card-doctor">
		  <div class="header">
			<img src="assets/img/doctors/doctor_3.jpg" alt="">
			<div class="meta">
			  <a href="#"><span class="mai-call"></span></a>
			  <a href="#"><span class="mai-logo-whatsapp"></span></a>
			</div>
		  </div>
		  <div class="body">
			<p class="text-xl mb-0">Dr. Rebecca Steffany</p>
			<span class="text-sm text-grey">Salud General</span>
		  </div>
		</div>
	  </div>
	 
	  <div class="item">
		<div class="card-doctor">
		  <div class="header">
			<img src="Mi proyecto.png" alt="">
			<div class="meta">
			  <a href="#"><span class="mai-call"></span></a>
			  <a href="#"><span class="mai-logo-whatsapp"></span></a>
			</div>
		  </div>
		  <div class="body">
			<p class="text-xl mb-0">AGOC</p>
			<span class="text-sm text-grey">Clinica Medica</span>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>

<div class="page-section bg-light">
  <div class="container">
   

<div class="page-section">
  <div class="container">
   

<div class="page-section banner-home bg-image" style="background-image: url( assets/img/banner-pattern.svg);">
  <div class="container py-5 py-lg-0">
	<div class="row align-items-center">
	  <div class="col-lg-4 wow zoomIn">
		<div class="img-banner d-none d-lg-block">
		  <img src="assets/img/mobile_app.png" alt="">
		</div>
	  </div>
	  <div class="col-lg-8 wow fadeInRight">
		<h1 class="font-weight-normal mb-3">Encuentra nuestra aplicacion en la play store y la app store</h1>
		<a href="#"><img src=" assets/img/google_play.svg" alt=""></a>
		<a href="#" class="ml-2"><img src=" assets/img/app_store.svg" alt=""></a>
	  </div>
	</div>
  </div>
</div> <!-- .banner-home -->
</div> <!-- .banner-home -->

<footer class="page-footer">
  <div class="container">
	<div class="row px-md-3">
	  <div class="col-sm-6 col-lg-3 py-3">
		<h5>Clinica Medica</h5>
		<ul class="footer-menu">
		  <li><a href="about.html">Servicios</a></li>
		  <li><a href="doctors.html">Doctores</a></li>
		  <li><a href="contact.html">Ubicacion</a></li>
		</ul>
	  </div>
	  <div class="col-sm-6 col-lg-3 py-3">
	   <img src="Mi proyecto.png" width=400 height=400></img>
	  </div>
	 <div class="col-sm-6 col-lg-3 py-3"> 
	 </div>
	  <div class="col-sm-6 col-lg-3 py-3">
		<h5>Contact</h5>
		<p class="footer-link mt-2">Clinica Medica Agoc</p>
		<a href="#" class="footer-link">+504 22-22-25-11</a>
		<a href="#" class="footer-link">agoc@gmail.com</a>

		<h5 class="mt-3">Social Media</h5>
		<div class="footer-sosmed mt-3">
		  <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
		  <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
		  <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
		  <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
		  <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
		</div>
	  </div>
	</div>

	<hr>

	<p id="copyright">Sistema AGOC</p>
  </div>
</footer>

<script src="assets/js/jquery-3.5.1.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="assets/vendor/wow/wow.min.js"></script>

<script src="assets/js/theme.js"></script>

</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>