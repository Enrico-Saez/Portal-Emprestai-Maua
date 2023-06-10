<?php
// api.php

// Retrieve the incoming string value
$inputString = htmlspecialchars($_GET['string']);

$processedString = strtoupper($inputString);

// Prepare the response data
$response = array(
    'input' => $inputString,
    'output' => $processedString
);

// Set the response headers
header('Content-Type: application/json');

// Send the JSON response
echo json_encode($response);
?>
