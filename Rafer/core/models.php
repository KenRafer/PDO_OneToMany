<?php  

function insertWebDev($pdo, $username, $first_name, $last_name) {

	$sql = "INSERT INTO customers (username, first_name, last_name) VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $first_name, $last_name]);

	if ($executeQuery) {
		return true;
	}
}



function updateCustomer($pdo, $first_name, $last_name, $customer_id) {

	$sql = "UPDATE customers
				SET first_name = ?,
					last_name = ?,
				WHERE customer_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $customer_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteCustomer($pdo, $customer_id) {
	$deleteOrder = "DELETE FROM orders WHERE customer_id = ?";
	$deleteStmt = $pdo->prepare($deleteOrder);
	$executeDeleteQuery = $deleteStmt->execute([$customer_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM customers WHERE customer_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$customer_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllCustomers($pdo) {
	$sql = "SELECT * FROM customers";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getCustomerByID($pdo, $customer_id) {
	$sql = "SELECT * FROM customers WHERE customer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getOrdersByCustomer($pdo, $web_dev_id) {
	
	$sql = "SELECT 
				orders.order_id AS order_id,
				orders.customer_id AS customer_id,
				orders.order_name AS order_name,
				orders.date_added AS date_added,
				CONCAT(customers.first_name,' ',customers.last_name) AS customer
			FROM orders
			JOIN customers ON orders.customer_id = customers.customer_id
			WHERE orders.customer_id = ? 
			GROUP BY orders.order_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertOrder($pdo, $order_name, $customer_id) {
	$sql = "INSERT INTO orders (order_name, customer_id) VALUES (?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_name, $customer_id]);
	if ($executeQuery) {
		return true;
	}

}

function getOrderByID($pdo, $order_id) {
	$sql = "SELECT 
				orders.order_id AS order_id,
				orders.customer_id AS customer_id
				orders.order_name AS order_name,
				orders.date_added AS date_added,
				CONCAT(customers.first_name,' ',customers.last_name) AS customer
			FROM orders
			JOIN customers ON orders.customer_id = customers.customer_id
			WHERE orders.order_id  = ? 
			GROUP BY orders.order_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateOrder($pdo, $order_name, $order_id) {
	$sql = "UPDATE orders
			SET order_name = ?,
			WHERE order_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_name, $order_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteOrder($pdo, $order_id) {
	$sql = "DELETE FROM orders WHERE order_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$order_id]);
	if ($executeQuery) {
		return true;
	}
}




?>