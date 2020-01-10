<?php
session_start();
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
  <title>Anima-Forum - Sign up</title>
</head>

<body>
  <?php include 'header.php' ?>

  <div id="main">
    <div class="column">
      <p>By creating an account, your are agreeing of the <a href="conditions.php">Terms and Conditions</a>.</p>
      <p>You already have an account, or want to access as Visitor? <a href="index.php">Log in</a></p>

      <img src="images/doge.png" alt="doge" width="500px">
    </div>
    <div class="column">
      <form action="../controller/insuser.php" method="post">
        <h2>Sign up</h2>
        <hr>
        <label for="login"><b>Username</b></label>
        <br>
        <input type="text" placeholder="Username" name="login" required autofocus>
        <br>
        <label for="mdp"><b>Password</b></label>
        <br>
        <input type="password" placeholder="Password" name="mdp" required>
        <br>
        <label for="confirm"><b>Confirm Password</b></label>
        <br>
        <input type="password" placeholder="Password" name="confirm" required>
        <br>
        <label for="pseudo"><b>Pen Name</b></label>
        <br>
        <input type="text" placeholder="Pen Name" name="pseudo" required>
        <br>
        <label for="mail"><b>Email address</b></label>
        <br>
        <input type="email" placeholder="Email address" name="mail" required>
        <hr>
        <button type="submit">Create</button>
      </form>
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
