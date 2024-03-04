<!doctype html>
<html lang="es">

<!-- encabezado -->

<head>
	<meta charset="utf-8" />
	<meta name="csrf-token" content="csrf_token">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LEGOBOX</title>

	<!-- Imagen de Fondo -->
	<style>
		body {
			background-image: url('assets/images/fondoinicial.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>

	<!-- CSS -->
	<?php
	include('assets/css/styles.blade.php');
	?>
	<!-- JAVASCRIPT -->
	<?php
	include('assets/js/scripts.blade.php');
	?>
</head>
<!-- end encabezado -->


<!-- body -->

<body data-layout="horizontal">

	<!-- Page -->
	<div id="layout-wrapper">

		<header>
			<?php
			include('partes/header.php');
			if (isset($_SESSION["admin_id"])) :
				include('partes/menu.php');
			endif;
			?>
		</header>

		<div class="main-content">
			<div class="page-content">
				<?php
				View::load("index");
				?>
			</div>
		</div>

		<footer>
			<?php
			include('partes/footer.php');
			?>
		</footer>

	</div>
	<!-- end Page -->

</body>
<!-- end body -->