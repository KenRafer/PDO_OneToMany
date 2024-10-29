<?php  
$host = "localhost";
$user = "root";
$password = "";
$dbname = "rafer_pdo";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn, $user, $password);
?>
