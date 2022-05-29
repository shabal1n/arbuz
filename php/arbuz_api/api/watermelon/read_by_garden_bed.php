<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Watermelon.php';

    $database = new Database();
    $db = $database->connect();

    $watermelon = new Watermelon($db);

    if (isset($_GET['garden_bed'])) {
        $bed_id = $_GET['garden_bed'];
        $result = $watermelon->read_by_garden_bed($bed_id);
        echo $bed_id;
    } else {
        echo 'PLease, specify garden bed id in url';
    }

    $row_count = $result->rowCount();

    if($row_count > 0) {
        $watermelons_arr = array();
        $watermelons_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            
            $watermelon_item = array(
                'id' => $id,
                'garden_bed_id' => $garden_bed_id,
                'position' => $position,
                'weight' => $weight,
                'status_id' => $status_id,
                'status' => $status
            );

            array_push($watermelons_arr['data'], $watermelon_item);
        }

        echo json_encode($watermelons_arr);

    } else {
        echo json_encode(
            array('message' => 'No watermelons found')
        );
    }