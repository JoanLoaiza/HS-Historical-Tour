<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit50'])) {
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$newpassword = md5($_POST['newpassword']);
	$sql = "SELECT EmailId FROM tblusers WHERE EmailId=:email and MobileNumber=:mobile";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$con = "update tblusers set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
		$chngpwd1 = $dbh->prepare($con);
		$chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
		$chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
		$chngpwd1->execute();
		$msg = "Su contraseña ha sido cambiada con éxito";
	} else {
		$error = "La dirección de correo electrónico o el número de móvil no son válidos";
	}
}

?>

	<?php include('includes/head.php'); ?>
	<script type="text/javascript">
		function valid() {
			if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
				alert("New Password and Confirm Password Field do not match  !!");
				document.chngpwd.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
</head>

<body>
	<!-- top-header -->
	<div class="top-header">
		<?php include('includes/header.php'); ?>
		<div class="banner-1 ">
			<div class="container">
				<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">HS | Historical Tour</h1>
			</div>
		</div>
		<!--- /banner-1 ---->
		<!--- privacy ---->
		<div class="privacy">
			<div class="container">
				<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Recuperar la contraseña</h3>
				<form name="chngpwd" method="post" onSubmit="return valid();">
					<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
					<p style="width: 350px;">

						<b>Email</b> <input type="email" name="email" class="form-control" id="email" placeholder="Reg Email id" required="">
					</p>

					<p style="width: 350px;">

						<b>Número de celular</b> <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Númeor de celular" required="">
					</p>

					<p style="width: 350px;">
						<b>Nueva contraseña</b>
						<input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Nueva contraseña" required="">
					</p>

					<p style="width: 350px;">
						<b>Confirmar contraseña</b>
						<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirmar contraseña" required="">
					</p>

					<p style="width: 350px;">
						<button type="submit" name="submit50" class="btn-primary btn">Cambiar</button>
					</p>
				</form>


			</div>
		</div>
		<!--- /privacy ---->
		<!--- footer-top ---->
		<!--- /footer-top ---->
		<?php include('includes/footer.php'); ?>
		<!-- signup -->
		<?php include('includes/signup.php'); ?>
		<!-- //signu -->
		<!-- signin -->
		<?php include('includes/signin.php'); ?>
		<!-- //signin -->
		<!-- write us -->
		<?php include('includes/write-us.php'); ?>
</body>

</html>