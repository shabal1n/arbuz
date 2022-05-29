<?php
    class Garden_bed {
        private $conn;
        private $table = 'garden_bed';

        public $id;
        public $capacity;


        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT 
                        p.id,
                        p.capacity
                    FROM
                        ' . $this->table . ' p
                    ORDER BY
                        p.id ASC';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }