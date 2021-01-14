<?php

session_start();
include_once '../../models/admin.php';
include_once '../../dataBaseConn/connection.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['admin'])) {
    $db = new Database();
    $conn = $db->connect();
    $admin = new Admin($conn);
    $admin->customer_ID = $_POST['id'];
    $status = abs($_POST['status']-1);
    $admin->status = $status;
    if ($admin->blockUser()) {
        echo $admin->status;
    }
}
