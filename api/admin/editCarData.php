<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/text');
include_once '../../dataBaseConn/connection.php';
include_once '../../models/admin.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_SESSION['admin'])) {
    $db = new Database();
    $conn = $db->connect();
    $admin = new Admin($conn);
    $car_id = $_GET['id'];
    $admin->car_id = $car_id;
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $rating  = $_POST['rating'];
    $cost  = $_POST['cost'];
    $description  = $_POST['description'];
    $flag = true;
    if (intval($rating) === 0) {
        $flag = false;
    } else if (empty($rating)) {
        $flag = true;
      
    }
  
    if (empty($manufacturer) || empty($model) || $flag || empty($cost)) {
        echo 'empty';
    } else {
        $admin->manufacturer = $manufacturer;
        $admin->model = $model;
        $admin->rating = $rating;
        $admin->description = $description;
        $admin->cost = $cost;
        echo $admin->updateCar();
    }
}
