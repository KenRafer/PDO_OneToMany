<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Musical Instruments</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome to Tugtugin!</h1>
	<form action="core/handleForms.php" method="POST">

    <p>
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </p>
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </p>
        <input type="submit" name="insertCustomerBtn" value="Add Customer">
    </form>

    <!-- Display Customers -->
    <h2>Customers List</h2>
    <?php $getAllCustomers = getAllCustomers($pdo); ?>
    <?php foreach ($getAllCustomers as $customer) { ?>
    <div class="customer-container" style="border: 1px solid; margin: 10px; padding: 10px;">
        <h3>Username: <?php echo $customer['username']; ?></h3>
        <h3>First Name: <?php echo $customer['first_name']; ?></h3>
        <h3>Last Name: <?php echo $customer['last_name']; ?></h3>
        <h3>Email: <?php echo $customer['email']; ?></h3>
        <h3>Date Joined: <?php echo $customer['date_added']; ?></h3>
        <div>
            <a href="editcustomer.php?customer_id=<?php echo $customer['customer_id']; ?>">Edit</a>
            <a href="deletecustomer.php?customer_id=<?php echo $customer['customer_id']; ?>">Delete</a>
        </div>
    </div>
    <?php } ?>

		<p>
			<label for="instrumentName">Instrument Name</label> 
			<input type="text" name="instrumentName">
		</p>
		<p>
			<label for="brand">Brand</label> 
			<input type="text" name="brand">
		</p>
		<p>
			<label for="type">Type</label> 
			<input type="text" name="type">
		</p>
		<p>
			<label for="price">Price</label> 
			<input type="number" step="0.01" name="price">
			<input type="submit" name="insertInstrumentBtn" value="Add Instrument">
		</p>
	</form>
    <h2>Instruments List</h2>
	<?php $allInstruments = getAllInstruments($pdo); ?>
	<?php foreach ($allInstruments as $instrument) { ?>
	<div class="container" style="border: 1px solid; width: 50%; padding: 20px; margin-top: 20px;">
		<h3>Instrument: <?php echo $instrument['name']; ?></h3>
		<h3>Brand: <?php echo $instrument['brand']; ?></h3>
		<h3>Type: <?php echo $instrument['type']; ?></h3>
		<h3>Price: $<?php echo $instrument['price']; ?></h3>

		<div class="editAndDelete" style="float: right;">
			<a href="viewfeatures.php?instrument_id=<?php echo $instrument['instrument_id']; ?>">View Features</a>
			<a href="editinstrument.php?instrument_id=<?php echo $instrument['instrument_id']; ?>">Edit</a>
			<a href="deleteinstrument.php?instrument_id=<?php echo $instrument['instrument_id']; ?>">Delete</a>
		</div>
	</div>
	<?php } ?>
</body>
</html>
