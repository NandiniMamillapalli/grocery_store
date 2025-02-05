<?php
session_start();
header('Content-Type: application/json');

require_once 'config/db.php';

// Read JSON body
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['username'])) {
    echo json_encode(['success' => false, 'message' => 'Username missing']);
    exit;
}

try {
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE username = ?");
    $stmt->execute([$data['username']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode([
            'success' => true,
            'user' => [
                'username' => $user['username'],
                'email' => $user['email']
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error fetching user']);
}
?>
