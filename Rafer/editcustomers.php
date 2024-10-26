<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getCustomerByID = getCustomerByID($pdo, $_GET['customer_id']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?web_dev_id=<?php echo $_GET['customer_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getCustomerByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getCustomerByID['last_name']; ?>">
		</p>
		<p>
			<input type="submit" name="editCustomerBtn">
		</p>
	</form>
</body>
</html>