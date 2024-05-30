<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

////// code
$error='';
$msg='';
if(isset($_POST['insert']))
{
    $name=$_POST['name'];
    $rating=$_POST['rating'];

    $content=$_POST['content'];

    $uid=$_SESSION['uid'];

    if(!empty($name) && !empty($rating) && !empty($content))
    {
        $sql="INSERT INTO reviews (uid,reviews,ratings) VALUES ('$uid','$content','$rating')";
        $result=mysqli_query($conn, $sql);
        if($result){
            $msg = "<p class='alert alert-success'>Review Send Successfully</p> ";
            
            // Update the ratings in the reviews table
            $updateSql = "UPDATE reviews SET ratings = (ratings + $rating) / 2";
            $updateResult = mysqli_query($conn, $updateSql);
            if($updateResult){
                $msg .= "<p class='alert alert-success'>Ratings Updated Successfully</p> ";
            } else {
                $error .= "<p class='alert alert-warning'>Failed to Update Ratings</p> ";
            }
        }
        else{
            $error = "<p class='alert alert-warning'>Review Not Send</p> ";
        }
    }else{
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--	Title
	=========================================================-->
<title>Real Estate PHP</title>
</head>
<body>

<!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
--> 


<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header1.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>REVIEW</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">REVIEW</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">REVIEW</h2>
                        </div>
					</div>
                <div class="dashboard-personal-info p-5 bg-white">
                    <form action="#" method="post">
                        <h5 class="text-secondary border-bottom-on-white pb-3 mb-4">review Form</h5>
						<?php echo $msg; ?><?php echo $error; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="user-id">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                                </div>                
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input type="number" name="rating" class="form-control" placeholder="Enter Rating" min="1" max="5">
                                </div>



                                <div class="form-group">
                                    <label for="about-me">Your Review</label>
                                    <textarea class="form-control" name="content" rows="7" placeholder="Your REview "></textarea>
                                </div>
                                <input type="submit" class="btn btn-info mb-4" name="insert" value="Send Feedback">
                            </div>
							</form>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 col-md-12">

                            <?php 
									$uid=$_SESSION['uid'];
									$query=mysqli_query($conn,"SELECT * FROM `user` WHERE uid='$uid'");
									while($row=mysqli_fetch_array($query))
									{
								?>
                                <div class="user-info mt-md-50"> <img src="admin/user/<?php echo $row['6'];?>" alt="userimage">
                                    <div class="mb-4 mt-3">
                                        
                                    </div>
									
                                    <div class="font-18">
                                        <div class="mb-1 text-capitalize"><b>Name:</b> <?php echo $row['1'];?></div>
                                        <div class="mb-1"><b>Email:</b> <?php echo $row['2'];?></div>
                                        <div class="mb-1"><b>Contact:</b> <?php echo $row['3'];?></div>
										<div class="mb-1 text-capitalize"><b>Role:</b> <?php echo $row['5'];?></div>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    
                </div>            
            </div>
        </div>
	<!--	Submit property   -->
       
        
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>