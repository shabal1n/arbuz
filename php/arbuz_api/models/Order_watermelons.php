<?php
    class Order_watermelons {
        private $conn;
        private $table = 'order_watermelon';

        public $order_id;
        public $watermelon_id;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT 
                        p.order_id,
                        p.watermelon_id
                    FROM
                        ' . $this->table . ' p
                    ORDER BY
                        p.order_id ASC';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function insert_watermelons($watermelons, $order_id) {
            foreach($watermelons as $melon) {
                $query= '
                    INSERT INTO `order_watermelon`(`order_id`, `watermelon_id`) VALUES (' . $order_id . ', ' . $melon . ')
                ';
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
            }
            echo "Sucessfully added item";
        }
    }