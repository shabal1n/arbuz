<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Order_watermelons.php';

    $database = new Database();
    $db = $database->connect();

    $order = new Order_watermelons($db);

    if (isset($_GET['watermelon_id']) && isset($_GET['order_id'])) {
        $watermelons = $_GET['watermelon_id'];
        $order_id = $_GET['order_id'];
        $result = $order->insert_watermelons($watermelons, $order_id);
    } else {
        echo 'PLease, specify order id in url';
    }