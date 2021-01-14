<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

if (!isset($_SESSION['id'])) {
    header('Location: http://localhost//CarRentingWebSite/index.html');

    exit();
}

include_once '../dataBaseConn/connection.php';
include_once '../models/customer.php';
$db = new Database();
$conn = $db->connect();
$customer = new Customer($conn);
$updated = '';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id'])) {

    $customer_id =  $_SESSION['id'];
    $age = test_input($_POST['age']);
    $email = test_input($_POST['email']);
    $phone = $customer->phone = test_input($_POST['phone']);
    $payment_method =  test_input($_POST['payment_method']);
    if (empty($customer_id) || empty($age) || empty($email) || empty($payment_method)) {
        echo 'empty';
    } else {
        $customer->customer_ID = $_SESSION['id'];
        $customer->age = test_input($_POST['age']);
        $customer->email = test_input($_POST['email']);
        $customer->phone = test_input($_POST['phone']);
        $customer->payment_method = test_input($_POST['payment_method']);

        if ($customer->updateCustomer()) {
            echo true;
        } else {
            echo false;
        }
    }
}
