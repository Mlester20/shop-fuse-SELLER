<?php

require '../includes/config.php';

$seller_id = $_SESSION['seller_id'];

$db = new Database();
$con = $db->getConnection();

try {
    $query = "
        SELECT 
            o.order_id,
            o.user_id,
            o.total,
            o.status,
            o.created_at,

            u.name AS buyer_name,
            u.email AS buyer_email,

            oi.quantity,
            oi.price,
            p.product_name
        FROM order_items oi
        INNER JOIN orders o ON oi.order_id = o.order_id
        INNER JOIN products p ON oi.product_id = p.product_id
        INNER JOIN users u ON o.user_id = u.user_id
        WHERE oi.seller_id = ?
        ORDER BY o.order_id DESC
    ";

    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $seller_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

} catch(Exception $e) {
    $error_message = $e->getMessage();
}finally{
    $db->closeConnection();
}