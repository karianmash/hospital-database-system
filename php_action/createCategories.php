<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$categoriesName = $_POST['categoriesName'];
  $categoriesStatus = $_POST['categoriesStatus'];

  $companyid=$_SESSION['companyid'];

	$sql = "INSERT INTO categories (categories_name, categories_active, categories_status,companyid)
	VALUES ('$categoriesName', '$categoriesStatus', 1,'$companyid')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);

} // /if $_POST