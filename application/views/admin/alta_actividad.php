<!DOCTYPE html>
<html>
<head>
	<title>Gym</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>img/icon.ico">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body {
			background-image: url("<?php echo base_url(); ?>img/background3.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
			background-attachment: fixed;
			background-color: rgba(33, 150, 243, 0.75);
		}

		header {
			background-color: rgba(33, 150, 243, 0.95);
		}

		#creado {
			background-color: rgba(35, 162, 0, 0.95);
			color: white;
		}

		#yaexiste {
			background-color: rgba(215, 44, 44, 0.95);
			color: white;
		}

		#form {
			background-color: rgba(255, 255, 255, 0.75) !important;
		}

		.outer {
			display: table;
			position: absolute;
			height: 70%;
			width: 100%;
		}

		.middle {
			display: table-cell;
			vertical-align: middle;
		}

		.inner {
			margin-left: auto;
			margin-right: auto;
		}

	</style>
</head>
<body>
<?php
if (isset($_GET['creado'])) {

	echo "<div id='creado' class=\"w3-container\">
				<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
				<h3><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Bien!</h3>
				<p>Se ha creado correctamente la actividad.</p>
			</div>";
}
if (isset($_GET['yaexiste'])) {
	echo "<div id='yaexiste' class=\"w3-container\">
				<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
				<h3><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Error!</h3>
				<p>Esta actividad con ese nombre y fecha ya existe, por favor revisa las actividades y vuelve a intentar subir la actividad.</p>
			</div>";
}
?>
<nav class="w3-sidenav w3-hide-large w3-blue w3-animate-left w3-card-2" style="z-index: 3; width: 250px; display: none;"
	 id="mySidenav">
	<a  class="w3-padding w3-xlarge" href="<?php echo base_url() ?>admin"><b><i class="fa fa-home"
																				aria-hidden="true"></i>
			Home admin</b></a>
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-large "><i
			class="fa fa-remove"></i> <b>Cerrar</b></a>
	<a  href="<?php echo base_url() ?>admin/lista"><b><i
				class="fa fa-list" aria-hidden="true"></i> Lista de actividades</b></a>
	<a  class="w3-green" ><b><i
				class="fa fa-plus"
				aria-hidden="true"></i> Alta de actividad</b></a>
	<a class=" w3-red "
	   href="<?php echo base_url() . "gimnasio/cerrar"; ?>"><b><i
				class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</b></a>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor: pointer; display: none;"
	 id="myOverlay">
</div>

<div id="myTop" class="w3-container w3-large w3-blue w3-padding w3-hide-large">
	<i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
</div>
<header class="w3-blue w3-bar w3-hide-small w3-hide-medium">
	<a class="w3-bar-item w3-button w3-hover-indigo" href="<?php echo base_url() ?>admin"><b><i class="fa fa-home" aria-hidden="true"></i>
			 Panel de control actividades</b></a>
	<a class="w3-bar-item w3-button w3-hover-indigo" href="<?php echo base_url() ?>admin/lista"><b><i
				class="fa fa-list" aria-hidden="true"></i> Lista de actividades</b></a>
	<a class="w3-bar-item w3-button w3-green w3-hover-green"><b><i
				class="fa fa-plus"
				aria-hidden="true"></i> Alta de actividad</b></a>
	<a class="w3-bar-item w3-button w3-red w3-right w3-hover-pale-red" href="<?php echo base_url() . "gimnasio/cerrar"; ?>"><b><i
				class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</b></a>

</header>
<div class="outer">
	<div class="middle">
		<div class="inner">
			<div class="w3-margin w3-grid">
				<div class="w3-container w3-col m3">
				</div>
				<div class="w3-container w3-col s12 m6">
					<form id="form" class="w3-container w3-card-24 w3-animate-zoom w3-margin" method="post"
						  action="<?php echo base_url() ?>admin/alta">
						<div class="w3-section">
							<h2 id="stroke" class="w3-text-blue w3-center w3-text-shadow"><b>Alta de actividad</b></h2>
							<label class="w3-text-blue"><i class="fa fa-font w3-text-black" aria-hidden="true"></i>
								<b>Nombre actividad</b></label>
							<input class="w3-input w3-border w3-margin-bottom" type="text"
								   placeholder="Introduce el nombre de la actividad"
								   name="activity-name"
								   required>
							<label class="w3-text-blue"><i class="fa fa-text-width w3-text-black" aria-hidden="true"></i>

								<b>Descripción actividad</b></label>
							<textarea class="w3-input w3-border w3-margin-bottom"
								   placeholder="Introduce la descripción de la actividad"
								   name="activity-description" rows="3"
								   required></textarea>
							<label class="w3-text-blue"><i class="fa fa-calendar w3-text-black" aria-hidden="true"></i> <b>Fecha
									actividad</b></label>
							<input class="w3-input w3-border" type="date" name="activity-date" min='2017-01-01'
								   required><br>
							<button class="w3-btn-block w3-blue w3-hover-indigo w3-padding" type="submit"><b>Dar de alta</b>
							</button>

						</div>
						<div class="w3-container w3-col s12 m3">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	// Open and close the sidenav on medium and small screens
	function w3_open() {
		document.getElementById("mySidenav").style.display = "block";
		document.getElementById("myOverlay").style.display = "block";
	}
	function w3_close() {
		document.getElementById("mySidenav").style.display = "none";
		document.getElementById("myOverlay").style.display = "none";
	}
</script>
</body>
</html>
