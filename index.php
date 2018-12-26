<?php

// Set error level reporting level
error_reporting(E_ERROR);

// Capture URL Arguments
$args = $_SERVER["QUERY_STRING"];
$content = file_get_contents('php://input');
// create a new curl resource and set options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://lineapi.h99report.com/index.php?".$args);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL, and return output
$output = curl_exec($ch);

// Send the header based on the response from the server
header("Content-type: ".curl_getinfo($ch, CURLINFO_CONTENT_TYPE));

// Send the curl output
echo $output;

// close curl resource
curl_close($ch);

?>