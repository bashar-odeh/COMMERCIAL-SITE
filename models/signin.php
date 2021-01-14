<?php
include_once '../dataBaseConn/connection.php';
class signin
{

    private $customer_ID;
    private $password;
    private $conn;
    function __construct($conn, $customer_ID)
    {
        $this->customer_ID = $customer_ID;

        $this->conn = $conn;
    }
  
    function getUserDetails()
    {
        $sql = "SELECT `customer_ID`, `password` from customer_info where customer_ID= ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->customer_ID);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return null;
            // Print error if something goes wrong



        }
    }
}

