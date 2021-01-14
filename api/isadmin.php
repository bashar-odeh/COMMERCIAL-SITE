<?php
session_start();

header('Access-Control-Allow-Origin: *');

include_once '../dataBaseConn/connection.php';
$db = new Database();
$conn = $db->connect();
$sql = 'SELECT * FROM admin Where customer_ID = ? ';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_SESSION['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$customer_ID = $row['customer_ID'];
$num = $stmt->rowCount();
if ($num === 1) {
    if ($customer_ID === $_SESSION['id']) {
        echo json_encode(array('data' => true));
    } else {
        echo json_encode(array('data' => false));
    }
} else {
    echo json_encode(array('data' => false));
}
