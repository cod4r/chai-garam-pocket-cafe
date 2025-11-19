<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$customer = $data["customer_name"];
$items = $data["cart_items"];

if (!$customer || empty($items)) {
    echo json_encode(["success" => false, "message" => "Invalid order data"]);
    exit;
}

// Calculate total
$total = 0;
foreach ($items as $it) {
    $total += $it["price"] * $it["qty"];
}

// Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (customer_name, total_amount) VALUES (?, ?)");
$stmt->bind_param("sd", $customer, $total);
$stmt->execute();

$order_id = $stmt->insert_id;

// Insert order_items
foreach ($items as $it) {
    $name = $it["name"];
    $price = $it["price"];
    $qty = $it["qty"];

    $stmt2 = $conn->prepare("INSERT INTO order_items (order_id, item_name, unit_price, quantity) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("isdi", $order_id, $name, $price, $qty);
    $stmt2->execute();
}

echo json_encode(["success" => true, "order_id" => $order_id]);
?>