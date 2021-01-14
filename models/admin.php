<?php

class Admin
{
    //customer
    public $customer_ID;
    public $new_customer_ID;
    public $password;
    public $full_name;
    public $license;
    public $age;
    public $phone;
    public $email;
    public $rating;
    public $register_date;
    public $status;
    public $payment_method;
    // deals
    public $start_date;
    public $end_date;
    public $deal_status;
    public $deal_type;
    public $deal_cost;
    //cars 
    public $car_id;
    public $manufacturer;
    public $model;
    public $car_status;
    public $car_rating;
    public $dealing_type;
    public $description;
    public $main_pic_path;


    //connection
    private $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    function getAllcustomers()
    {


        if ($this->status == 1) {
            $sql = "SELECT * FROM `customer_info` where `status` = ? AND `customer_ID` != ?  ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->status);
            $stmt->bindParam(2, $this->customer_ID);
        } else if ($this->status == 0) {
            $sql = "SELECT * FROM `customer_info` where `status` = ? AND `customer_ID` != ? ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->status);
            $stmt->bindParam(2, $this->customer_ID);
        } else {
            $sql = "SELECT * FROM `customer_info` WHERE `customer_ID` != ?  ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->customer_ID);
        }

        if ($stmt->execute()) {
            return $stmt;
        } else {
            return null;
        }
    }
    function addAcustomer()
    {
        // redirect for sign up page;
    }
    function updateAcustomer()
    {
        $sql = ' UPDATE `customer_info` SET `full_name`= ?,`license`= ?,`age`= ?,`phone`= ?,`email`= ? ,`payment_method`= ?  WHERE customer_ID = ?';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(1, $this->full_name);
        $stmt->bindParam(2, $this->license);
        $stmt->bindParam(3, $this->age);
        $stmt->bindParam(4, $this->phone);
        $stmt->bindParam(5, $this->email);
        $stmt->bindParam(6, $this->payment_method);
        $stmt->bindParam(7, $this->customer_ID);
        if ($stmt->execute()) {

            return true;
        } else {
            return false;
        }
    }

    function updateAcustomerPassword()
    {
        $sql = ' UPDATE `customer_info` SET `password`=? WHERE customer_ID = ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->password);
        $stmt->bindParam(2, $this->customer_ID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function deleteCustomer()
    {
        $sql = 'DELETE FROM `customer_info` WHERE customer_ID = ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->customer_ID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function deleteCar()
    {
        $sql = 'DELETE FROM `car_info` WHERE car_id = ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->car_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function toggleAdmin()
    {
        $sql = 'SELECT rating from customer_info  WHERE  customer_ID =? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->customer_ID);

        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }
    function makeAdmin()
    {
        $sql = ' UPDATE `customer_info` set rating = ?  WHERE  customer_ID = ? ';
        $stmt = $this->conn->prepare($sql);
        $this->rating = 'admin';
        $stmt->bindParam(1, $this->rating);
        $stmt->bindParam(2, $this->customer_ID);

        if ($stmt->execute()) {
            return 'admin';
        } else {
            return false;
        }
    }
    function removeAdmin()
    {
        $sql = 'UPDATE `customer_info` set rating = ? WHERE  customer_ID = ? ';
        $stmt = $this->conn->prepare($sql);
        $this->rating = 'user';

        $stmt->bindParam(1, $this->rating);
        $stmt->bindParam(2, $this->customer_ID);

        if ($stmt->execute()) {
            return 'user';
        } else {
            return false;
        }
    }
    function checkNumberOfAdmins()
    {
        $sql = 'Select count(rating) as num from customer_info  group by(rating)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $row['num'];
        return $count;
    }

    function blockUser()
    {
        $sql = 'UPDATE `customer_info` set status = ? WHERE  customer_ID = ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->status);
        $stmt->bindParam(2, $this->customer_ID);
        if ($stmt->execute()) {
            return true;
        }
    }

    function blockCar()
    {

        $sql = 'UPDATE `car_info` set status = ? WHERE  car_id = ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->car_status);
        $stmt->bindParam(2, $this->car_id);
        if ($stmt->execute()) {
            return true;
        }
    }
    function updateCar()
    {
        $sql = 'UPDATE `car_info` SET `manufacturer`=?,`model`=?,`rating`=?,`description`=? ,`cost`=? WHERE  `car_id`=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->manufacturer);
        $stmt->bindParam(2, $this->model);
        $stmt->bindParam(3, $this->rating);
        $stmt->bindParam(4, $this->description);
        $stmt->bindParam(5, $this->cost);
        $stmt->bindParam(6, $this->car_id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function toggleDealing()
    {

        $sql = 'SELECT `status`  FROM `car_info` where car_id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->car_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $status = $row['status'];
        if ($status === '2') {
            return false;
        }

        $sql = 'UPDATE `car_info` SET `dealing_type` = ?  WHERE   `car_id` = ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->dealing_type);
        $stmt->bindParam(2, $this->car_id);
        if ($stmt->execute()) {
            return $this->dealing_type;
        } else {
            return false;
        }
    }

    function getTop3()
    {
    }
    function checkStatus()
    {
        $sql = 'SELECT `status`  FROM `car_info` where car_id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->car_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $status = $row['status'];
        if ($status === '2') {
            return false;
        } else {
            $this->car_status =  abs($status - 1);
            return true;
        }
    }
    function disableCar()
    {
        // first we check if the car exists in deals or not if exists check if the deal ended or not



        if ($this->checkStatus()) {
            $sql = 'UPDATE `car_info` SET `status` = ? WHERE `car_id` = ? ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->car_status);
            $stmt->bindParam(2, $this->car_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;;
        }
    }
}
