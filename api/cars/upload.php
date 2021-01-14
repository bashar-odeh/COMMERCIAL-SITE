<?php
include_once '../../models/car.php';
include_once '../../dataBaseConn/connection.php';
session_start();
print_r($_SESSION);
$error = "";
$error_main = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $db = new Database();
    $conn = $db->connect();
    $car = new Car($conn);
    print_r($_GET);

    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    $files = $_FILES['photo'];
    $files_main = $_FILES['photo'];

    $names_array = array();
    foreach ($_POST as  $value) {
        array_push($names_array, $value);
    }
    print_r($names_array);
    $filesCount = count($files_main['name']);
    echo $filesCount;
    if ($files_main['error'][0] === 0) {

        if ($files_main['size'][0] < 2000000) {
            $file_main_name = $files_main['name'][0];
            $file_main_ext  = strtolower(explode(".",   $file_main_name)[1]);
            if (in_array($file_main_ext, $allowed)) {

                $file_main_unique_id = uniqid('', true) . '.' . $file_main_ext;;
                $main_dist = 'uploaded/main/' . $file_main_unique_id;
                $temp = $files_main['tmp_name'][0];
                move_uploaded_file($temp, $main_dist);
                $error_main = "success";
                // store main
                $car->car_id=$_SESSION['car_id'];
                $car->main_pic_path=$main_dist;
                $car->storeMain();
            } else {
                $error_main = ' no ';
            }
        } else {
            $error_main = 'file size too large';
        }
    } else {
        $error_main = 'error';
    }
    for ($i = 1; $i < $filesCount; $i++) {
        echo 'hi <br>';
        $file_size = $files['size'][$i];
        $file_error = $files['error'][$i];
        if ($file_error === 0) {
            if ($file_size > 10000000) {
                $error = 'file too large';
            } else {

                $file_name = $files['name'][$i];
                $file_ext = strtolower(explode(".", $file_name)[1]);

                if (in_array($file_ext, $allowed)) {
                    $file_unique_name = uniqid('', true) . '.' . $file_ext;
                    $file_dist = 'uploaded/' . $file_unique_name;
                    $file_temp = $files['tmp_name'][$i];
                    move_uploaded_file($file_temp,  $file_dist);

                    $car->car_id = $_SESSION['car_id'];
                    $car->path = $file_dist;
                    $car->color = $names_array[$i - 1];
                    echo $names_array[$i-1];
                    $car->storeStyles();
                } else {
                    $error = 'wrong file type only jbg , png and jbeg are allowed';
                }
            }
        } else {
            $error = 'an error occured';
        }
    }

    unset($_SESSION['car_id']);
}
