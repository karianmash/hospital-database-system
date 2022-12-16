<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>

<head>

	<title>Krinika Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

	<!-- custom css -->
	<link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

	<!-- file input -->
	<link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

	<!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
	<!-- jquery ui -->
	<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
	<script src="assests/jquery-ui/jquery-ui.min.js"></script>

	<!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

	<style media="screen">
		body {
			background-color: #0b1120;
		}

		/* #nav {
			position: fixed;
			top: 0;
			left: 0;
			display: block;
			width: 9%;
			height: 100vh;
		}

		#nav2 {
			position: absolute;
			top: 5em;

			display: block;
			width: 100%;
			height: 100vh;
		} */

		.editlog {
			width: 100%;
			background-color: gray;

		}
	</style>

	<nav class="navbar navbar-default navbar-static-top" id="nav" style="background-image: linear-gradient( 76.3deg,  rgba(44,62,78,1) 12.6%, rgba(69,103,131,1) 82.8% );">
		<div class="container" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<!-- Brand and toggle get grouped for better mobile display -->
			<br>

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a class="navbar-brand" href="#">Brand</a> -->


			</div>
			<div class="editlog" style="height: 100%; background-color: transparent;">
				<!-- <a class="navbar-brand" href="#" style="padding:10px;font-family:lucinda; color: #0b1120; font-weight: 700; font-size: 3rem"> -->
				<!-- Klinika Wholesalers -->
				<!-- </a> -->
				<img src="krinika-logo.png" alt="" style="width:13rem; height: 10rem;">


			</div>
			<!-- <img src="..//krinika.jpg" width="40rem" height="40rem" alt=""> -->

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="position: relative; top: -7rem;">

				<ul class="nav navbar-nav navbar-right" id="nav2">

					<li id="navDashboard"><a href="index.php"> Reports</a></li>

					<li id="navBrand"><a href="brand.php"> Brand</a></li>


					<li id="navCategories"><a href="categories.php"> Category</a></li>
					<li id="navCategories"><a href="buyers.php"> Buyers</a></li>
					<li id="navCategories"><a href="Customers.php"> Customers</a></li>


					<li id="navProduct"><a href="product.php"> Product </a></li>
					<li id="navProduct"><a href="orders.php?o=add"> Orders </a></li>


					<!-- <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavAddOrder"><a href="orders.php?o=add">  Add Orders</a></li>

          </ul>
        </li> -->


					<!-- <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a></li> -->

					<li class="dropdown" id="navSetting">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
						<ul class="dropdown-menu" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">

							<li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
							<li id="topNavUser"><a href="user.php"> <i class="glyphicon glyphicon-wrench"></i> Add User</a></li>

							<li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
						</ul>
					</li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="container">