FORMAT: 1A
HOST: http://localhost:8888

# NSTSA-API
This is a Proxy API for NHTSA API.

# Group Healthcheck

## Healthcheck [/healthcheck]

### Get API Health [GET]
Returns the API healthcheck.

+ Response 200 (application/json)

        "UP"

## Group Vehicles

## Vehicle [/vehicles/{modelYear}/{manufacturer}/{model}?{withRating}]
+ Parameters
    + modelYear (number)
    + manufacturer (string)
    + model (string)
    + withRating (boolean, optional)

### Get Vehicle [GET]
Returns vehicle info.


+ Response 200 (application/json)

        {
            "Count": 4,
            "Results": [
                {
                    "Description": "2015 Audi A3 4 DR AWD",
                    "VehicleId": 9403
                },
                {
                    "Description": "2015 Audi A3 4 DR FWD",
                    "VehicleId": 9408
                },
                {
                    "Description": "2015 Audi A3 C AWD",
                    "VehicleId": 9405
                },
                {
                    "Description": "2015 Audi A3 C FWD",
                    "VehicleId": 9406
                }
            ]
        }


+ Response 200 (application/json)

        {
            "Count": 4,
            "Results": [
                {
                    "Description": "2015 Audi A3 4 DR AWD",
                    "VehicleId": 9403,
                    "CrashRating": "5"
                },
                {
                    "Description": "2015 Audi A3 4 DR FWD",
                    "VehicleId": 9408,
                    "CrashRating": "5"
                },
                {
                    "Description": "2015 Audi A3 C AWD",
                    "VehicleId": 9405,
                    "CrashRating": "Not Rated"
                },
                {
                    "Description": "2015 Audi A3 C FWD",
                    "VehicleId": 9406,
                    "CrashRating": "Not Rated"
                }
            ]
        }

## Vehicle [/vehicles?{withRating}]

### Get Vehicle [POST]
Returns vehicle info.

+ Parameters
    + withRating (boolean, optional)

+ Request (application/json)

        {
            "modelYear": 2015,
            "manufacturer": "Audi",
            "model": "A3"
        }

+ Response 201 (application/json)

        {
            "Count": 4,
            "Results": [
                {
                    "Description": "2015 Audi A3 4 DR AWD",
                    "VehicleId": 9403
                },
                {
                    "Description": "2015 Audi A3 4 DR FWD",
                    "VehicleId": 9408
                },
                {
                    "Description": "2015 Audi A3 C AWD",
                    "VehicleId": 9405
                },
                {
                    "Description": "2015 Audi A3 C FWD",
                    "VehicleId": 9406
                }
            ]
        }

+ Response 201 (application/json)

        {
            "Count": 4,
            "Results": [
                {
                    "Description": "2015 Audi A3 4 DR AWD",
                    "VehicleId": 9403,
                    "CrashRating": "5"
                },
                {
                    "Description": "2015 Audi A3 4 DR FWD",
                    "VehicleId": 9408,
                    "CrashRating": "5"
                },
                {
                    "Description": "2015 Audi A3 C AWD",
                    "VehicleId": 9405,
                    "CrashRating": "Not Rated"
                },
                {
                    "Description": "2015 Audi A3 C FWD",
                    "VehicleId": 9406,
                    "CrashRating": "Not Rated"
                }
            ]
        }