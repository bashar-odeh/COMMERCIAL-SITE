<?php

include_once '../models/car.php';
include_once '../dataBaseConn/connection.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


  
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $db = new Database();
    $conn = $db->connect();
    $car = new Car($conn);
    $counter = 0;
    $brand = $_GET['brand'];
    $from = $_GET['from'];
    $to = $_GET['to'];
    $color = $_GET['color'];

    $sql_cont = '';
  
    !empty($brand) ? $sql_cont .= "`manufacturer`= '$brand'"  :  $counter++;
    if (!(empty($from) || empty($to))) {
        $sql_cont .= " AND `cost` BETWEEN $from  AND $to ";
    } else {
        $counter++;
    }
    !empty($color) ? $sql_cont .= " AND `color`= '$color'" :  $counter++;

    if ($counter < 3) {
        $result = $car->filter($sql_cont);
        if ($result) {

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
    } else {
        print_r(json_encode(array('data' => 'No Data')));
    }
}
