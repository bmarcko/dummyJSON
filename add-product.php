<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;
#use GuzzleHttp\Psr7\Request;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/',
]);

$products = [
    'json' => [
        'id' => '101',
        'title' => 'iPhone 14',
        'description' => 'The new iPhone 14 comes with state of the art camera, IOS, and more.',
        'price' => '800',
        'brand' => 'Apple',
        'category' => 'smartphones',
        'thumbnail' => 'img/iphone14.jpg'
        ]
];

#$id = $_GET["product_id"];
$response = $client->post('https://dummyjson.com/products/add', $products);
$code = $response->getStatusCode();
$body = $response->getBody();
$prod = json_decode($body);

#var_dump(json_decode($body));
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Add Product</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<h1>Add Product</h1>

<table class="table table-bordered table-hover">
        <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Thumbnail</th>
        </tr>
<tbody>
        <tr>
                <td><?php echo $prod->id; ?></td>
                <td><?php echo $prod->title; ?></td>
                <td><?php echo $prod->description; ?></td>
                <td>$<?php echo $prod->price; ?></td>
                <td><?php echo $prod->brand; ?></td>
                <td><?php echo $prod->category; ?></td>        
                <td><?php echo "<img width=150x; height=150x; src=" . $prod->thumbnail . ">";?></td>
        </tr>
</tbody>
</table>

</body>
</html>