<?php
require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;
  
$client = new Client([
    'base_uri' => 'https://dummyjson.com/',
]);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>  
<form method="POST" action="user-login.php">
        <h1>User Login</h1>
        <div class="form m-5">
        <label for="username">Username:</label>
            <input type="username" class="form-control" id="username" name="username" placeholder="John Doe">
            
        </div>
        <div class="form m-5">
        <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********">
            
            <input class="btn btn-primary mx-auto m-4" type="submit" value="Submit" name="submit">
        </div>
    </form>

<?php
if (isset($_POST['submit'])) {
    try {

        $users = [
            'json' => [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ]
        ];

        $response = $client->post('https://dummyjson.com/auth/login', $users);
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $users = json_decode($body, true); ?>

        <div class="alert alert-success m-5" role="alert">
            <?php echo "Login Successful!"?><br>
            <?php echo "User token is: " . $users['token']; ?>
        </div>

    <?php
    } catch (Exception $e) { ?>
        <div class="alert alert-danger m-5" role="alert">
            <?php echo "Login Attempt Failed"; ?>
        </div>
<?php
    }
}
?>

</body>
</html>