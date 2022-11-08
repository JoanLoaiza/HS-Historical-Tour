<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<?php
include('includes/head.php');
?>


<body>
	<?php include('includes/header.php'); ?>
	<div class="banner-1 ">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> HS | Historical Tour</h1>
		</div>
	</div>
	<!--- /banner-1 ---->
	<!--- contact ---->
	<div class="contact">
		<div class="container">
			<h3> Confirmación</h3>
			<div class="col-md-10 contact-left">
				<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
					<h4> <?php echo htmlentities($_SESSION['msg']); ?></h4>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--- /contact ---->
		<?php include('includes/footer.php'); ?>
		<!-- sign -->
		<?php include('includes/signup.php'); ?>
		<!-- signin -->
		<?php include('includes/signin.php'); ?>
		<!-- //signin -->
		<!-- write us -->
		<?php include('includes/write-us.php'); ?>
		<!-- //write us -->
</body>

</html>