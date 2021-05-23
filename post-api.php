<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET, POST');
header('Content-Type', 'application/json');

include('connection.php');
$api_key = "bfda40-960964-bd6cdf-97152e-974c91";

$data = json_decode(file_get_contents("php://input"));
if ($data->key == $api_key){
    define('UPLOAD_DIR', 'images/');
    $image_parts = explode(";base64,", $data->image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file = UPLOAD_DIR . uniqid() .'.'. $image_type;
    file_put_contents($file, $image_base64);
    $sql = "INSERT INTO template (name, image, style, display) VALUES ('$data->name', '$file', '$data->style',1)";
    $query = mysqli_query($connect, $sql);
    echo json_encode(array("message" => "1"));
} else {
    echo json_encode(array("message" => "0"));
}

?>