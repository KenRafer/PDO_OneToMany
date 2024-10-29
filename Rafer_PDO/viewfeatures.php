<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Features</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $instrument = getInstrumentByID($pdo, $_GET['instrument_id']); ?>
	<h1>Instrument: <?php echo $instrument['name']; ?></h1>
	<h1>Add New Feature</h1>
	<form action="core/handleForms.php?instrument_id=<?php echo $_GET['instrument_id']; ?>" method="POST">
		<p>
			<label for="featureName">Feature Name</label> 
			<input type="text" name="featureName">
		</p>
		<p>
			<label for="details">Details</label> 
			<input type="text" name="details">
			<input type="submit" name="insertNewFeatureBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Feature ID</th>
	    <th>Feature Name</th>
	    <th>Details</th>
	    <th>Action</th>
	  </tr>
	  <?php $features = getFeaturesByInstrument($pdo, $_GET['instrument_id']); ?>
	  <?php foreach ($features as $feature) { ?>
	  <tr>
	  	<td><?php echo $feature['feature_id']; ?></td>	  	
	  	<td><?php echo $feature['feature_name']; ?></td>	  	
	  	<td><?php echo $feature['details']; ?></td>
	  	<td>
	  		<a href="editfeature.php?feature_id=<?php echo $feature['feature_id']; ?>&instrument_id=<?php echo $_GET['instrument_id']; ?>">Edit</a>
	  		<a href="deletefeature.php?feature_id=<?php echo $feature['feature_id']; ?>&instrument_id=<?php echo $_GET['instrument_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>
</body>
</html>
