<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit1'])) {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobileno'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$sql = "INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':fname', $fname, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query->bindParam(':subject', $subject, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$msg = "Consulta enviada con éxito";
	} else {
		$error = "Algo ha ido mal. Por favor, inténtelo de nuevo";
	}
}

?>

<?php include('includes/head.php'); ?>
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
				<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Formulario de consulta</h3>
				<form name="enquiry" method="post">
					<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
					<p style="width: 350px;">

						<b>Nombre completo</b> <input type="text" name="fname" class="form-control" id="fname" placeholder="Nombre completo" required="">
					</p>
					<p style="width: 350px;">
						<b>Email</b> <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="">
					</p>

					<p style="width: 350px;">
						<b>Número de celular</b> <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="10" placeholder="Número de celular" required="">
					</p>

					<p style="width: 350px;">
						<b>Mensaje</b> <input type="text" name="subject" class="form-control" id="subject" placeholder="Asunto" required="">
					</p>
					<p style="width: 350px;">
						<b>Descripción</b> <textarea name="description" class="form-control" rows="6" cols="50" id="description" placeholder="Descripción" required=""></textarea>
					</p>

					<p style="width: 350px;">
						<button type="submit" name="submit1" class="btn-primary btn">Enviar</button>
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