<?php
require_once 'core/models.php';

if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    $pdo = new PDO('mysql:host=localhost;dbname=rafer_pdo', 'root', '');


    // Delete customer
    $sql = "DELETE FROM customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer_id]);

    header("Location: index.php"); // Redirect to home page after deletion
} else {
    die("Invalid request.");
}
?>
