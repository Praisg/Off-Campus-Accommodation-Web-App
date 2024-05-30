<?php
include("config.php");
$aid = $_GET['id'];
$sql = "DELETE FROM admin WHERE aid = {$aid}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Admin Deleted</p>";
	header("Location:adminlist.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Admin Not Deleted</p>";
	header("Location:adminlist.php?msg=$msg");
}
mysqli_close($conn);
?>
