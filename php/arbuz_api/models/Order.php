<?php
    class Order {
        private $conn;
        private $table = 'new_order';

        public $id;
        public $user_name;
        public $address;
        public $phone_number;
        public $cut_into_slices;
        public $delivery_date;
        public $total;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT 
                        p.id,
                        p.user_name,
                        p.address,
                        p.phone_number,
                        p.cut_into_slices,
                        p.delivery_date,
                        p.total
                    FROM
                        ' . $this->table . ' p
                    ORDER BY
                        p.id ASC';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function insert_order($name, $address, $phone, $cut, $date, $total) {
            $query= '
            INSERT INTO `new_order`( `user_name`, `address`, `phone_number`, `cut_into_slices`, `delivery_date`, `total`) 
            VALUES ("' . $name .'", "' . $address . '", "' . $phone . '", ' . $cut . ', "' . $date . '", ' . $total . ')
            ';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            echo "Sucessfully added item";
        }
    }