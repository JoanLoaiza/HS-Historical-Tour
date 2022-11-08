<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	if (isset($_POST['submit6'])) {
		$name = $_POST['name'];
		$mobileno = $_POST['mobileno'];
		$email = $_SESSION['login'];

		$sql = "update tblusers set FullName=:name,MobileNumber=:mobileno where EmailId=:email";
		$query = $dbh->prepare($sql);
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$msg = "Perfil actualizado con éxito!";
	}

?>
	<?php
	include('includes/head.php');
	?>

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
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Cambiar contraseña</h3>
					<form name="chngpwd" method="post">
						<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

						<?php
						$useremail = $_SESSION['login'];
						$sql = "SELECT * from tblusers where EmailId=:useremail";
						$query = $dbh->prepare($sql);
						$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						$cnt = 1;
						if ($query->rowCount() > 0) {
							foreach ($results as $result) {	?>
								<p style="width: 350px;">
									<b>Nombre</b> <input type="text" name="name" value="<?php echo htmlentities($result->FullName); ?>" class="form-control" id="name" required="">
								</p>
								<p style="width: 350px;">
									<b>Númbero de celular</b>
									<input type="text" class="form-control" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber); ?>" id="mobileno" required="">
								</p>
								<p style="width: 350px;">
									<b>Email</b>
									<input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->EmailId); ?>" id="email" readonly>
								</p>
								<p style="width: 350px;">
									<b>Fecha de última actualización : </b>
									<?php echo htmlentities($result->UpdationDate); ?>
								</p>
								<p style="width: 350px;">
									<b>Fecha de registro :</b>
									<?php echo htmlentities($result->RegDate); ?>
								</p>
						<?php }
						} ?>
						<p style="width: 350px;">
							<button type="submit" name="submit6" class="btn-primary btn">Actualizar</button>
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
<?php } ?>