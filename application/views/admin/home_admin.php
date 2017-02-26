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

		#panel {
			background-color: rgba(255, 255, 255, 0.75) !important;
		}

		.marcado {
			font-weight: bolder;
		}
	</style>
</head>
<body>
<header class="w3-container w3-center ">
	<h1 class="w3-text-white "><img class="w3-text-white" style="height:1em ;width: 1em;"
									src="https://camo.githubusercontent.com/d972b83b801d182149e4f1dc7d5b969f85f39444/687474703a2f2f706e672d312e66696e6469636f6e732e636f6d2f66696c65732f69636f6e732f323731312f667265655f69636f6e735f666f725f77696e646f7773385f6d6574726f2f3531322f64756d6262656c6c2e706e67"/>
		Panel de control Gimnasio Cotxeres de Borbo</h1>
</header>
<div class="outer">
	<div class="middle">
		<div class="inner">
			<div class=" w3-grid">
				<div class="w3-container w3-col s1 m2">
				</div>
				<div id="panel" class="w3-container w3-col s10 m8 w3-center w3-white w3-round-large">
					<h3 class="w3-text-shadow">Bienvenido administrador <span
							class="w3-text-blue w3-shadow marcado"><?php echo $_SESSION['nombre'] . "</span>, <span class=\"w3-text-blue w3-shadow marcado\">" . $_SESSION['apellidos'] . "</span>!"; ?>
					</h3>
					<p>
						<a href="<?php echo base_url() . "admin/lista"; ?>"
						   class="w3-btn w3-padding w3-blue w3-hover-light-blue w3-large w3-margin"><i
								class="fa fa-list" aria-hidden="true"></i> Lista actividades
						</a>
						<a href="<?php echo base_url() . "admin/crear"; ?>"
						   class="w3-btn w3-padding w3-blue w3-hover-light-blue w3-large w3-margin"><i
								class="fa fa-plus"
								aria-hidden="true"></i>
							Crear actividad
						</a>
					</p>
					<p>
						<a href="<?php echo base_url() . "gimnasio/cerrar"; ?>" class="w3-btn w3-padding w3-red w3-hover-pale-red w3-large w3-margin"><i
								class="fa fa-sign-out" aria-hidden="true"></i>
							Cerrar sesión
						</a>
					</p>
				</div>
				<div class="w3-container w3-col s1 m2">
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
