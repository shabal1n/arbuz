<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Order.php';

    $database = new Database();
    $db = $database->connect();

    $order = new Order($db);

    if (isset($_GET['name']) && isset($_GET['address']) && isset($_GET['phone']) && isset($_GET['cut']) 
    && isset($_GET['date']) && isset($_GET['total'])) {
        $name = $_GET['name'];
        $address = $_GET['address'];
        $phone = $_GET['phone'];
        $cut = $_GET['cut'];
        $date = $_GET['date'];
        $total = $_GET['total'];
        $result = $order->insert_order($name, $address, $phone, $cut, $date, $total);
    } else {
        echo 'PLease, specify order id in url';
    }