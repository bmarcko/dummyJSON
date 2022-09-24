<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;
#use GuzzleHttp\Psr7\Request;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/',
]);

$id = $_GET["user_id"];
$response = $client->get('users/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Single User</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<p><h1>Single User</h1></p>

<table class="table table-bordered table-hover">
    <tr>
        <th>ID</th>
        <th>Complete Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Blood Type</th>
        <th>Image</th>
    </tr>
<tbody> 
    
    <tr>
    <th scope="row"><?php echo $user->id?></th>
        <td><?php echo $user->firstName?><?php echo " "?><?php echo $user->maidenName?><?php echo " "?><?php echo $user->lastName?></td>
        <td><?php echo $user->age ?></td>
        <td><?php echo $user->gender?></td>
        <td><?php echo $user->email?></td>
        <td><?php echo $user->phone?></td>
        <td><?php echo $user->bloodGroup?></td>      
        <td><?php echo "<img width=150x; height=150x; src=" . $user->image . ">";?></td>  
    </tr>

</tbody>
</table>

</body>
</html>