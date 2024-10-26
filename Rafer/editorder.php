<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewcustomers.php?customer_id=<?php echo $_GET['customer_id']; ?>">
	View The Orders</a>
	<h1>Edit the Orders!</h1>
	<?php $getOrderByID = getOrderByID($pdo, $_GET['order_id']); ?>
	<form action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>
	&customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
		<p>
			<label for="firstName">Order</label> 
			<input type="text" name="orderName" 
			value="<?php echo $getOrderByID['order_name']; ?>">
		</p>
		<p>
			<input type="submit" name="editOrderBtn">
		</p>
	</form>
</body>
</html>