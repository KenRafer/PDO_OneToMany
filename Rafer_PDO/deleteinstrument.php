<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<?php 
if (isset($_GET['instrument_id'])) {
	$delete = deleteInstrument($pdo, $_GET['instrument_id']);
	if ($delete) {
		header("Location: index.php");
	} else {
		echo "Failed to delete instrument";
	}
}
?>
