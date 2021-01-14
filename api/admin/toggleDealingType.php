<?php
include_once '../../dataBaseConn/connection.php';
include_once '../../models/admin.php';
session_start();
 if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['admin'])) {
    $db = new Database();
    $conn = $db->connect();
    $admin = new Admin($conn);
    $car_id = $_GET['id'];
    $dealing = $_GET['dealing'];
    $admin->car_id = $car_id;
    $admin->dealing_type = abs($dealing - 1);
        echo $admin->toggleDealing();
    
}
