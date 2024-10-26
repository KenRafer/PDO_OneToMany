<?php require_once 'core/dbConfig.php'; ?>
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
	<h1>Welcome To Tugtugin! Buy your dream instrument here!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">Username</label> 
			<input type="text" name="username">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
        <input type="submit" name="insertCustomerBtn" value="Register">
		</p>
	</form>
	<?php $getAllCustomers = getAllCustomers($pdo); ?>
	<?php foreach ($getAllCustomers as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewcustomers.php?web_dev_id=<?php echo $row['customer_id']; ?>">View Customers</a>
			<a href="editcustomers.php?web_dev_id=<?php echo $row['customer_id']; ?>">Edit</a>
			<a href="deletecustomers.php?web_dev_id=<?php echo $row['customer_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>