<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<?php include('./includes/head.php') ?>

<body>
	<?php include('includes/header.php'); ?>
	<!--- banner ---->
	<div class="banner-3">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> HS | Lista de paquetes</h1>
		</div>
	</div>
	<!--- /banner ---->
	<!--- rooms ---->
	<div class="rooms">
		<div class="container">

			<div class="room-bottom">
				<h3>Lista de paquetes</h3>


				<?php $sql = "SELECT * from tbltourpackages";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $result) {	?>
						<div class="rom-btm">
							<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
								<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
							</div>
							<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
								<h4>Nombre del paquete : <?php echo htmlentities($result->PackageName); ?></h4>
								<h6>Tipo de paquete : <?php echo htmlentities($result->PackageType); ?></h6>
								<p><b>Ubicación del paquete :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
								<p><b>Características</b> <?php echo htmlentities($result->PackageFetures); ?></p>
							</div>
							<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
								<h5>USD <?php echo htmlentities($result->PackagePrice); ?></h5>
								<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="view">Details</a>
							</div>
							<div class="clearfix"></div>
						</div>
				<?php }
				} ?>
			</div>
		</div>
	</div>
	<!--- /rooms ---->

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
	<!-- //write us -->
</body>

</html>