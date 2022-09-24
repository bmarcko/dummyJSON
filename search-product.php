<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;
#use GuzzleHttp\Psr7\Request;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Search Product</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<h1>Search Product</h1>


<div class="container text-center mt-5">
    <form action="search-product.php" method="POST">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search product" name="search_product">
            <button class="btn btn-primary" type="submit" id="search">Search</button>
        </div>
    </form>
</div> 
</body>
</html>


<?php

if (isset($_POST['search_product'])){
    $search_product = $_POST['search_product'];
    $response = $client->get('https://dummyjson.com/products/search?q='. $search_product);
    $code = $response->getStatusCode();
    $body = $response->getBody();
    $search_product = json_decode($body, true);
    #var_dump($search_product['products']);
?>

<html>
<body>
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
    foreach ($search_product['products'] as $prod){
?>
    <tr>
        <td href="sing"><?php echo $prod['id']; ?></td>
        <td><?php echo $prod['title']; ?></td>
        <td><?php echo $prod['description']; ?></td>
        <td>$<?php echo $prod['price']; ?></td>
        <td><?php echo $prod['brand']; ?></td>
        <td><?php echo $prod['category']; ?></td>        
        <td><?php echo "<img width=150x; height=150x; src=" . $prod['thumbnail'] . ">";?></td>
    </tr>
<?php
    }
}
?>

</tbody>
</table>

</body>
</html>