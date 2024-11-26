<?php
// controllers/products/list.php
require_once '../../config/database.php';

$database = new Database();
$pdo = $database->getConnection();

$query = "SELECT * FROM productos";
$stmt = $pdo->prepare($query);
$stmt->execute();

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($productos);
