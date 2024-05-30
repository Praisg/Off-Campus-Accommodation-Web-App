<?php 
include("config.php");
$error="";
$msg="";
if(isset($_POST['send']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message))
	{
		
		$sql="INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
		   $result=mysqli_query($conn, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
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
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

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
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner -->
        <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Contact</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
        <!--	Banner -->
		
        <!--	Contact Information -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 bg-secondary">
                        <div class="contact-info">
                            <h3 class="mb-4 mt-4 text-white">Contacts</h3>
							
                            <ul>
                                <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Address</h5>
                                        <span class="text-white">Belveder, Harare</span> <br>
										</div>
                                </li>
                                <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Call Us</h5>
                                        <span class="d-table text-white">+1 234-567-8910</span>
										
									</div>
                                </li>
                                <li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Email Adderss</h5>
										<span class="d-table text-white">helpline@..com</span>
										
										</div>
                                </li>
                            </ul>
                        </div>
                    </div>
					<div class="col-lg-1"></div>
                    <div class="col-md-12 col-lg-7">
						<div class="container">
                        <div class="row">
							<div class="col-lg-12">
								<h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
								<?php echo $msg; ?><?php echo $error; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form class="w-100" action="#" method="post">
									<div class="row">
										<div class="row mb-4">
											<div class="form-group col-lg-6">
												<input type="text"  name="name" class="form-control" placeholder="Your Name*">
											</div>
											<div class="form-group col-lg-6">
												<input type="text"  name="email" class="form-control" placeholder="Email Address*">
											</div>
											<div class="form-group col-lg-6">
												<input type="text"  name="phone" class="form-control" placeholder="Phone" maxlength="10">
											</div>
											<div class="form-group col-lg-6">
												<input type="text" name="subject"  class="form-control" placeholder="Subject">
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
												</div>
											</div>
										</div>
										<button type="submit" value="send message" name="send" class="btn btn-success">Send Message</button>
									</div>
								</form>
							</div>
						</div>
						</div>
					</div>
                </div>
            </div>
</div>
		<iframe src="https://www.google.com/search?client=firefox-b-d&sca_esv=591553bf2b9a7dbe&tbm=lcl&sxsrf=ACQVn08-fM1moU5X0Yt895Gh2phVJx_Oig:1711059767212&q=Harare+Institute+of+Technology+(HIT).&rflfq=1&num=20&stick=H4sIAAAAAAAAAB1QO04cURDUBiDHDCJ40SRIJkH9_9wAMgdcYIUGY2nFoN114Ov4BJyLU1BD8qRXXdVVXT8ux5VpeYYHC1VZa-uYNNuE0pVcQ6zCdFyzpSYJRiylrJFCYzJqSg5qlxILd_UxibOkkWcHuSkVEfSiRiAYdqi1REaMKZmdiAtkDxhEblTPNCQw5CEm6GTbGk0N71B2rqgO-05FRGIpIEMW8B1X7N6VhZxKVo4wY6o2MzZTS28vxQ9gYVHBwSmUQqprTEDUxUOFhIkjeTtfxJOgd_SV3EWyoeCpRjPepCiuZhwVAWOctb2eUon4ECBdcCopGs9U2eJjxsaE8lsKFUcCLTgjtELjhrLZ5GO3-9zd_FrW98My7w-ndT4t--Pz6_yyHv9f3D7sj_vjMj--nc5_zn_Py7y-zE_L8-vbelh__5t_Pjw-3d1_AbQis3XwAQAA&ved=2ahUKEwiBw_SssoaFAxW9S_EDHfyJAw0QjHJ6BAhREAU&rldimm=438576561208849393#rlfi=hd:;si:;mv:[[-17.7314953,31.109536499999997],[-17.9425325,30.970818899999998]]" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		<!--	Map -->
        
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
<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script>  

</body>
</html>