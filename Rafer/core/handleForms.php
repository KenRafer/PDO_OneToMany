<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertCustomerBtn'])) {

	$query = insertWebDev($pdo, $_POST['username'], $_POST['firstName'], 
		$_POST['lastName']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editCustomerBtn'])) {
	$query = updateWebDev($pdo, $_POST['firstName'], $_POST['lastName'],  $_GET['customer_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteCustomerBtn'])) {
	$query = deleteWebDev($pdo, $_GET['customer_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewOrdertBtn'])) {
	$query = insertOrder($pdo, $_POST['orderName'], $_GET['customer_id']);

	if ($query) {
		header("Location: ../viewcustomers.php?web_dev_id=" .$_GET['customer_id']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editOrderBtn'])) {
	$query = updateOrder($pdo, $_POST['orderName'], $_GET['order_id']);

	if ($query) {
		header("Location: ../viewcustomers.php?web_dev_id=" .$_GET['customer_id']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteOrderBtn'])) {
	$query = deleteOrder($pdo, $_GET['order_id']);

	if ($query) {
		header("Location: ../viewcustomers.php?web_dev_id=" .$_GET['customer_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>