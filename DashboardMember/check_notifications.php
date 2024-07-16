<?php
session_start();
require_once '../config/config.php';

try {
    if (isset($_SESSION["signIn"])) {
        $booksCloseToDueDate = getBooksCloseToDueDate($_SESSION['member']['nisn']);
        header('Content-Type: application/json');
        echo json_encode($booksCloseToDueDate);
    } else {
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode(['error' => 'Unauthorized']);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => 'Internal Server Error']);
}
?>
