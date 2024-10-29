<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Your Order</h1>
    <?php $order = getOrderByID($pdo, $_GET['order_id']); ?>
    <form action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
        <p>
            <label for="quantity">Quantity</label> 
            <input type="number" name="quantity" value="<?php echo $order['quantity']; ?>" required>
            <input type="submit" name="updateOrderBtn">
        </p>
    </form>
</body>
</html>
