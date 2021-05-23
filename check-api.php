<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET, POST');
header('Content-Type', 'application/json');

include('connection.php');
$api_key = "bfda40-960964-bd6cdf-97152e-974c91";

$data = json_decode(file_get_contents("php://input"));
if ($data->key == $api_key){
    echo json_encode(array("message" => "1"));
} else {
    echo json_encode(array("message" => "0"));
}

?>