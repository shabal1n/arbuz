<?php
    class Watermelon {
        private $conn;
        private $table = 'watermelon';

        public $id;
        public $garden_bed_id;
        public $position;
        public $weight;
        public $status_id;
        public $status;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT 
                        p.id,
                        p.garden_bed_id,
                        p.position,
                        p.weight,
                        p.status_id,
                        c.name as status
                    FROM
                        ' . $this->table . ' p
                    LEFT JOIN
                        status_name c ON p.status_id = c.id
                    ORDER BY
                        p.id ASC';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function read_by_garden_bed($bed_id) {
            $query = 'SELECT 
                        p.id,
                        p.garden_bed_id,
                        p.position,
                        p.weight,
                        p.status_id,
                        c.name as status
                    FROM
                        ' . $this->table . ' p
                    LEFT JOIN
                        status_name c ON p.status_id = c.id
                    WHERE p.garden_bed_id = ' . $bed_id . '
                    ORDER BY
                        p.id ASC';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function get_total($order) {
            $query = '
            SELECT  w.weight, n.cut_into_slices
            FROM watermelon w
            INNER JOIN order_watermelon o
            ON w.id = o.watermelon_id
            INNER JOIN new_order n
            ON n.id = ' . $order . ' AND o.order_id = n.id
            ';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }