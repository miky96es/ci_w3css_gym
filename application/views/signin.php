<!DOCTYPE html>
<html>
<head>
	<title>Gym</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>img/icon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body {
			background-image: url("<?php echo base_url(); ?>img/background2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
			background-attachment: fixed;
			background-color: rgba(33, 150, 243, 0.75);
		}

		header {
			background-color: rgba(33, 150, 243, 0.95);
		}

		#form {
			background-color: rgba(255, 255, 255, 0.75) !important;
		}
		.fail {
			background-color: rgba(215, 44, 44, 0.95);
			color: white;
		}

	</style>
</head>
<body>
<?php
if (isset($_GET['existe'])) {
	echo "
<div class=\"w3-container fail\">
	<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
	<h3><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Error!</h3>
	<p>Este correo ya esta en uso.</p>
</div>";
}
if (isset($_GET['password'])) {
	echo "
<div class=\"w3-container fail\">
	<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-closebtn\">×</span>
	<h3><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Error!</h3>
	<p>Las contraseñas no coinciden.</p>
</div>";
}
?>
<header class="w3-container w3-center">
	<h1 class="w3-text-white "><img class="w3-text-white" style="height:1em ;width: 1em;"
									src="https://camo.githubusercontent.com/d972b83b801d182149e4f1dc7d5b969f85f39444/687474703a2f2f706e672d312e66696e6469636f6e732e636f6d2f66696c65732f69636f6e732f323731312f667265655f69636f6e735f666f725f77696e646f7773385f6d6574726f2f3531322f64756d6262656c6c2e706e67"/>
		Gimnasio Cotxeres de Borbo</h1>
</header>
<div class="w3-margin w3-grid">
	<div class="w3-container w3-col m3">
	</div>
	<div class="w3-container w3-col s12 m6">
		<form id="form" class="w3-container w3-card-24 w3-animate-zoom w3-margin" method="post"
			  action="<?php echo base_url() ?>gimnasio/nuevo_usuario">
			<div class="w3-section">
				<h2 id="stroke" class="w3-text-blue w3-center w3-text-shadow"><b>Registrar usuario</b></h2>

				<label class="w3-text-blue"><i class="fa fa-user w3-text-black" aria-hidden="true"></i>
					<b>Nombre</b></label>
				<input class="w3-input w3-border" type="text" placeholder="Introduce tu nombre" name="name"
					   required><br>
				<label class="w3-text-blue"><i class="fa fa-user w3-text-black" aria-hidden="true"></i> <b>Apellidos</b></label>
				<input class="w3-input w3-border" type="text" placeholder="Introduce tus apellidos" name="lastname"
					   required><br>

				<label class="w3-text-blue"><i class="fa fa-envelope-o w3-text-black" aria-hidden="true"></i>
					<b>Email</b></label>
				<input class="w3-input w3-border" type="email" placeholder="Introduce tu email"
					   name="email" required><br>
				<label class="w3-text-blue"><i class="fa fa-calendar w3-text-black" aria-hidden="true"></i> <b>Fecha
						nacimiento</b></label>
				<input class="w3-input w3-border" type="date" name="fecha_nac" min='1900-01-01' max='2017-02-22'
					   required><br>
				<label class="w3-text-blue"><i class="fa fa-key w3-text-black" aria-hidden="true"></i> <b>Contraseña</b></label>
				<input class="w3-input w3-border" type="password" placeholder="Introduce tu contraseña" name="password"
					   required><br>
				<label class="w3-text-blue"><i class="fa fa-key w3-text-black" aria-hidden="true"></i> <b>Repite la
						contraseña</b></label>
				<input class="w3-input w3-border" type="password" placeholder="Introduce tu contraseña"
					   name="repeatpassword"
					   required><br>
				<button class="w3-btn-block w3-blue w3-hover-light-blue w3-padding" type="submit">Registrar</button>

				<p>Ya tienes cuenta ? <a class="w3-text-blue" href="<?php echo base_url() ?>"><b>Entrar</b></a></p>

			</div>
			<div class="w3-container w3-col s12 m3">
			</div>
		</form>
	</div>
</div>
</body>
