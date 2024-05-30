<?php
include("config.php");
$uid = $_GET['uid'];
$sql = "DELETE FROM reviews WHERE uid = {$uid}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>review Deleted</p>";
	header("Location:reviewsview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'> Not Deleted!</p>";
	header("Location:reviewsview.php?msg=$msg");
}
mysqli_close($conn);
?>
