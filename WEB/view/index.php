<?php
session_start();
if ( isset($_SESSION['message']) && !empty($_SESSION['message']))	{
  $ms = $_SESSION['message'];
}
session_unset();
if (isset($ms)) {
  $_SESSION['message'] = $ms;
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
  <title>Anima-Forum - Log in</title>
</head>

<body>
  <?php include 'header.php' ?>

  <div id="main">
    <div class="column">
      <p>
        This is a forum for all animals related discussions!
        <br>
        Our community is open to everyone. So come join us!
      </p>

      <img src="images/doge.png" alt="doge" width="500px">
    </div>
    <div class="column">
      <form action="../controller/authenticate.php" method="post">
        <h2>Log in</h2>
        <hr>
        <label for="login"><b>Username</b></label>
        <br>
        <input type="text" placeholder="Username" name="login" required autofocus>
        <br>
        <label for="mdp"><b>Password</b></label>
        <br>
        <input type="password" placeholder="Password" name="mdp" required>
        <br>
        <button type="submit">Log in</button>
        <br><br>
        <hr>
        <p>Don't have an account yet? <a href="signup.php">Sign up</a></p>
        <hr>
      </form>

    	<p>
    		You can also access the website, but with restricted permissions:
    	</p>
    	<button onclick="location.href='home.php'" type="button">Access as Visitor</button>
    </div>
  </div>

  <?php
	if ( isset($_SESSION['message']) && !empty($_SESSION['message']))	{
		echo "<div class='message'><h2>Notification</h2><p>" . $_SESSION['message'] . "</p></div>";
		unset($_SESSION['message']);
	}
  ?>

  <?php include "footer.php" ?>
</body>

</html>
