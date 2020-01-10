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
  <title>Anima-Forum - Terms and Conditions</title>
</head>

<body>
  <?php include 'header.php' ?>

  <div id="main">
    <h2>Terms and Conditions</h2>

    <p>
      By using this website, you accept to respect every member of the forum.
      <br>
      Any report of offensive language and content could get you permanantly banned.
      <br>
      We don't support violence here!
    </p>

    <img src="images/sadcat.jpg" alt="Chat triste" width="500px">
  </div>

  <?php
	if ( isset($_SESSION['message']) && !empty($_SESSION['message']))	{
		echo "<div class='message'><h2>Notification</h2><p>" . $_SESSION['message'] . "</p></div>";
		unset($_SESSION['message']);
	}
  ?>

  <?php include 'footer.php' ?>
</body>

</html>
