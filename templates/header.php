<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo(p_title); ?></title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

		<link rel="stylesheet" href="../bootstrapvalidator/dist/css/bootstrapValidator.min.css" />

		<link rel="stylesheet" type="text/css" href="templates/crud_ss.css">
		<script type="text/javascript" src="../jquery/jquery.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="../bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
		<script type="text/javascript" src="templates/validacion.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-static" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="index.php"><b>Inicio</b></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Inventario</b><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
								<li><a href="alta.php">Crear</a></li>
								<li><a href="listado.php">Listado</a></li>
						</ul>
					</li>
					<li><a href="cerrar.php"><b>Cerrar Sesión</b></a></li>
				</ul>
			</div>
		</nav>
		<div class="container" id="container">
			<div class="row">


	</body>
</html>