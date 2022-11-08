<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<?php include ('./includes/head.php')?>


<body>
	<?php include('includes/header.php'); ?>
	<div class="banner">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> HS | Historical Tour</h1>
		</div>
	</div>


	<!--- rupes ---->
	<div class="container">
		<div class="rupes">
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-usd"></i></a>
				</div>
				<div class="rup-rgt">
					<h3>HASTA USD. 50 DE DESCUENTO</h3>
					<h4><a href="offers.html">VIAJE INTELIGENTE</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-h-square"></i></a>
				</div>
				<div class="rup-rgt">
					<h3>HASTA EL 70% DE DESCUENTO</h3>
					<h4><a href="offers.html">EN HOTELES DE TODO EL MUNDO</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-mobile"></i></a>
				</div>
				<div class="rup-rgt">
					<h3>DESCUENTO DE 50 USD.</h3>
					<h4><a href="offers.html">OFERTAS EN LA APP.</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
	<!--- /rupes ---->

	<!---holiday---->
	<div class="container">
		<div class="holiday">
			<h3>Lista de paquetes</h3>
			<?php $sql = "SELECT * from tbltourpackages order by rand() limit 4";
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
							<h4>Package Name: <?php echo htmlentities($result->PackageName); ?></h4>
							<h6>Package Type : <?php echo htmlentities($result->PackageType); ?></h6>
							<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
							<p><b>Features</b> <?php echo htmlentities($result->PackageFetures); ?></p>
						</div>
						<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
							<h5>USD <?php echo htmlentities($result->PackagePrice); ?></h5>
							<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="view">Details</a>
						</div>
						<div class="clearfix"></div>
					</div>

			<?php }
			} ?>
			<div><a href="package-list.php" class="view">Ver más paquetes</a></div>
		</div>
		<div class="clearfix"></div>
	</div>

	<!--- routes ---->
	<div class="routes">
		<div class="container">
			<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
				<div class="rou-left">
					<a href="#"><i class="glyphicon glyphicon-list-alt"></i></a>
				</div>
				<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
					<h3>800000</h3>
					<p>Consultas</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 routes-left">
				<div class="rou-left">
					<a href="#"><i class="fa fa-user"></i></a>
				</div>
				<div class="rou-rgt">
					<h3>1900</h3>
					<p>Usuarios registrados</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
				<div class="rou-left">
					<a href="#"><i class="fa fa-ticket"></i></a>
				</div>
				<div class="rou-rgt">
					<h3>7,00,00,000+</h3>
					<p>Reservas</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

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