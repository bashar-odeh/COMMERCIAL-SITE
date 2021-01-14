<?php
session_start();
include_once '../../models/car.php';
include_once '../../dataBaseConn/connection.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "GET" ) {

    $db = new Database();
    $conn = $db->connect();
    $car = new Car($conn);
    $type = $_GET['type'];
    $result = $car->getAllCars($type);
    $num = $result->rowCount();

    if ($num > 0) {
        $all_data = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
            array_push($all_data, $data);
        }
        print_r(json_encode($all_data));
    } else {
        print_r(json_encode(array('data' => 'No Data')));
    }
}
