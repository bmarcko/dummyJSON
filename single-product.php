<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/',
]);

$response = $client->get('products');
$body = $response->getBody();
$idk = json_decode($body);

$product_id = $idk->get('https://dummyjson.com/products/1');
var_dump($product_id);