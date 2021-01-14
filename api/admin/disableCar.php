<?php
include_once '../../dataBaseConn/connection.php';
include_once '../../models/admin.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['admin'])) {
    $db = new Database();
    $conn = $db->connect();
    $admin = new Admin($conn);
    $admin->car_id = $_GET['id'];
    echo $admin->disableCar();
}
