<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php


if ($_POST) {

	$username = $_POST['username'];
	$email = $_POST['email'];

	$pas = $_POST['pass'];

	$companyid = $_SESSION['companyid'];


	$sql = "INSERT INTO users (username, password, email,companyid)
    VALUES ('$username', '$pas','$email','$companyid')";

	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}



	echo json_encode($valid);
} // /if $_POST



?>
<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<li><a href="dashboard.php">Home</a></li>
			<li class="active">User</li>
		</ol>

		<div class="panel panel-default" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
			<div class="panel-heading" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage User</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add User </button>
				</div> <!-- /div-action -->

				<table class="table" id="manageUserTable">
					<thead>
						<tr>
							<th style="width:10%;">User Name</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
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
						<label for="categoriesName" class="col-sm-4 control-label">User Name: </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="categoriesName" placeholder="User name" name="username" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label for="categoriesName" class="col-sm-4 control-label">User Email: </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="email" class="form-control" id="categoriesName" placeholder="User email" name="email" autocomplete="off">
						</div>
					</div> <!-- /form-group-->
					<div class="form-group">
						<label for="categoriesName" class="col-sm-4 control-label">Password: </label>
						<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="categoriesName" placeholder="Pass" name="pass" autocomplete="off">
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


<!-- edit categories brand -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Edit User</h4>
			</div>
			<div class="modal-body" style="max-height:450px; overflow:auto;">

				<div class="div-loading">
					<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<span class="sr-only">Loading...</span>
				</div>

				<div class="div-result">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#userInfo" aria-controls="profile" role="tab" data-toggle="tab">User Info</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">



						<!-- product image -->
						<div role="tabpanel" class="tab-pane active" id="userInfo">

						</div>
						<!-- /product info -->
					</div>

				</div>

			</div> <!-- /modal-body -->


		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove User</h4>
			</div>
			<div class="modal-body">

				<div class="removeUserMessages"></div>

				<p>Do you really want to remove ?</p>
			</div>
			<div class="modal-footer removeProductFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				<button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>