<?php

include_once '../../models/car.php';
include_once '../../dataBaseConn/connection.php';
session_start();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $db = new Database();
    $conn = $db->connect();
    $car = new Car($conn);

    $manufacturer = test_input($_POST['manufacturer']);
    $model = test_input($_POST['model']);
    $car_id = test_input($_POST['car_id']);
    $status = test_input($_POST['status']);
    $insureance = test_input($_POST['insureance']);
    $rating = test_input($_POST['rating']);
    $description = test_input($_POST['d']);
    $dealing_type = test_input($_POST['car_type']);
    $cost = test_input($_POST['cost']);

    if (
        empty($manufacturer) || empty($car_id) || empty($model) ||
        empty($insureance) || empty($rating) || empty($description)
    ) {
        echo 'empty';
    } else {
//print_r($_POST);
        $car->manufacturer = $manufacturer;
        $car->model =  $model;
        $car->car_id =  $car_id;
        $car->insureance = $insureance;
        $car->rating =   $rating;
        $car->status =   $status;
        $car->description =    $description;
        $car->dealing_type = $dealing_type;
        $car->cost = $cost;
        $car->date = date("Y-m-d");
        // to save it for next page
        $_SESSION['car_id'] = $car_id;
        echo $car->createCar();
    }
}
