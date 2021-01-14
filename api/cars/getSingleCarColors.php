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
    $data=array();
    $result = $car->getSingleCarColors();
    if ($result) {
      while(  $row = $result->fetch(PDO::FETCH_ASSOC)){
        $car = array(
         'path' => $row['path'],
         'color' => $row['color']
        );
array_push($data,$car);
      }
     
        print_r(json_encode($data));
    } else {
        print_r(array('data' => 'No Data'));
    }
}
