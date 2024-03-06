<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$TOLLGURU_API_KEY = getenv('TOLLGURU_API_KEY');
$TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2";
$ORIGIN_DESTINATION_ENDPOINT = "origin-destination-waypoints";

$client = new Client();

$headers = [
  'x-api-key' => $TOLLGURU_API_KEY,
  'Content-Type' => 'application/json'
];

$body = '{
  "from": {
    "address": "HWY-402 Point Edward, ON N7V Canada"
  },
  "to": {
    "address": "I-94 Port Huron, MI 48060 USA"
  },
  "vehicleType": "2AxlesAuto"
}';

$request = new Request('POST', $TOLLGURU_API_URL.'/'.$ORIGIN_DESTINATION_ENDPOINT, $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
