<?php

$conf = require_once(__DIR__ . '/config.php');
$data = require_once(__DIR__ . '/data.php');

// Check if 
if(isset($_POST['api_key']) && $_POST['api_key'] == $conf['api_key']){
    // Fake randomize cars
    shuffle($data['cars']);

    // Sample json data
    $response = array(
        'data' => [
            'cars' => array_slice($data['cars'], 0, $conf['max_data_rows'])
        ]
    );

    header("HTTP/1.1 200 OK");
    echo json_encode($response);
    exit;
}else{
    header('HTTP/1.1 500 Internal Server Error');
    exit;
}