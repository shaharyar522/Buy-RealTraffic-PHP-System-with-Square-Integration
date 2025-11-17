<?php
require __DIR__ . '/vendor/autoload.php';

use Square\SquareClient;

$SQUARE_ACCESS_TOKEN = "EAAAl9WbJr9CI8u2OiLX5j1Kn36-ZpjAOKBzcLEYsEv8Opp6OnsDjd1JgUSEkfWN";
$SQUARE_LOCATION_ID  = "LQMZ6SFQTVX2C";
$SQUARE_APP_ID       = "sandbox-sq0idb-RoBtfk6edD6F5wzJTWZPtA";

$client = new SquareClient(
    token: $SQUARE_ACCESS_TOKEN,
    version: null,
    options: [
        'baseUrl' => 'https://connect.squareupsandbox.com'
    ]
);
