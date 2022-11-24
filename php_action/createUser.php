<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$userName 		= $_POST['userName'];
  $upassword 			= ($_POST['upassword']);
  $uemail 			= $_POST['uemail'];
  $companyid=$_SESSION['companyid'];


				$sql = "INSERT INTO users (username, password,companyid)
				VALUES ('$userName', '$upassword' ,'$companyid')";
				$connect->query($sql) === TRUE
				// if($connect->query($sql) === TRUE) {
				// 	$valid['success'] = true;
				// 	$valid['messages'] = "Successfully Added";
				// } else {
				// 	$valid['success'] = false;
				// 	$valid['messages'] = "Error while adding the members";
				// }

				// /else

	} // if in_array

	$connect->close();

	// echo json_encode($valid);
