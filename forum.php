<?php

// Database connection
require_once("database.php");

try {
      $conn = new PDO($attr, $db_username, $db_password, $options);
  } catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

?>


<?php

  	$username = "Welcome";

    session_start();

    $username = $_SESSION["name_of_user"];
	$userid = $_SESSION["user_id"];

?>

<?php
	print_r($_SESSION);

	echo $username;
	echo $userid;
?>



<?php

//Posts fetch PHP

  $pselect = "SELECT Topics.tid, Topics.topicDate, Topics.topicTitle, Topics.topicContent, Topics.replyNumber, Usernames.uid, Usernames.profileName FROM Topics 
  			  INNER JOIN Usernames ON (Topics.uid = Usernames.uid)
			  ORDER BY Topics.tid DESC;";

  $presult = $conn->query($pselect);
  $rowCount = $presult->rowCount();
  $tid = 0;

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
  	<!-- Facebook and Twitter integration -->
	<!--<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />-->

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	
	<!-- Animate.css -->
	<!--<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<!--<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="bootstrap.css">
	<!-- Flexslider  -->
	<!--<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="style1.css">

	<!-- Modernizr JS -->
	<!--<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <script src="https://kit.fontawesome.com/1d7b5c0471.js" crossorigin="anonymous"></script>

	</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h3 id="fh5co-logo"><i class="far fa-user-circle"></i> <?php echo $username ?></h3>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
                    <li><a href="main.php">Gallery</a></li>
					<li class="fh5co-active"><a href="forum.php">Forum</a></li>
					<li><a href="profile.php">Profile</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p>Copyright &copy; 2023.Team Mahou Shojo All rights reserved.</p>
			</div>

		</aside>

		<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><a href="posts.php">Post your thoughts!</a></h2>
                <h2 class="logout"><a href="logout.php?username=<?php echo $username; ?>">Log out</a></h2>
				<div class="row row-bottom-padded-md">



<?php

$loopCounter = 0;
while($rowCount > 0 && $loopCounter < 12)
{
  $row = $presult->fetch();
?>

<?php

	if($tid != $row["tid"]){
	$tid = $row["tid"];
	$pnumber = $row["tid"];
	$author = $row["profileName"]
?>

					<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
							<div class="desc">
								<h3><a href="./artdisplay.php?pNumber=<?php echo $pnumber; ?>"><?php echo $row["topicTitle"]; ?></a></h3>
								<span><small>by <?php echo $author; ?> </small> / <small> <i class="icon-comment"></i> replies <?php echo $row["replyNumber"]; ?></small></span>
								<p><?php echo substr($row["topicContent"], 0, 40); //string mb_substr ($row["topicContent"], int $start [, int $length [, string $encoding]])?></p>
								<a href="./artdisplay.php?pNumber=<?php echo $pnumber; ?>" class="lead">Read More <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>

<?php
	}
  $rowCount--;
  $loopCounter++;
}
?>


				</div>
			</div>
		
			
		</div>
	</div>

	<!-- jQuery -->
	<!--<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<!--<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<!--<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<!--<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<!--<script src="js/jquery.flexslider-min.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="script1.js"></script>

	</body>
</html>

