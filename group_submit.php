<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('info.php');


$id = $_POST['hue'];

$state->on =(boolean)$power;
$state->bri =(int)$true_brightness;

$json = json_encode($state);
echo "JSON: " . $json;
echo '<br>';

$url ="http://$bridgeip/api/62FStlZDDwmQY98TtbiUtq655WjkZBDRXvfrynEo/lights/$id/state";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($json)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
$response  = curl_exec($ch);
$statusCode = curl_getInfo($ch, CURLINFO_HTTP_CODE);
$curlerror = curl_error($ch);
curl_close($ch);


echo '<br>';
echo 'Status: '. $statusCode;
echo '<br>';
echo 'Curl error: ' . $curlerror;


header('Location: index.php');
?>

