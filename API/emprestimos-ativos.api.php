<?php
if (isset($_GET['param'])) {
    $param = $_GET['param'];

    // Perform actions based on the parameter
    if ($param === 'value1') {
        $response = array('message' => 'Parameter is value1');
    } elseif ($param === 'value2') {
        $response = array('message' => 'Parameter is value2');
    } else {
        $response = array('message' => 'Parameter is not recognized');
    }

    // Return the response in JSON format
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array('message' => 'Parameter is missing');

    // Return the response in JSON format
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>