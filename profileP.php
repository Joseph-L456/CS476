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
?>



<?php

// Upload Profiles PHP

$pdescription = "";
$pavatar = "";
$uprofilename = "";



if(isset($_POST["updatesubmit"]) == TRUE){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $uprofilename = trim($_POST["updatename"]);
        $pavatar = trim($_POST["updateavatar"]);
        $pdescription = trim($_POST["updatedescription"]);

    }
    
    $queryupdate = "UPDATE Usernames 
                    SET profileName = '$uprofilename', description = '$pdescription', avatar = '$pavatar'
                    WHERE Usernames.uid = $userid;";
    $update = $conn->query($queryupdate);


    header("Location: profile.php"); 

}

?>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- Facebook and Twitter integration -->
    <!--<meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
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
                    <li><a href="forum.php">Forum</a></li>

                    <li><a href="profile.php">Profile</a></li> 

                </ul>
            </nav>

            <div class="fh5co-footer">
                <p>Copyright &copy; 2023.Team Mahou Shojo All rights reserved.</p>
            
            </div>

        </aside>

        <div id="fh5co-main">
            
            <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">

                <div class="row">
                    <div class="col-md-4">
                        <h2>Update Profile</h2>
                    </div>
                </div>
                <form id="updateprofile" method="post" action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="updatename" class="form-control" placeholder="Name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="file" name="updateavatar" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="updatedescription" id="message" cols="30" rows="7" class="form-control"
                                            placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="updatesubmit" class="btn btn-primary btn-md" value="Submit">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div id="map"></div>
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
    <!-- Google Map -->
    <!---<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>--->


    <!-- MAIN JS -->
    <script src="script1.js"></script>

</body>

</html>