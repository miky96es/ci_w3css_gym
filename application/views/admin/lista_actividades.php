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
		.incorrecto{
			background-color: rgba(215, 44, 44, 0.95);
			color: white;
		}
	</style>
</head>
<body>
<?php
if (isset($_GET['creado'])) {

	echo "<div class=\"w3-container correcto\">
	<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
	<h3><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Bien!</h3>
	<p>Se ha creado correctamente la actividad.</p>
</div>";
}
?>
<?php
if (isset($_GET['modificada'])) {

	echo "<div class=\"w3-container correcto\">
	<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
	<h3><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Bien!</h3>
	<p>Se ha modificado correctamente la actividad con id nº " . $_GET['modificada'] . ".</p>
</div>";
}
?>
<?php
if (isset($_GET['eliminada'])) {

	echo "<div class=\"w3-container correcto\">
	<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
	<h3><i class=\"fa fa-check\" aria-hidden=\"true\"></i> Bien!</h3>
	<p>Se ha eliminado correctamente la actividad con id nº " . $_GET['eliminada'] . ".</p>
</div>";
}
?>
<?php
if (isset($_GET['error'])) {

	echo "<div class=\"w3-container incorrecto\">
	<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
	<h3><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Error!</h3>
	<p>No se puede eliminar la actividad con id nº " . $_GET['error'] . ", porque hay usuarios que estan inscritos en ella!.</p>
</div>";
}
?>

<nav class="w3-sidenav w3-hide-large w3-blue w3-animate-left w3-card-2" style="z-index: 3; width: 250px; display: none;"
	 id="mySidenav">
	<a class="w3-padding w3-xlarge" href="<?php echo base_url() ?>admin"><b><i class="fa fa-home"
																			   aria-hidden="true"></i>
			Home admin</b></a>
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-large "><i
			class="fa fa-remove"></i> <b>Cerrar</b></a>
	<a class="w3-green"><b><i
				class="fa fa-list" aria-hidden="true"></i> Lista de actividades</b></a>
	<a href="<?php echo base_url() ?>admin/crear"><b><i
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
<header class="w3-blue w3-hide-small w3-hide-medium w3-bar">
	<a class="w3-bar-item w3-button w3-hover-indigo" href="<?php echo base_url() ?>admin"><b><i class="fa fa-home"
																								aria-hidden="true"></i>
			Panel de control actividades</b></a>
	<a class="w3-bar-item w3-button w3-green w3-hover-green"><b><i
				class="fa fa-list" aria-hidden="true"></i> Lista de actividades</b></a>
	<a class="w3-bar-item w3-button w3-hover-indigo" href="<?php echo base_url() ?>admin/crear"><b><i
				class="fa fa-plus"
				aria-hidden="true"></i> Alta de actividad</b></a>
	<a class="w3-bar-item w3-button w3-red w3-right w3-hover-pale-red"
	   href="<?php echo base_url() . "gimnasio/cerrar"; ?>"><b><i
				class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</b></a>
</header>

<div id="principal" class="w3-margin">
	<div class="w3-blue">
		<h2 class="w3-text-shadow w3-margin">Lista de actividades <img class="w3-text-white"
																	   style="height:1em ;width: 1em;"
																	   src="https://camo.githubusercontent.com/d972b83b801d182149e4f1dc7d5b969f85f39444/687474703a2f2f706e672d312e66696e6469636f6e732e636f6d2f66696c65732f69636f6e732f323731312f667265655f69636f6e735f666f725f77696e646f7773385f6d6574726f2f3531322f64756d6262656c6c2e706e67"/>
		</h2>
	</div>
	<div class="w3-container w3-responsive w3-margin">
		<table class="w3-table w3-white w3-striped">
			<thead>
			<tr class="w3-blue">
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Fecha</th>
				<th></th>
				<th></th>

			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($actividades->result_array() as $row) { ?>
				<div id='f<?php echo $row['id']; ?>' class="resalte w3-animate-opacity">
					<div class="w3-white w3-card-24 w3-display-middle w3-half">
						<span onclick="this.parentElement.parentElement.style.display='none'"
							  class="w3-closebtn w3-text-black w3-margin-right w3-hover-text-black">×</span>
						<p class="w3-margin-0 w3-yellow w3-padding"><b><i class="fa fa-pencil-square-o"
																		  aria-hidden="true"></i>

								Modificar actividad nº <?php echo $row['id']; ?></b></p>
						<form id="form" class="w3-container w3-card-24 w3-animate-zoom w3-margin" method="post"
							  action="<?php echo base_url() ?>admin/modificar">
							<div class="w3-section w3-container">
								<input class="w3-hide" type="text"
									   name="activity-id" value="<?php echo $row['id']; ?>"
									   required>
								<label class="w3-text-yellow"><i class="fa fa-font w3-text-black"
																 aria-hidden="true"></i>
									<b>Nombre actividad</b></label>
								<input class="w3-input w3-border w3-margin-bottom" type="text"
									   name="activity-name" value="<?php echo $row['nombre']; ?>"
									   required>
								<label class="w3-text-yellow"><i class="fa fa-text-width w3-text-black"
																 aria-hidden="true"></i>

									<b>Descripción actividad</b></label>
								<textarea class="w3-input w3-border w3-margin-bottom"
										  name="activity-description" rows="3"
										  required><?php echo $row['descripcion']; ?></textarea>
								<label class="w3-text-yellow"><i class="fa fa-calendar w3-text-black"
																 aria-hidden="true"></i> <b>Fecha
										actividad</b></label>
								<input class="w3-input w3-border" type="date" name="activity-date" min='2017-01-01'
									   value="<?php echo $row['date']; ?>"
									   required><br>
								<button class="w3-btn-block w3-yellow w3-hover-pale-yellow w3-padding" type="submit"><b>modificar</b>
								</button>

							</div>
							<div class="w3-container w3-col s12 m3">
							</div>
						</form>
					</div>
				</div>
				<div id='a<?php echo $row['id']; ?>' class="resalte w3-animate-opacity">
					<div class="w3-white w3-card-24 w3-display-middle w3-half">
					<span onclick="this.parentElement.parentElement.style.display='none'"
						  class="w3-closebtn w3-text-white w3-margin-right w3-hover-text-black">×</span>
						<p class="w3-margin-0 w3-red w3-padding"><b><i class="fa fa-exclamation-triangle"
																	   aria-hidden="true"></i>
								Estas seguro que quieres borrar la actividad nº <?php echo $row['id']; ?>?</b></p>
						<div class="w3-center">
							<a class="w3-margin w3-btn w3-green"
							   href="<?php echo base_url(); ?>admin/eliminar?id=<?php echo $row['id']; ?>">
								Si
							</a>
							<button onclick="this.parentElement.parentElement.parentElement.style.display='none'"
									class="w3-margin w3-btn w3-red">No
							</button>
						</div>
					</div>
				</div>

				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['descripcion']; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td>
						<button class="w3-btn w3-yellow w3-hover-pale-yellow"
								onclick="document.getElementById('f<?php echo $row['id']; ?>').style.display='block';window.location.hash = '#f<?php echo $row['id']; ?>';">
							Modificar
						</button>
					</td>
					<td>
						<button class="w3-btn w3-red w3-hover-pale-red"
								onclick="document.getElementById('a<?php echo $row['id']; ?>').style.display='block';window.location.hash = '#a<?php echo $row['id']; ?>';">
							Eliminar
						</button>
					</td>
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
