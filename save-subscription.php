<?php
require_once './config/config.php';

$data = json_decode(file_get_contents('php://input'), true);

if ($data && isset($data['endpoint']) && isset($data['keys']['auth']) && isset($data['keys']['p256dh'])) {
    $endpoint = $data['endpoint'];
    $keys_auth = $data['keys']['auth'];
    $keys_p256dh = $data['keys']['p256dh'];

    $query = "SELECT * FROM subscriptions WHERE endpoint = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $endpoint);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $query = "INSERT INTO subscriptions (endpoint, keys_auth, keys_p256dh) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('sss', $endpoint, $keys_auth, $keys_p256dh);
        $stmt->execute();
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
?>
