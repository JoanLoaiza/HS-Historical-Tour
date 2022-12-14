<?php
session_start();
if (isset($_POST['signin'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['login'] = $_POST['email'];
		echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
	} else {

		echo "<script>alert('Datos no válidos');</script>";
	}
}

?>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<section>
				<div class="modal-body modal-spa">
					<div class="login-grids">
						<div class="login">
							<div class="login-right">
								<form method="post">
									<h3>Iniciar sesión con su cuenta </h3>
									<input type="text" name="email" id="email" placeholder="Ingresa tu Email" required="">
									<input type="password" name="password" id="password" placeholder="Contraseña" value="" required="">
									<h4><a href="forgot-password.php">¿Olvidó su contraseña?</a></h4>
									<input type="submit" name="signin" value="Iniciar sesión">
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
						<p>Al iniciar sesión, aceptas nuestros <a href="page.php?type=terms">Términos, condiciones</a> y <a href="page.php?type=privacy">Política de privacidad</a></p>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>