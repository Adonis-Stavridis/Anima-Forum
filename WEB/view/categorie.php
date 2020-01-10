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
  <title>Anima-Forum - Category</title>
</head>

<body>
	<?php	include 'header.php' ?>

  <?php
  require_once '../model/categorie.php';

  $newcat = new Categorie();
  $newcat->set_db();
  $ok = $newcat->get();

  $cats = '<option value="">Choose a category</option>';

  if ($ok != NULL) {
    while ($row = $ok->fetch(PDO::FETCH_ASSOC)) {
      $val = $row['Intitule'];
      $cats .= '<option value="'.$val.'">'.$val.'</option>';
    }
  }
  ?>

  <div id="main" class="cat">
    <h1>Categories settings</h1>
    <hr>

    <form action="../controller/inscategorie.php" method="post">
      <h2>Add a category</h2>
      <label for="nom"><b>Name of the category</b></label>
      <br>
      <input type="text" placeholder="Category name" name="nom" required>
      <button type="submit">Add</button>
    </form>
    <hr>

    <form action="../controller/modcategorie.php" method="post">
      <h2>Modify a category</h2>
      <label for="nom"><b>Name of the category</b></label>
      <br>
      <select name="nom" required><?php echo $cats ?></select>
      <br>
      <label for="nnom"><b>New name of the category</b></label>
      <br>
      <input type="text" placeholder="New category name" name="nnom" required>
      <button type="submit">Modify</button>
    </form>
    <hr>

    <form action="../controller/supcategorie.php" method="post">
      <h2>Delete a category</h2>
      <label for="nom"><b>Name of the category</b></label>
      <br>
      <select name="nom" required><?php echo $cats ?></select>
      <button id="sup" type="submit">Delete</button>
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
