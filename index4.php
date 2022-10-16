<?php 
$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    "Authorization: Client-ID 9JyTGoeI_5gurmNw1jhFzWM7s41pNm43KHxlCq6eDP8"
];

$response_headers = [];
//callback function which will be called for each header. 2 args... handle and header option, passed by reference using ampersand and use keyword
$header_callback = function($ch, $header) use (&$response_headers) {
    $len = strlen($header);

    $parts = explode(":", $header, 2);

    if (count($parts) < 2) {
        return $len;
    }

    $response_headers[$parts[0]] = trim($parts[1]);

    return $len;
};
//we can set multiple options using an array.
curl_setopt_array($ch, [
CURLOPT_URL => "https://api.unsplash.com/photos/random",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => $headers,
CURLOPT_HEADERFUNCTION => $header_callback
]);

$response = curl_exec($ch);
//get http status code
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


curl_close($ch);

echo $status_code, "\n";

print_r($response_headers);

echo $response, "\n";