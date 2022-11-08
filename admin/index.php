<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$uname = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':uname', $uname, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['alogin'] = $_POST['username'];
		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";
	}
}

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>HS | Inicio de sesión del administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/morris.css" type="text/css" />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<!-- jQuery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->

	<!-- Bulma -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
	<div class="hero is-fullheight">
		<div class="hero-body is-justify-content-center is-align-items-center">
			<div class="columns is-flex is-flex-direction-column box">
				<div class="columns is-mobile is-centered">
					<div class="column is-half">
						<h1 class="title has-text-centered">Iniciar sesión</h1>
					</div>
				</div>
				<form method="post">
					<div class="column">
						<span class="username">Nombre de usuario:</span>
						<input type="text" name="username" class="name input is-primary" placeholder="" required="">
						<div class="clearfix"></div>
					</div>
					<div class="column">
						<span class="username">Contraseña:</span>
						<input type="password" name="password" class="password input is-primary" placeholder="" required="">
						<div class="clearfix"></div>
					</div>

					<div class="column">
						<input type="submit" class="login button is-primary is-fullwidth login" name="login" value="Entrar">
					</div>
					<div class="clearfix"></div>
				</form>
				<div>
					<a href="../index.php" class="login button is-secondary is-fullwidth">Volver al inicio</a>
				</div>
			</div>
		</div>
	</div>


	<div class="hero is-fullheight">
		<div class="hero-body is-justify-content-center is-align-items-center">
			<div class="columns is-flex is-flex-direction-column box">
				<div class="column">
					<label for="email">Nombre de usuario</label>
					<input class="input is-primary" type="text" placeholder="" class="name" required="">
				</div>
				<div class="column">
					<label for="Name">Contraseña</label>
					<input class="input is-primary" type="password" placeholder="" name="password" required="">
					<a href="forget.html" class="is-size-7 has-text-primary">Olvidó su contraseña?</a>
				</div>
				<div class="column">
					<input class="button is-primary is-fullwidth login" type="submit" value="Entrar">
				</div>
			</div>
		</div>
	</div>
</body>

</html>