<?php

require __DIR__ . '/../vendor/autoload.php';

//api context
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

//session_start();

$_SESSION['user_id'] = 1;



//API
$api = new ApiContext(
    new OAuthTokenCredential(
        'AV0poFcYrPLE1Tt4wGycBFhBbI11KH4amzdBvfStJnftoKbTqG0t_ym0ueQtS7airqLgt7_amnfzwZSb', 
        'EK1vxso-q_UMJNgm3oHaIhgu8huScc4Mpjt7s6SKoC46X3zPTkdjrF8gX6HWhiKWu6ZIAlmFMe-D-Wp7'
    )
);

//api configuration - these are optional and helpful in the event of errors
$api->setConfig([
    'mode' => 'sandbox',
    'http.ConnectionTimeOut' => 300,
    'log.LogEnabled' => false,
    'log.FileName' => '',
    'log.logLevel' => 'FINE',
    'validation.level' => 'log'
]);

$con = mysqli_connect("localhost","root","","paypal");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

$stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
if ($stmt === false) {
    die('prepare() failed: ' . htmlspecialchars($con->error));
}

$stmt->bind_param('i', $_SESSION['user_id']);

$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_object();

if ($user) {
    echo "ID: " . $user->id . "<br>";
    echo "Name: " . $user->username . "<br>";
    echo "Email: " . $user->email . "<br>";
    // add more fields as necessary
} else {
    echo "No user found with the given ID.";
}

?>
