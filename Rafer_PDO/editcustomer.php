<?php
require_once 'core/models.php';

if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    $pdo = new PDO('mysql:host=localhost;dbname=rafer_pdo', 'root', '');


    // Fetch customer details
    $sql = "SELECT * FROM customers WHERE customer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer_id]);
    $customer = $stmt->fetch();

    if (!$customer) {
        die("Customer not found.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update customer details
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        
        $updateSql = "UPDATE customers SET username = ?, first_name = ?, last_name = ?, email = ? WHERE customer_id = ?";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->execute([$username, $first_name, $last_name, $email, $customer_id]);
        
        header("Location: index.php"); // Redirect to home page after update
    }
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Customer</h1>
    <form action="" method="POST">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($customer['username']); ?>" required>
        </p>
        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($customer['first_name']); ?>" required>
        </p>
        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($customer['last_name']); ?>" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required>
        </p>
        <input type="submit" value="Update Customer">
    </form>
</body>
</html>
