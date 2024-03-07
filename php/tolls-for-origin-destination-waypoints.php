<?php

$TOLLGURU_API_KEY = getenv("TOLLGURU_API_KEY");
$TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2";
$ORIGIN_DESTINATION_ENDPOINT = "origin-destination-waypoints";

$headers = [
    "x-api-key: $TOLLGURU_API_KEY",
    "Content-Type: application/json",
];

$data = [
    "from" => ["address" => "Philadelphia, PA"],
    "to" => ["address" => "New York, NY"],
    "vehicle" => [
        "type" => "2AxlesAuto",
    ],
];

$ch = curl_init("$TOLLGURU_API_URL/$ORIGIN_DESTINATION_ENDPOINT");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
