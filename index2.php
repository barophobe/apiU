<?php 
$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//we can set multiple options using an array.
curl_setopt_array($ch, [
//CURLOPT_URL => "https://randomuser.me/api",
CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q=London&appid=d8b3e1d900a3c62c4ac734d229510ebb",
CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($ch);
//get http status code
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo $status_code, "\n";

echo $response, "\n";