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
  <title>Anima-Forum - Topic</title>
</head>

<body>
	<?php	include 'header.php' ?>

  <?php
  require_once '../model/topic.php';

  $newtopic = new Topic();
  $newtopic->set_db();
  $categorie = $_SESSION['catid'];
  $ok = $newtopic->get($categorie);

  $topics = '<option value="">Choose a topic</option>';

  if ($ok != NULL) {
    while ($row = $ok->fetch(PDO::FETCH_ASSOC)) {
      $val = $row['Intitule'];
      $id = $row['ID'];
      $topics .= '<option value="'.$id.'">'.$val.'</option>';
    }
  }
  ?>

  <div id="main" class="cat">
    <h1>Topics settings</h1>
    <hr>

    <form action="../controller/instopic.php" method="post">
      <h2>Add a topic</h2>
      <label for="nom"><b>Name of the topic</b></label>
      <br>
      <input type="text" placeholder="Name of the topic" name="nom" required>
      <button type="submit">Add</button>
    </form>

    <?php
    if (isset($_SESSION['droit']) && $_SESSION['droit'] == "Admin") {
    ?>
    <hr>
    <form action="../controller/modtopic.php" method="post">
      <h2>Modify a topic</h2>
      <label for="nom"><b>Name of the topic</b></label>
      <br>
      <select name="nom" required><?php echo $topics ?></select>
      <br>
      <label for="nnom"><b>New name of the topic</b></label>
      <br>
      <input type="text" placeholder="New name of the topic" name="nnom" required>
      <button type="submit">Modify</button>
    </form>
    <?php
    }

    if (isset($_SESSION['droit']) && $_SESSION['droit'] != "User") {
    ?>
    <hr>
    <form action="../controller/suptopic.php" method="post">
      <h2>Delete a topic</h2>
      <label for="nom"><b>Name of the topic</b></label>
      <br>
      <select name="nom" required><?php echo $topics ?></select>
      <button id="sup" type="submit">Delete</button>
    </form>
    <?php } ?>
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
