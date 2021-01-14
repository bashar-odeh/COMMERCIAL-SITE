<?php
session_start();
include_once '../../models/car.php';
include_once '../../dataBaseConn/connection.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $db = new Database();
    $conn = $db->connect();
    $car = new Car($conn);
    $car_id = $_GET['id'];
    $car->car_id=$car_id;
    $result = $car->getSingleCar();
    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $data = array(
            'car_id' => $row['car_id'],
            'manufacturer' => $row['manufacturer'],
            'model' => $row['model'],
            'status' => $row['status'],
            'rating' => $row['rating'],
            'description' => $row['description'],
            'dealing_type' => $row['dealing_type'],
            'cost' => $row['cost'],
            'main_pic_path' => $row['main_pic_path']

        );

        print_r(json_encode($data));
    } else {
        print_r(array('data' => 'No Data'));
    }
}
