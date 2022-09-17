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

$products = $idk->products;

#var_dump($products);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>IPT10 dummyjson</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<p><h1>All Products</h1></p>

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
    <?php 
    foreach ($products as $prod){
    ?>
    <tr>
        <td><?php echo $prod->id; ?></td>
        <td><?php echo $prod->title; ?></td>
        <td><?php echo $prod->description; ?></td>
        <td><?php echo $prod->price; ?></td>
        <td><?php echo $prod->brand; ?></td>
        <td><?php echo $prod->category; ?></td>        
        <td><?php echo "<img width=150x; height=150x; src=" . $prod->thumbnail . ">";?></td>

        
    </tr>
    <?php } ?>
</tbody>
</table>
</body>
</html>