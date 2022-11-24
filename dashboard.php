<?php require_once 'includes/header.php'; ?>

<?php
$companyid = $_SESSION['companyid'];

$sql = "SELECT * FROM product WHERE status = 1 AND companyid='$companyid'";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1 AND address='$companyid'";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue += $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1 AND companyid='$companyid'";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$userwisesql = "SELECT users.username , SUM(orders.total_amount) as totalorder FROM orders INNER JOIN users ON orders.user_id = users.user_id  WHERE orders.payment_status = 1 AND users.companyid='$companyid'  GROUP BY orders.user_id ";
$userwiseQuery = $connect->query($userwisesql);
$userwieseOrder = $userwiseQuery->num_rows;

$defaulter = "SELECT users.username , SUM(orders.grand_total) as totalorder FROM orders INNER JOIN users ON orders.user_id = users.user_id  WHERE orders.payment_status = 3 AND users.companyid='$companyid'  GROUP BY orders.user_id ";
$defaulterquery = $connect->query($defaulter);
$defaulterorder = $defaulterquery->num_rows;

$pending = "SELECT users.username , SUM(orders.grand_total) as totalorder FROM orders INNER JOIN users ON orders.user_id = users.user_id  WHERE orders.payment_status = 2 AND users.companyid='$companyid'  GROUP BY orders.user_id ";
$pendingquery = $connect->query($pending);
$pendingorder = $defaulterquery->num_rows;

$tobuy = "SELECT * FROM product WHERE product.quantity <= 10  GROUP BY product.product_name";
$tobuyquery = $connect->query($tobuy);
$tobuyorder = $tobuyquery->num_rows;

$connect->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
<br><br>
<div class="" style="width: 100%;text-align:center; background-image: linear-gradient( 95.2deg, rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
	<p style="color:black;font-size: 50px">Reports</p>
</div>

<div class="col-md-4">
	<div class="card">
		<div class="cardHeader" style="background-color:gray">
			<h1><?php echo date('d'); ?></h1>
		</div>

		<div class="cardContainer">
			<p><?php echo date('l') . ' ' . date('d') . ', ' . date('Y'); ?></p>
		</div>
	</div>
	<br />

	<div class="card">
		<div class="cardHeader" style="background-color:gray">
			<h1><?php if ($totalRevenue) {
					echo $totalRevenue;
				} else {
					echo '0';
				} ?></h1>
		</div>

		<div class="cardContainer">
			<p> Total Revenue</p>
		</div>
	</div>

</div>
<br><br>
<div class="row">

	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">

				<a href="product.php" style="text-decoration:none;color:black;">
					Total Product
					<span class="badge pull pull-right"><?php echo $countProduct; ?></span>
				</a>

			</div>
			<!--/panel-hdeaing-->
		</div>
		<!--/panel-->
	</div>
	<!--/col-md-4-->

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="product.php" style="text-decoration:none;color:black;">
					Low Stock
					<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>
				</a>

			</div>
			<!--/panel-hdeaing-->
		</div>
		<!--/panel-->
	</div>
	<!--/col-md-4-->



	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#" style="text-decoration:none;color:black;">
					Total Orders
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>

			</div>
			<!--/panel-hdeaing-->
		</div>
		<!--/panel-->
		<br><br><br><br><br>
	</div>
	<!--/col-md-4-->






	<div class="col-md-8">
		<div class="panel panel-default" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<div class="panel-heading" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );"> <i class="glyphicon glyphicon-calendar"></i> Payments Paid</div>
			<div class="panel-body">
				<table class="table" id="productTable">
					<thead>
						<tr>
							<th style="width:40%;">Name</th>
							<th style="width:20%;">Fully paid in Dollars</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($orderResult = $userwiseQuery->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $orderResult['username'] ?></td>
								<td><?php echo $orderResult['totalorder'] ?></td>

							</tr>

						<?php } ?>
					</tbody>
				</table>
				<!--<div id="calendar"></div>-->
			</div>
		</div>

	</div>

	<div class="col-md-8">
		<div class="panel panel-default" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<div class="panel-heading" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );"> <i class="glyphicon glyphicon-calendar"></i> Defaulter Report</div>
			<div class="panel-body">
				<table class="table" id="productTable">
					<thead>
						<tr>
							<th style="width:40%;">Name</th>
							<th style="width:20%;">Unpaid in Dollars</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($orderResult = $defaulterquery->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $orderResult['username'] ?></td>
								<td><?php echo $orderResult['totalorder'] ?></td>

							</tr>

						<?php } ?>
					</tbody>
				</table>
				<!--<div id="calendar"></div>-->
			</div>
		</div>

	</div>
	<div class="col-md-8">
		<div class="panel panel-default" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<div class="panel-heading" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );"> <i class="glyphicon glyphicon-calendar"></i> Pending payment Report</div>
			<div class="panel-body">
				<table class="table" id="productTable">
					<thead>
						<tr>
							<th style="width:40%;">Name</th>
							<th style="width:20%;">Pending in Dollars</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($orderResult = $pendingquery->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $orderResult['username'] ?></td>
								<td><?php echo $orderResult['totalorder'] ?></td>

							</tr>

						<?php } ?>
					</tbody>
				</table>
				<!--<div id="calendar"></div>-->
			</div>
		</div>

	</div>
	<div class="col-md-8">
		<div class="panel panel-default" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<div class="panel-heading" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );"> <i class="glyphicon glyphicon-calendar"></i> Orders to buy Report</div>
			<div class="panel-body">
				<table class="table" id="productTable">
					<thead>
						<tr>
							<th style="width:40%;">Name</th>
							<th style="width:20%;">Quantity left</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($orderResult = $tobuyquery->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $orderResult['product_name'] ?></td>
								<td><?php echo $orderResult['quantity'] ?></td>

							</tr>

						<?php } ?>
					</tbody>
				</table>
				<!--<div id="calendar"></div>-->
			</div>
		</div>

	</div>


</div>
<!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function() {
		// top bar active
		$('#navDashboard').addClass('active');

		//Date for the calendar events (dummy data)
		var date = new Date();
		var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: '',
				center: 'title'
			},
			buttonText: {
				today: 'today',
				month: 'month'
			}
		});


	});
</script>

<?php require_once 'includes/footer.php'; ?>