<?php

class Car
{
    private $conn;

    public $car_id;
    public $manufacturer;
    public $model;
    public $status;
    public $rating;
    public $description;
    public $main_pic_path;
    public $dealing_type;
    public $date;
    public $cost;
    // style
    public $path;
    public $color;
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function createCar()
    {

        try {
            $sql = 'SELECT `car_id` FROM `car_info` WHERE car_id=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->car_id);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num === 1) {
                echo 'exist';
                return;
            }
        } catch (PDOException $ex) {
            echo 'error';
        }
        try {

            $sql = 'INSERT INTO `car_info`(`car_id`, `manufacturer`, `model`,`insureance` ,`status`, `rating`, `description`,`dealing_type`,`cost`,`date` ) VALUES (?,?,?,?,?,?,?,?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->car_id);
            $stmt->bindParam(2, $this->manufacturer);
            $stmt->bindParam(3, $this->model);
            $stmt->bindParam(4, $this->insureance);
            $stmt->bindParam(5, $this->status);
            $stmt->bindParam(6, $this->rating);
            $stmt->bindParam(7, $this->description);
            $stmt->bindParam(8, $this->dealing_type);
            $stmt->bindParam(9, $this->cost);
            $stmt->bindParam(10, $this->date);


            $stmt->execute();
            return $this->car_id;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    function storeMain()
    {

        try {
            $sql = 'UPDATE `car_info` SET `main_pic_path`= ? WHERE `car_id` = ? ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->main_pic_path);
            $stmt->bindParam(2, $this->car_id);
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            echo 'error';
        }
    }

    function storeStyles()
    {
        try {
            $sql = 'INSERT INTO `car_pic_style`(`car_id`, `path`, `color`) VALUES (?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->car_id);
            $stmt->bindParam(2, $this->path);
            $stmt->bindParam(3, $this->color);
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    function getAllCars($type)
    {
        try {
            switch ($type) {
                case 0: {
                        $sql = 'SELECT * FROM `car_info` WHERE `status` = 0 ';
                        break;
                    }
                case 1: {
                        $sql = 'SELECT * FROM `car_info` ';
                        break;
                    }
                case 2: {
                        $sql = 'SELECT * FROM `car_info` WHERE `status` = 1  AND `dealing_type` = 1';
                        break;
                    }
                case 3: {
                        $sql = 'SELECT * FROM `car_info` WHERE `status` = 1  AND `dealing_type` = 0';
                        break;
                    }
                case 4: {
                        $sql = 'SELECT * FROM `car_info` WHERE `status` = 2  AND `dealing_type` = 0';
                        break;
                    }
                case 5: {
                        $sql = 'SELECT * FROM `car_info` WHERE `status` = 2  AND `dealing_type` = 1';
                        break;
                    }
                case 6: {
                        $sql = 'SELECT * FROM `car_info` WHERE `status` = 1 ';
                        break;
                    }
            }
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    function top3()
    {
        try {
            //    $sql = "SELECT * FROM `car_info` join `car_pic_style` using(car_id) where car_info.car_id  ORDER BY `date` DESC LIMIT 0,9";
            $sql = "SELECT `car_id`,`model` , `manufacturer`, `description` , main_pic_path,`cost`,`dealing_type`From `car_info`  WHERE `status` = 1 ORDER BY `date` DESC LIMIT 0,3 ";
            $stmt = $this->conn->prepare($sql);
            if ($stmt->execute()) {
                return $stmt;
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    function getRandomCars()
    {
        $sql = "SELECT * FROM car_info WHERE `status` = 1 ORDER BY RAND() LIMIT 6";;
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }
    function getSingleCar()
    {
        $sql = 'SELECT * FROM `car_info` WHERE `car_id`=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->car_id);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }
    function getSingleCarColors()
    {
        $sql = 'SELECT * FROM `car_pic_style` WHERE `car_id` = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->car_id);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }
    function getRelated()
    {
        $sql = 'SELECT * FROM `car_info` WHERE `manufacturer` = ? AND `car_id`!=? LIMIT 3';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->manufacturer);
        $stmt->bindParam(2, $this->car_id);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }

    function getAllColors()
    {
        $sql = 'SELECT color FROM `car_pic_style` GROUP BY color';
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }
    function getAllBrands()
    {
        $sql = 'SELECT manufacturer FROM `car_info` GROUP BY manufacturer';
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }

    function filter($sql_cont)
    {
        $sql = "SELECT * FROM `car_info` JOIN car_pic_style USING(car_id) WHERE $sql_cont GROUP by `car_id` ";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }
}
