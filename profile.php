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






<link rel="stylesheet" href="profile.css" >
<link rel="stylesheet" href="style1.css" >
<!--<script type="text/javascript" src="home.js"></script>-->
<script src="https://kit.fontawesome.com/1d7b5c0471.js" crossorigin="anonymous"></script>

<!--<div id="navbar">
  <a class="active" href="javascript:void(0)">Home</a>
  <a href="javascript:void(0)">News</a>
  <a href="javascript:void(0)">Contact</a>
</div>-->
<!--<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>-->
<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h3 id="fh5co-logo"><i class="far fa-user-circle"></i> <?php echo $username ?></h3>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
                    <li><a href="main.php">Gallery</a></li>
					<li><a href="forum.php">Forum</a></li>
					<li class="fh5co-active"><a href="profile.php">Profile</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p>Copyright &copy; 2023.Team Mahou Shojo All rights reserved.</p>
				
			</div>

		</aside>
<div id="fh5co-main">
    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><a href="profileP.php">Update your profile!</a></h2>
    <h2 class="login"><a href="index.php">Log in</a></h2>
    <h2 class="logout"><a href="logout.php?username=<?php echo $username; ?>">Log out</a></h2>
</div>
<!--</div>-->



<?php

//Profiles fetch PHP

  $pselect = "SELECT Usernames.profileName, Usernames.description, Usernames.avatar, Usernames.topicCount, Usernames.replyCount, Usernames.artworkCount FROM Usernames
              WHERE Usernames.uid = $userid;";

  $presult = $conn->query($pselect);

  $row = $presult->fetch();

?>



<div class="container">
    <div class="box">
      <div class="profile">
        <img src="images/<?php echo $row["avatar"]; ?>" alt="">
      </div>
      <div class="info"> 
        <h3><?php echo $row["profileName"]; ?></h3>
        <p><?php echo $row["description"]; ?></p>
        <div class="user-info">
          <div class="left">
            <div class="item">
              <div class="post-num"><?php echo $row["topicCount"]; ?></div>
              <div class="post">Posts</div>
            </div>
          </div>
          <div class="center">
            <div class="item">
              <div class="follows-num"><?php echo $row["replyCount"]; ?></div>
              <div class="follows">Replies</div>
            </div>
          </div>
          <div class="right">
            <div class="item">
              <div class="following-num"><?php echo $row["artworkCount"]; ?></div>
              <div class="following">Artworks</div>
            </div>
          </div>
        </div>
        <div class="btn-p">
          <div class="btn-follow">Follow</div>
          <div class="btn-msg">Message</div>
        </div>
      </div>
    </div>
  </div>

