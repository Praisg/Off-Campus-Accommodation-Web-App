<?php
include("config.php");
$fid = $_GET['id'];
$sql = "DELETE FROM feedback WHERE fid = {$fid}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Feedback Deleted</p>";
	header("Location:feedbackview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Feedback Not Deleted</p>";
	header("Location:feedbackview.php?msg=$msg");
}
mysqli_close($conn);
?>
