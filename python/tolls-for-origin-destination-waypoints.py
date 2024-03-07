import requests
import json
import os

TOLLGURU_API_KEY = os.environ.get("TOLLGURU_API_KEY")
TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2"
ORIGIN_DESTINATION_ENDPOINT = "origin-destination-waypoints"

headers = {"x-api-key": TOLLGURU_API_KEY, "Content-Type": "application/json"}

body = {
    "from": {"address": "Philadelphia, PA"},
    "to": {"address": "New York, NY"},
    "vehicle": {
        "type": "2AxlesAuto",
    },
}

response = requests.post(
    f"{TOLLGURU_API_URL}/{ORIGIN_DESTINATION_ENDPOINT}",
    headers=headers,
    data=json.dumps(body),
)

print(response.text)
