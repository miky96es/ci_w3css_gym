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
			background-image: url("<?php echo base_url(); ?>img/background4.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
			background-attachment: fixed;
			background-color: rgba(33, 150, 243, 0.75);
		}

		header {
			background-color: rgba(33, 150, 243, 0.95);
		}

		#principal {
			background-color: rgba(255, 255, 255, 0.75) !important;
		}

		.resalte {
			display: none;
			position: fixed;
			width: 100%;
			height: 100%;
			top: 0px;
			left: 0px;
		}

		.correcto {
			background-color: rgba(35, 162, 0, 0.95);
			color: white;
		}

		.marcado {
			font-weight: bolder;
		}
	</style>
</head>
<body>
<nav class="w3-sidenav w3-hide-large w3-blue w3-animate-left w3-card-2" style="z-index: 3; width: 250px; display: none;"
	 id="mySidenav">
	<a class="w3-padding w3-xlarge w3-hover-blue"><b><i class="fa fa-user" aria-hidden="true"></i>
			Hola <span
				class="w3-text-black w3-shadow marcado"><?php echo $_SESSION['nombre'] . "</span>, <span class=\"w3-text-black w3-shadow marcado\">" . $_SESSION['apellidos'] . "</span>!"; ?>
		</b></a>
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-large "><i
			class="fa fa-remove"></i> <b>Cerrar</b></a>
	<a class="w3-green"><b><i
				class="fa fa-list" aria-hidden="true"></i> Lista general actividades</b></a>
	<a href="<?php echo base_url() ?>user/listainscrito"><b><i
				class="fa fa-list" aria-hidden="true"></i> Lista actividades inscrito</b></a>
	<a href="<?php echo base_url() ?>user/inscribir"><b><i
				class="fa fa-plus"
				aria-hidden="true"></i> Inscripción actividades</b></a>
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
<header class="w3-blue w3-hide-small w3-hide-medium w3-bar">
	<a class="w3-bar-item w3-button w3-green w3-hover-green"><b><i class="fa fa-home"
																   aria-hidden="true"></i>
			Lista general actividades</b></a>
	<a class="w3-bar-item w3-button w3-hover-indigo" href="<?php echo base_url() ?>user/listainscrito"><b><i
				class="fa fa-list" aria-hidden="true"></i> Lista actividades inscrito</b></a>
	<a class="w3-bar-item w3-button w3-hover-indigo" href="<?php echo base_url() ?>user/inscribir"><b><i
				class="fa fa-plus" aria-hidden="true"></i> Inscripción actividades</b></a>
	<a class="w3-bar-item w3-button w3-red w3-right w3-hover-pale-red"
	   href="<?php echo base_url() . "gimnasio/cerrar"; ?>"><b><i
				class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</b></a>
</header>

<div id="principal" class="w3-margin">
	<div class="w3-blue">
		<h2 class="w3-text-shadow w3-margin">Lista general actividades <img class="w3-text-white"
																			style="height:1em ;width: 1em;"
																			src="https://camo.githubusercontent.com/d972b83b801d182149e4f1dc7d5b969f85f39444/687474703a2f2f706e672d312e66696e6469636f6e732e636f6d2f66696c65732f69636f6e732f323731312f667265655f69636f6e735f666f725f77696e646f7773385f6d6574726f2f3531322f64756d6262656c6c2e706e67"/>
		</h2>
	</div>
	<div class="w3-container w3-responsive w3-margin">
		<table class="w3-table w3-white w3-striped ">
			<thead>
			<tr class="w3-blue">
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Fecha</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($actividades->result_array() as $row) { ?>
				<tr>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['descripcion']; ?></td>
					<td><?php echo $row['date']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<br>
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
