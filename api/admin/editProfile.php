<?php
session_start();

include_once '../../dataBaseConn/connection.php';
include_once '../../models/admin.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['admin'])) {
$db = new Database();
$conn = $db->connect();
$admin = new Admin($conn);
    $customer_ID = $_GET['id'];
    $full_name = test_input($_POST['full_name']);
    $license = test_input($_POST['license']);
    $age = test_input($_POST['age']);
    $email = test_input($_POST['email']);
    $phone  = test_input($_POST['phone']);
    $payment_method =  test_input($_POST['paymetn_method']);
    if ( empty($full_name) || empty($license) || empty($age) ||
     empty($email) || empty($payment_method)) {
        echo 'empty';
    } else {
        
        $admin->customer_ID = $customer_ID;
        $admin->full_name = $full_name;
        $admin->license = $license;
        $admin->age = $age;
        $admin->phone = $phone;
        $admin->email = $email;
        $admin->payment_method = $payment_method;
        if ($admin->updateAcustomer()) {
            echo true;
        } else {
            echo false;
        }
    }
}
