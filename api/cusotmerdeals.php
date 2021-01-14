<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../dataBaseConn/connection.php';
include_once '../models/customer.php';

$db = new Database();
$conn = $db->connect();
$customer = new Customer($conn);
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['id'])) {

    $customer->customer_ID = $_SESSION['id'];
    $result = $customer->getCustomerDeals();
    $allData = array();
    $num= $result->rowCount();
    if ($num > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $data = array(
              
                'customer_ID' => $row['customer_ID'],
                'full_name' =>   $row['full_name'],
                'car_id' =>  $row['car_id'],
                'manufacturer' =>  $row['manufacturer'],
                'model' =>   $row['model'],
                'deal_type'  =>   $row['deal_type'],
                'start_date'  =>   $row['start_date'],
                'end_date'  =>  $row['end_date'],
                'deal_cost'  =>  $row['deal_cost'],
                'deal_status' =>  $row['deal_status']

            );

            array_push($allData, $data);
        }
        print_r(json_encode($allData));


    }
    else {
    
        print_r(json_encode(array('data'=>'No Data')));
    }
} 

