<?php
session_start();
include_once '../../models/admin.php';
include_once '../../dataBaseConn/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['admin']) {

    $db = new Database();
    $conn = $db->connect();
    $admin = new Admin($conn);
    $admin->customer_ID = $_POST['id'];
    $result = $admin->toggleAdmin();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $rating = $row['rating'];
    // check number of admins 

    $num = $admin->checkNumberOfAdmins();
    if (strtolower($rating) === 'admin' && $num > 1) {

        if ($admin->removeAdmin()) {
            echo 'user';
        } else {
            echo 'error';
        }
    } else {

        if ($admin->makeAdmin()) {
            echo 'admin';
        } else {
            echo 'error';
        }
    }
}
