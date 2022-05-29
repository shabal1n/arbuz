<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Garden_bed.php';

    $database = new Database();
    $db = $database->connect();

    $garden_bed = new Garden_bed($db);

    $result = $garden_bed->read();

    $row_count = $result->rowCount();

    if($row_count > 0) {
        $beds_arr = array();
        $beds_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            
            $bed_item = array(
                'id' => $id,
                'capacity' => $capacity
            );

            array_push($beds_arr['data'], $bed_item);
        }

        echo json_encode($beds_arr);

    } else {
        echo json_encode(
            array('message' => 'No beds found')
        );
    }