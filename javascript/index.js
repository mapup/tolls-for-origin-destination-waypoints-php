const TOLLGURU_API_KEY = process.env.TOLLGURU_API_KEY;
const TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2";
const ORIGIN_DESTINATION_ENDPOINT = "origin-destination-waypoints";

const headers = {
    'x-api-key': TOLLGURU_API_KEY,
    'Content-Type': 'application/json'
};

const body = {
    "from": {
        "address": "HWY-402 Point Edward, ON N7V Canada"
    },
    "to": {
        "address": "I-94 Port Huron, MI 48060 USA"
    },
    "vehicleType": "2AxlesAuto"
};

fetch(`${TOLLGURU_API_URL}/${ORIGIN_DESTINATION_ENDPOINT}`, {
    method: 'POST',
    headers: headers,
    body: JSON.stringify(body),
})
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
