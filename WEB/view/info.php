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
  <title>Anima-Forum - Information</title>
</head>

<body>
	<?php include 'header.php' ?>

  <div id="main">
    <h2>Information</h2>

    <p>
      This forum was made for a course of Web Developpement.
      <br>
      We hade to use PHP and a MySQL database.
      <br>
      The theme of the forum is animals: here you can share everything about animals!
    </p>

    <img src="images/dance.gif" alt="Chien qui dance" width="500px">
  </div>

  <?php include "footer.php" ?>
</body>

</html>
