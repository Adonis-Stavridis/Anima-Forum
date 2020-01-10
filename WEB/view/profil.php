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
  <title>Anima-Forum - Profile</title>
</head>

<body>

	<?php	include 'header.php' ?>

  <div id="main">
    <h1>Profile</h1>
    <?php
    if (isset($_SESSION['droit']) && $_SESSION['droit'] == "Admin") {
    ?>
    <div class="column">
    <?php
    }
      echo '<p class="profil">
      <b>Username</b>: '.$_SESSION['login'].' |
      <b>Pen Name</b>: '.$_SESSION['pseudo'].' |
      <b>Email Address</b>: '.$_SESSION['mail'].' |
      <b>Permissions</b>: '.$_SESSION['droit'].'
      </p>';
    ?>

    <hr>
    <h2>Modify your information:</h2>
    <form id="profil" action="../controller/modcompte.php" onSubmit="return confirm('Are you sure of your changes?')" method="post">
      <label for="mdp">Password (required)</label>
      <br>
      <input type="password" placeholder="Password" name="mdp" required>
      <br>
      <label for="nmdp">New Password</label>
      <br>
      <input type="password" placeholder="New Password" name="nmdp">
      <br>
      <label for="npseudo">New username</label>
      <br>
      <input type="text" placeholder="New username" name="npseudo">
      <br>
      <label for="nmail">New email address</label>
      <br>
      <input type="mail" placeholder="New email address" name="nmail">
      <br>
      <input type="submit" name="mod" value="Modify">
      <input type="submit" id="sup" name="sup" value="Delete account">
    </form>

    <?php
    if (isset($_SESSION['droit']) && $_SESSION['droit'] == "Admin") {
    ?>
    </div>
    <div class="column">
      <?php include '../controller/gestion.php' ?>
    </div>
    <?php } ?>
  </div>

	<?php
	if (isset($_SESSION['message']) && !empty($_SESSION['message']))	{
		echo "<div class='message'><h2>Notification</h2><p>" . $_SESSION['message'] . "</p></div>";
		unset($_SESSION['message']);
	}
  ?>

	<?php include "footer.php" ?>

</body>
