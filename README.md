
# Softwar Channels

Return the ranking of watched time, bringing the name of the channel and a ordered list with users, their record of watched time (highest value), position and date.

## Requirements

- Docker

## Commands to be executed in the terminal to run the project. After cloning the project...

### Run in terminal, in project folder and with docker running

````
./vendor/bin/sail up -d
````

### To access the container's internal terminal

````
./vendor/bin/sail bash
````

### Inside the container, run the migrations and seeds to generate the ranking

#### For migrations
````
php artisan migrate
````
#### For seeds
````
php artisan db:seed
````

### Then, use some tool like Postman or even the browser to make the requests.


## Endpoints
### Prefix Host: http://localhost/api/

#### Get ranking

```http
  GET /channels/ranking
```

Response example:

````
{
    "success": true,
    "text": "Ranking Channels by minutes watched",
    "data": {
        "GetRankingService": {
            "data": [
                {
                    "channel": "History",
                    "01": {
                        "user": "Otávio",
                        "minutes_watched": 169
                    },
                    "02": {
                        "user": "Bruno",
                        "minutes_watched": 155
                    },
                    "03": {
                        "user": "Brian",
                        "minutes_watched": 17
                    },
                    "minutes_watched_in_channel": 341
                }
            ]
        }
    },
    "status": 200
}
````


#### Get all users

```http
  GET /users
```

Response example:

````
  {
    "id": 1,
    "name": "Bruno",
    "email": "bruno@example.com",
    "email_verified_at": "2022-09-07T18:55:26.000000Z",
    "created_at": "2022-09-07T18:55:26.000000Z",
    "updated_at": "2022-09-07T18:55:26.000000Z"
  },
````


#### Get channels

```http
  GET /channels
```

Response example:

`````
{
    "success": true,
    "text": "List of Channels",
    "data": [
        {
            "id": 1,
            "name": "History",
            "created_at": "2022-09-07T18:55:26.000000Z",
            "updated_at": "2022-09-07T18:55:26.000000Z",
            "users": [
                {
                    "id": 3,
                    "name": "Otávio",
                    "email": "otavio@example.com",
                    "email_verified_at": "2022-09-07T18:55:26.000000Z",
                    "created_at": "2022-09-07T18:55:26.000000Z",
                    "updated_at": "2022-09-07T18:55:26.000000Z",
                    "pivot": {
                        "channel_id": 1,
                        "user_id": 3,
                        "minutes_watched": 169,
                        "date": "2021-01-01 00:00:00"
                    }
                },
                {
                    "id": 1,
                    "name": "Bruno",
                    "email": "bruno@example.com",
                    "email_verified_at": "2022-09-07T18:55:26.000000Z",
                    "created_at": "2022-09-07T18:55:26.000000Z",
                    "updated_at": "2022-09-07T18:55:26.000000Z",
                    "pivot": {
                        "channel_id": 1,
                        "user_id": 1,
                        "minutes_watched": 155,
                        "date": "2021-01-01 00:00:00"
                    }
                },
                {
                    "id": 2,
                    "name": "Brian",
                    "email": "brian@example.com",
                    "email_verified_at": "2022-09-07T18:55:26.000000Z",
                    "created_at": "2022-09-07T18:55:26.000000Z",
                    "updated_at": "2022-09-07T18:55:26.000000Z",
                    "pivot": {
                        "channel_id": 1,
                        "user_id": 2,
                        "minutes_watched": 17,
                        "date": "2021-01-01 00:00:00"
                    }
                }
            ]
        },
    ],
    "status": 200
}
`````

