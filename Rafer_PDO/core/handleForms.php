<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertInstrumentBtn'])) {
	$query = insertInstrument($pdo, $_POST['name'], $_POST['type'], $_POST['brand'], $_POST['price'], $_POST['description']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editInstrumentBtn'])) {
	$query = updateInstrument($pdo, $_POST['name'], $_POST['type'], $_POST['brand'], $_POST['price'], $_POST['description'], $_GET['instrument_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Edit failed";
	}
}

if (isset($_POST['deleteInstrumentBtn'])) {
	$query = deleteInstrument($pdo, $_GET['instrument_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewFeatureBtn'])) {
	$query = insertFeature($pdo, $_POST['featureName'], $_POST['details'], $_GET['instrument_id']);

	if ($query) {
		header("Location: ../viewfeatures.php?instrument_id=" . $_GET['instrument_id']);
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editFeatureBtn'])) {
	$query = updateFeature($pdo, $_POST['featureName'], $_POST['details'], $_GET['feature_id']);

	if ($query) {
		header("Location: ../viewfeatures.php?instrument_id=" . $_GET['instrument_id']);
	} else {
		echo "Update failed";
	}
}

if (isset($_POST['deleteFeatureBtn'])) {
	$query = deleteFeature($pdo, $_GET['feature_id']);

	if ($query) {
		header("Location: ../viewfeatures.php?instrument_id=" . $_GET['instrument_id']);
	} else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertCustomerBtn'])) {
    $query = insertCustomer($pdo, $_POST['username'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['updateCustomerBtn'])) {
    $query = updateCustomer($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_GET['customer_id']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Update failed";
    }
}

if (isset($_POST['deleteCustomerBtn'])) {
    $query = deleteCustomer($pdo, $_GET['customer_id']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

if (isset($_POST['placeOrderBtn'])) {
    $query = placeOrder($pdo, $_POST['customer_id'], $_POST['instrument_id'], $_POST['quantity']);
    if ($query) {
        header("Location: ../vieworders.php?customer_id=" . $_POST['customer_id']);
    } else {
        echo "Order placement failed";
    }
}

if (isset($_POST['updateOrderBtn'])) {
    $query = updateOrder($pdo, $_POST['order_id'], $_POST['quantity']);
    if ($query) {
        header("Location: ../vieworders.php?customer_id=" . $_POST['customer_id']);
    } else {
        echo "Order update failed";
    }
}

if (isset($_POST['deleteOrderBtn'])) {
    $query = deleteOrder($pdo, $_POST['order_id']);
    if ($query) {
        header("Location: ../vieworders.php?customer_id=" . $_POST['customer_id']);
    } else {
        echo "Order deletion failed";
    }
}

?>
