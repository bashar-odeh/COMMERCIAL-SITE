<?php
session_start();
include_once '../../dataBaseConn/connection.php';
include_once '../../models/admin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['admin'])) {
    $db = new Database();
    $conn = $db->connect();
    $admin = new Admin($conn);
    $type = $_POST['type'];
    
    if ($type === 'car') {
        $admin->car_id = $_POST['id'];
        echo $admin->car_id;
        echo  $admin->deleteCar();
    } else {
        $admin->customer_ID = $_POST['id'];
       echo  $admin->deleteCustomer();
    }
}
