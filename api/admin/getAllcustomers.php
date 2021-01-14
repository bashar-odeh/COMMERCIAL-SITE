<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../models/admin.php';
include_once '../../dataBaseConn/connection.php';


$db = new Database();
$conn = $db->connect();
$customer = new Admin($conn);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['admin'])) {
    $result = null;

    $data = array();
$customer->customer_ID=$_SESSION['id'];
    $type = $_GET['type'];
    if ($type == 0) {
        $customer->status = 0;
        $result =  $customer->getAllcustomers();
        $num = $result->rowCount();
    } else if ($type == 1) {
        $customer->status = 1;
        $result = $customer->getAllcustomers();
        $num = $result->rowCount();
    } else {
        $customer->status = 2;
        $result =  $customer->getAllcustomers();
        $num = $result->rowCount();
        
    }
    if ($num > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $customer = array(
                'customer_ID' => $row['customer_ID'],
                'password' => $row['password'],
                'full_name' => $row['full_name'],
                'license' => $row['license'],
                'age' => $row['age'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'rating' => $row['rating'],
                'register_date' => $row['register_date'],
                'status' => $row['status'],
                'payment_method' => $row['payment_method']

            );

            array_push($data, $customer);
        }
        echo json_encode($data);
    } else {
        echo json_encode(array('data' => 'No data'));
    }
}
