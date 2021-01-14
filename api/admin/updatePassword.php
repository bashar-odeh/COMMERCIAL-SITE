<?php
session_start();
include_once '../../models/admin.php';
include_once '../../dataBaseConn/connection.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['admin'])) {
    $db = new Database();
    $conn = $db->connect();
    $admin = new Admin($conn);
    $admin->customer_ID = $_GET['id'];
    $password = $_POST['password'];
    if (empty($password)) {
        echo 'empty';
    } else {
        $admin->password = $password;
        if ($admin->updateAcustomerPassword()) {
            echo true;
        } else {
            echo false;
        }
    }

  
}
