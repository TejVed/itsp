


<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:./");
	}

	$user_email=$_SESSION['user'];
	include "php/dbconnect.php";


	$query=mysqli_query($con,"SELECT * FROM s_users WHERE user_email='$user_email'");
	$count=mysqli_num_rows($query); echo $count;
	if($count==0){header("location:./");}
	else{
		$user=mysqli_fetch_assoc($query);
	}

	/*$photo="[1,2,3,4,5]";
	

	$photo=json_decode($photo,true);

	if(in_array(5, $photo)){
		print_r("5 is present");
	}
	else{
		print_r("5 is not present");
	}*/

	require_once('class-query.php');
	
	$logged_user_id = 1;

	if(isset($_FILES['img'])){
		if ($_FILES["img"]["error"] > 0) {
	    echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
	  } else {
	    echo "Upload: " . $_FILES["img"]["name"] . "<br>";
	    echo "Type: " . $_FILES["img"]["type"] . "<br>";
	    echo "Size: " . ($_FILES["img"]["size"] / 1024) . " kB<br>";
	    echo "Temp file: " . $_FILES["img"]["tmp_name"] . "<br>";
	   
	      move_uploaded_file($_FILES["img"]["tmp_name"],
	      "upload/" .$user['ID'].".jpg");
	      echo "Stored in: " . "upload/" .$user['ID'].".jpg";

	    
	  }
	}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>SOLID - Bootstrap 3 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.js"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        
        <div class="navbar-collapse collapse navbar-right" >
          <ul class="nav navbar-nav">
            <li class="active"><a href="homepage.php">HOME</a></li>
            <li><a href="profile.php">PROFILE</a></li>
         
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">SOCIALIZE <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="addfriend.php">FRIEND REQUESTS</a></li>
                <li><a href="inbox.php">MESSAGES</a></li>
                <li>NOTIFICATIONS</li>
                <li><a href="logout.php">Logout</a></li>
             
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div><br><br>


	

	
	 
	
	 
	 
	<!-- *****************************************************************************************************************
	 MIDDLE CONTENT
	 ***************************************************************************************************************** -->

	<div class="container mtb">
	 	<div class="row">
	 		<div class="col-md-12 well">
	 			<?php
	 				if(file_exists('./upload/'.$user['ID'].'.jpg')){
	 					echo '<img src="'.'./upload/'.$user['ID'].'.jpg'.'">';
	 				}

	 			?>

	 			<h1>Welcome <?php echo $user['user_nicename']." ".$user['user_lastname']; ?></h1>
	 			<div class="col-lg-8 col=lg-offset-2">
				<textarea rows="2" cols="120" placeholder="What would you like to share?"> </textarea>			
				</div>
	 		</div>
	 		
	 		<div class="col-lg-4">
	 		<h4>Upload your profile picture</h4>
	 		<div class="content">
			<?php //$query->do_news_feed($logged_user_id); ?>
				</div>
				<form method="post" enctype="multipart/form-data" >
				
					<input type="file" name="img" accept="image/*">
					<button class="btn">Upload</button>
				</form>
	 		<a href="register.php"><button><h3> Update your info </h3></button></a><br>
	 		<a href="addfriend.php"><button><h3> Add friends </h3></button></a><br>
	 		
	 		</div>
	 	</div><! --/row -->
        


    </div><! --/container -->
	 
	

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>This is our social networking site. Made by students of IIT Bombay</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="www.dribbble.com"><i class="fa fa-dribbble"></i></a>
		 				<a href="http://facebook.com"><i class="fa fa-facebook"></i></a>
		 				<a href="http://twitter.com"><i class="fa fa-twitter"></i></a>
		 				
		 				
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Our Bunker</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 			    Mechanical engineering<br>
		 				IIT Bombay<br> 
		 				Powai, Mumbai<br>
		 				Maharashtra.
		 			</p>
		 		</div>
		 	
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/retina-1.1.0.js"></script>
	<script src="assets/js/jquery.hoverdir.js"></script>
	<script src="assets/js/jquery.hoverex.min.js"></script>
	<script src="assets/js/jquery.prettyPhoto.js"></script>
  	<script src="assets/js/jquery.isotope.min.js"></script>
  	<script src="assets/js/custom.js"></script>


    <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>
  </body>
</html>