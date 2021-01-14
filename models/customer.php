<?php

class Customer
{
    public $customer_ID;
    public $password;
    public $full_name;
    public $license;
    public $age;
    public $phone;
    public $email;
    public $rating;
    public $register_date;
    public $status;
    public $start_date;
    public $end_date;
    public $deal_status;
    public $car_ID;
    public $deal_type;
    public $manufacturer;
    public $model;
    public $deal_cost;
    private $conn;



    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public  function getAllAboutACustomers()
    {
        $sql = "SELECT * FROM `customer_info`  WHERE customer_ID = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->customer_ID);
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->customer_ID = $row['customer_ID'];
            $this->full_name = $row['full_name'];
            $this->password = $row['password'];
            $this->license = $row['license'];
            $this->age = $row['age'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->rating = $row['rating'];
            $this->register_date = $row['register_date'];
            $this->status = $row['status'];
            $this->payment_method = $row['payment_method'];
        }
    }



    function updateCustomer()
    {

        $sql = 'UPDATE `customer_info` SET `age`=?,`phone`=?,`email`=?,`payment_method`=? where customer_ID = ? ' ;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->age);
        $stmt->bindParam(2, $this->phone);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->payment_method);
        $stmt->bindParam(5, $this->customer_ID);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getCustomerDeals()
    {

        $sql = 'SELECT customer_info.customer_ID ,customer_info.full_name , car_info.car_id,car_info.manufacturer,car_info.model , customer_car_deals.deal_type,customer_car_deals.start_date,customer_car_deals.end_date,customer_car_deals.deal_cost,customer_car_deals.deal_status 
            FROM customer_car_deals join car_info USING (car_id) join customer_info using (customer_ID)
        WHERE customer_info.customer_ID = ? ';
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->customer_ID);

        if ($stmt->execute()) {
            return $stmt;
        }
    }

    function updatepass()
    {
        $sql = 'UPDATE `customer_info` SET `password`=? where customer_ID = ? ' ;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->password);
        $stmt->bindParam(2, $this->customer_ID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
