const TOLLGURU_API_KEY = process.env.TOLLGURU_API_KEY;
const TOLLGURU_API_URL = "https://apis.tollguru.com/toll/v2";
const ORIGIN_DESTINATION_ENDPOINT = "origin-destination-waypoints";

// from and to locations
const source = "Philadelphia, PA, USA";
const destination = "New York, NY, USA";

// Explore https://tollguru.com/toll-api-docs to get the best of all the parameters that tollguru has to offer
const requestBody = {
  vehicle: {
    type: "2AxlesAuto",
  },
  // Visit https://en.wikipedia.org/wiki/Unix_time to know the time format
  departure_time: "2021-01-05T09:46:08Z",
};

const headers = {
  "x-api-key": TOLLGURU_API_KEY,
  "Content-Type": "application/json",
};

const body = {
  from: {
    address: source,
  },
  to: {
    address: destination,
  },
  ...requestBody,
};

fetch(`${TOLLGURU_API_URL}/${ORIGIN_DESTINATION_ENDPOINT}`, {
  method: "POST",
  headers: headers,
  body: JSON.stringify(body),
})
  .then((response) => response.json())
  .then((data) => console.log(data))
  .catch((error) => console.error("Error:", error));
