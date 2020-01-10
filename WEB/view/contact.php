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
  <title>Anima-Forum - Contact</title>
</head>

<body>
	<?php	include 'header.php' ?>
  <div id="main">
    <form action="../controller/fcontact.php" method="post">
      <h2>Contact</h2>
      <hr>
      <?php
      if (!isset($_SESSION['mail'])) {
      ?>
      <label for="mail"><b>Email address</b></label>
      <br>
      <input type="text" placeholder="Email address" name="mail" required autofocus>
      <br>
      <?php } ?>
      <label for="sujet"><b>Subject</b></label>
      <br>
      <input type="text" placeholder="Subject" name="sujet" required>
      <br>
      <label for="texte"><b>Text</b></label>
      <br>
      <textarea type="text" placeholder="Text" name="texte" rows="10" cols="50" required></textarea>
      <hr>
      <button type="submit">Send</button>
    </form>
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
