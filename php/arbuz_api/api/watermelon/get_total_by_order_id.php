<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Watermelon.php';

    $database = new Database();
    $db = $database->connect();

    $watermelon = new Watermelon($db);

    if (isset($_GET['order_id'])) {
        $order = $_GET['order_id'];
        $result = $watermelon->get_total($order);
    } else {
        echo 'PLease, specify order id in url';
    }

    $row_count = $result->rowCount();

    if($row_count > 0) {
        $total = 0;
        $watermelons_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            
            $watermelon_item = array(
                'weight' => $weight,
                'cut_into_slices'=>$cut_into_slices
            );

            array_push($watermelons_arr, $watermelon_item);
        }

        foreach($watermelons_arr as $melon) {
            $total += (610 * $melon['weight']);
        }

        if($watermelons_arr[0]['cut_into_slices'] == 1) {
            $total += (590 * count($watermelons_arr));
        }

        echo json_encode($total);

    } else {
        echo json_encode(
            array('message' => 'No orders found')
        );
    }