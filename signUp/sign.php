<?php
include_once '../dataBaseConn/connection.php';
include_once '../models/signupcustomer.php';
header('Content-Type: application/json');
session_start();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$db = new Database();
$conn = $db->connect();
$error = '';
$flag = false;

function checkemail($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
$signupcus = new signup($conn);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (
        empty($_POST['customer_ID']) || empty($_POST['full_name']) || empty($_POST['license']) ||
        empty($_POST['age']) || empty($_POST['phone']) || empty($_POST['email'])  ||
        empty($_POST['password']) || empty($_POST['payment'])
    ) {
        echo 'empty';
    } else if (!checkemail($_POST['email'])) {
        echo 'email';
    } else {

        $signupcus->customer_ID = test_input($_POST['customer_ID']);
        $signupcus->full_name = test_input($_POST['full_name']);
        $signupcus->license = test_input($_POST['license']);
        $signupcus->age = test_input($_POST['age']);
        $signupcus->phone = test_input($_POST['phone']);
        $signupcus->email = test_input($_POST['email']);
        if (isset($_SESSION['admin'])) {
            $signupcus->rating = test_input($_POST['rating']);
        } else {
            $signupcus->rating = 'user';
        }
        $signupcus->password = test_input($_POST['password']);
        $signupcus->payment = test_input($_POST['payment']);
        echo $signupcus->signAcustomer();
    }
}
