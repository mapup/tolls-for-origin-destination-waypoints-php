<?php

$TOLLGURU_API_KEY = getenv("TOLLGURU_API_KEY");
$TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2";
$ORIGIN_DESTINATION_ENDPOINT = "origin-destination-waypoints";

// Explore https://tollguru.com/toll-api-docs to get the best of all the parameters that tollguru has to offer
$request_parameters = [
    "from" => ["address" => "Philadelphia, PA, USA"],
    "to" => ["address" => "New York, NY, USA"],
    "vehicle" => [
        "type" => "2AxlesAuto",
    ],
    // Visit https://en.wikipedia.org/wiki/Unix_time to know the time format
    "departure_time" => "2021-01-05T09:46:08Z",
];

$headers = [
    "x-api-key: $TOLLGURU_API_KEY",
    "Content-Type: application/json",
];

$ch = curl_init("$TOLLGURU_API_URL/$ORIGIN_DESTINATION_ENDPOINT");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_parameters));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
