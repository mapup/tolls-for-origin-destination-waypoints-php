import requests
import json
import os

TOLLGURU_API_KEY = os.environ.get("TOLLGURU_API_KEY")
TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2"
ORIGIN_DESTINATION_ENDPOINT = "origin-destination-waypoints"

# From and To locations
source = "Philadelphia, PA, USA"
destination = "New York, NY, USA"

# Explore https://tollguru.com/toll-api-docs to get best of all the parameter that TollGuru has to offer
request_parameters = {
    "vehicle": {
        "type": "2AxlesAuto"
    },
    # Visit https://en.wikipedia.org/wiki/Unix_time to know the time format
    "departure_time": "2021-01-05T09:46:08Z",
}

headers = {"x-api-key": TOLLGURU_API_KEY, "Content-Type": "application/json"}

body = {
    "from": {
        "address": source
    },
    "to": {
        "address": destination
    },
    **request_parameters,
}

response = requests.post(
    f"{TOLLGURU_API_URL}/{ORIGIN_DESTINATION_ENDPOINT}",
    headers=headers,
    data=json.dumps(body),
)

print(response.text)
