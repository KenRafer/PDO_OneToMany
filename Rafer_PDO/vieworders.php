<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Your Orders</h1>
    <a href="index.php">Return to Home</a>
    <table style="width:100%; margin-top: 50px;">
      <tr>
        <th>Order ID</th>
        <th>Instrument</th>
        <th>Quantity</th>
        <th>Order Date</th>
        <th>Action</th>
      </tr>
      <?php $orders = getOrdersByCustomer($pdo, $_GET['customer_id']); ?>
      <?php foreach ($orders as $row) { ?>
      <tr>
        <td><?php echo $row['order_id']; ?></td>
        <td><?php echo $row['instrument_name']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['order_date']; ?></td>
        <td>
            <a href="editorder.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Edit</a>
            <a href="deleteorder.php?order_id=<?php echo $row['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </table>
</body>
</html>
