<?php 
$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//github api format below
// token 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
$headers = [
    "Authorization: token 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",
    //"User-Agent: barophobe"
];


//we can set multiple options using an array.
curl_setopt_array($ch, [
CURLOPT_URL => "https://api.github.com/user/starred/httpie/httpie",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => $headers,
CURLOPT_USERAGENT => "barophobe",
CURLOPT_CUSTOMREQUEST => "GET"
]);

$response = curl_exec($ch);
//get http status code
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


curl_close($ch);

echo $status_code, "\n";



echo $response, "\n";