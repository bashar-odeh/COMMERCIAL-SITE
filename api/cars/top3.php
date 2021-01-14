<?php

header('Access-Control-Allow-Origin:* ');
header('Content-Type: application/json');
include_once '../../dataBaseConn/connection.php';
include_once '../../models/car.php';

$db = new Database();
$conn = $db->connect();
$car = new Car($conn);


$result = $car->top3();
$num = $result->rowCount();
if ($num > 0) {
    $data = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $car = array(
            'manufacturer' => $row['manufacturer'],
            'model' => $row['model'],
            'car_id' => $row['car_id'],
            'description' => $row['description'],
            'main_pic_path' => $row['main_pic_path'],
            'cost' => $row['cost'],
            'dealing_type' => $row['dealing_type']
        );
        array_push($data, $car);
    }
    print_r(json_encode($data));
} else {
    print_r(json_encode(array('data' => 'No Data')));
}
