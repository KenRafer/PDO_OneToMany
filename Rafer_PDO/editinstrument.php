<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Instrument</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $instrument = getInstrumentByID($pdo, $_GET['instrument_id']); ?>
	<h1>Edit Instrument</h1>
	<form action="core/handleForms.php?instrument_id=<?php echo $_GET['instrument_id']; ?>" method="POST">
		<p>
			<label for="name">Name</label> 
			<input type="text" name="name" value="<?php echo $instrument['name']; ?>">
		</p>
		<p>
			<label for="type">Type</label> 
			<input type="text" name="type" value="<?php echo $instrument['type']; ?>">
		</p>
		<p>
			<label for="brand">Brand</label> 
			<input type="text" name="brand" value="<?php echo $instrument['brand']; ?>">
		</p>
		<p>
			<label for="price">Price</label> 
			<input type="number" step="0.01" name="price" value="<?php echo $instrument['price']; ?>">
		</p>
		<p>
			<label for="description">Description</label> 
			<input type="text" name="description" value="<?php echo $instrument['description']; ?>">
			<input type="submit" name="editInstrumentBtn" value="Save Changes">
		</p>
	</form>
</body>
</html>
