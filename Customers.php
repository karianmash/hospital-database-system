<?php
require_once 'includes/header.php';

if ($_POST) {

	$buyername = $_POST['buyername'];
	$buyeraddress = $_POST['buyeraddress'];

	$stock = $_POST['stock'];
	$sql = "SELECT * FROM buyers where buyer_name = '$buyername'";
	$result = $connect->query($sql);
	if ($result->num_rows < 1) {
		$sql = "INSERT INTO buyers (buyer_name, buyer_address, productname)
    VALUES ('$buyername', '$buyeraddress','$stock')";

		if ($connect->query($sql) === TRUE) {
			$valid['success'] = true;
			$valid['messages'] = "Successfully Added";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while adding the members";
		}



		echo json_encode($valid);
	} else {
		echo "<script> alert('Buyer present, Please choose a different buyer')</script>";
	}
} // /if $_POST

?>

<br><br>
<div class="" style="width: 100%;text-align:center;background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
	<p style="color:black;font-size: 50px">Customers</p>
</div>
<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<li><a href="dashboard.php">Home</a></li>
			<li class="active">Customers</li>
		</ol>

		<div class="panel panel-default" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<div class="panel-heading" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage customers</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<!-- <div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Categories </button>
				</div> /div-action -->

				<table class="table" id="manageCategoriesTable">
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Customer contact</th>
							<th>Customer address</th>
							<th>Due</th>
							<th>Total Price</th>

						</tr>
						<?php
						$sql = "SELECT * FROM orders";
						$result = $connect->query($sql);
						while ($row = $result->fetch_array()) {
						?>
							<tr>
								<th><?php echo $row['client_name'] ?></th>
								<th><?php echo $row['client_contact'] ?></th>
								<th><?php echo $row['address'] ?></th>
								<th><?php echo $row['due'] ?></th>
								<th><?php echo $row['total_amount'] ?></th>

							</tr>
						<?php } ?>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add categories -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="submitCategoriesForm" action="" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add Categories</h4>
				</div>
				<div class="modal-body">

					<div id="add-categories-messages"></div>

					<div class="form-group">
						<label for="categoriesName" class="col-sm-4 control-label">Buyer Name: </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="categoriesName" placeholder="Buyer name" name="buyername" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label for="categoriesName" class="col-sm-4 control-label">Buyer address: </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="categoriesName" placeholder="Buyer address" name="buyeraddress" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label for="categoriesName" class="col-sm-4 control-label">Stock: </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="categoriesName" placeholder="Stock" name="stock" autocomplete="off">
						</div>
					</div> <!-- /form-group-->




				</div> <!-- /modal-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

					<button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				</div> <!-- /modal-footer -->
			</form> <!-- /.form -->
		</div> <!-- /modal-content -->
	</div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->




<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Brand</h4>
			</div>
			<div class="modal-body">
				<p>Do you really want to remove ?</p>
			</div>
			<div class="modal-footer removeCategoriesFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				<button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->




<?php require_once 'includes/footer.php'; ?>