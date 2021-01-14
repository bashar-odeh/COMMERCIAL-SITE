<?php

session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../dataBaseConn/connection.php';
include_once '../models/customer.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['id'])) {

$db = new Database();
$conn = $db->connect();
$customer = new Customer($conn);
if (isset($_SESSION['id'])) {
    $customer->customer_ID = $_SESSION['id'];
  $customer->getAllAboutACustomers();

  $cus_array = array(
    'customer_ID' => $customer->customer_ID,
    'full_name' => $customer->full_name,
    'password' => $customer->password,
    'license' => $customer->license,
    'age' => $customer->age,
    'phone' => $customer->phone,
    'email' => $customer->email,
    'rating' => $customer->rating,
    'register_date' => $customer->register_date,
    'status' => $customer->status,
    'payment_method' => $customer->payment_method
  );
  print_r(json_encode($cus_array));
} else {
  print_r(json_encode(array('data' => 'no data')));
}}
