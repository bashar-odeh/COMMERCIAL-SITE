<?php
session_start();
include_once '../dataBaseConn/connection.php';
include_once '../models/customer.php';

$db = new Database();
$conn = $db->connect();
$customer = new Customer($conn);
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id'])) {
  
$db = new Database();
$conn = $db->connect();
$customer = new Customer($conn);

        $customer->customer_ID = $_SESSION['id'];
        $new_password = test_input($_POST['new_password']);
        if(!empty($new_password)){
            $customer->password = $new_password;

            if($customer->updatepass()){
                echo true;
            }
            else{
             echo false;
            }
        }
        else{
            echo 'empty';
        }
    
       
    } 
    
