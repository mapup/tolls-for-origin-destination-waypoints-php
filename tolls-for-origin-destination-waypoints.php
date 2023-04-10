<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();

$headers = [
  'x-api-key' => '<YOUR_TOLLGURU_API_KEY>',
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

$request = new Request('POST', 'https://apis.tollguru.com/toll/v2/origin-destination-waypoints', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
