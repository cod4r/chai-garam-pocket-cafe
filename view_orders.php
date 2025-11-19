<?php
header("Content-Type: application/json");
include "db.php";

$sql = "
SELECT o.id, o.customer_name, o.total_amount, o.order_date, o.status,
       GROUP_CONCAT(CONCAT(oi.item_name, ' x ', oi.quantity) SEPARATOR ', ') AS items
FROM orders o
JOIN order_items oi ON o.id = oi.order_id
GROUP BY o.id
ORDER BY o.order_date DESC";

$result = $conn->query($sql);

$orders = [];

while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode($orders);
?>