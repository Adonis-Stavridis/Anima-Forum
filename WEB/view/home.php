<?php
session_start();
if (!isset($_SESSION['login']) && !isset($_SESSION['message_nbr'])) {
  $_SESSION['message'] = "You are a visitor! You can always log in or create an account for free";
  $_SESSION['message_nbr'] = 1;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="description" content="PHP Forum">
  <meta name="keywords" content="PHP, Forum">
  <meta name="author" content="Adonis STAVRIDIS">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="icon" href="images/doge.ico">
  <title>Anima-Forum - Home</title>
</head>

<body>

	<?php	include 'header.php' ?>

	<?php include 'nav.php' ?>

  <div id="home">
    <?php
    if (!isset($_SESSION['commentaires'])) {
      echo '<h1>Home</h1><p class="home">
      Choose on the left side of your screen a <b>Category</b>, then a <b>Topic</b>!<br><br>';
      if (isset($_SESSION['droit'])) {
        echo 'You can also modify topics with the button <b>Modify Topics</b>!<br><br>';
      }
      echo 'We have the coolest animals here!<br><br>
      <img src="images/cat.jpg" alt"cat on unicorn" width="500px"></p>';
    }
    else {
      echo $_SESSION['commentaires'];
    }
    ?>
  </div>

	<?php
	if ( isset($_SESSION['message']) && !empty($_SESSION['message']))	{
		echo "<div class='message'><h2>Notification</h2><p>" . $_SESSION['message'] . "</p></div>";
		unset($_SESSION['message']);
	}
  ?>

	<?php include "footer.php" ?>

</body>
