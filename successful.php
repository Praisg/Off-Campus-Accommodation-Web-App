<?php echo "success";

ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
//include("login.php");

//echo $_REQUEST['uid'];
/* {
	header("location:login.php");
} */

$propId = $_GET['propId'];
$userId = $_GET['userId'];


$updatePayment = "
            UPDATE property
              SET tenantId = $userId
              WHERE pid = $propId
          ";
$updateResult = mysqli_query($conn, $updatePayment);

if($updateResult){
    echo "updated";
} else {
    echo "failed to update";
}
?>