<!doctype html>
<html lang="es">

<!-- encabezado -->

<head>
	<!-- utf-8 -->
	<meta charset="utf-8" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>LEGOBOX</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- FondoTemplate -->
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
</head>
<!-- end encabezado -->

<body data-layout="horizontal">

	<!-- Page -->
	<div id="layout-wrapper">

		<header>
			<?php
			include('partes/header.php');
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

	<!-- JAVASCRIPT -->
	<?php
	include('assets/js/scripts.blade.php');
	?>
</body>