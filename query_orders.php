<?php
require_once 'MysqliDb.php';

/**
 * Connect to MySQL database
 */
$db = new MysqliDb ('host', 'username', 'password', 'databaseName');

/**
 * Get email from request
 */
$email = json_decode(file_get_contents('php://input'), true)['email'];


/**
 * Get orders from last 30 days, where user email matches the one from request, and join with users table§
 */
$db->join('orders o', 'o.user_id=u.id', 'INNER');
$db->where('u.email', $email);
$db->where('o.date', date('Y-m-d', strtotime('-30 days')), '>=');

$orders = $db->get('users u', null, 'o.product, o.date');

if ($db->count > 0) {
    $payload['orders'] = $orders;
    $payload['count'] = $db->count;
    $payload['message'] = 'Ordini recenti trovati.';
} else {
    $payload['message'] = 'Non ci sono ordini recenti.';
}

header('Content-Type: application/json');
echo json_encode($payload);
