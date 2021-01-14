<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../dataBaseConn/connection.php';
$db = new Database();
$conn = $db->connect();
if (isset($_SESSION['id'])) {
    $sql = 'SELECT rating FROM customer_info Where customer_ID = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$_SESSION['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $rating = $row['rating'];
    $num = $stmt->rowCount();
    if ($num === 1 && strtolower($rating) === 'admin') {
        $_SESSION['admin']=true;
        echo json_encode(array('admin' => true));
    } else {
        echo json_encode(array('user' => true));
    }
}
else{
    echo json_encode(array('login' => false));

}
