<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/categorie.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['nom']) && isset($_SESSION['id'])) {
  $nom = htmlentities($_POST['nom']);

  require_once '../model/categorie.php';

  $newcat = new Categorie();
  $newcat->set_db();
  $ok = $newcat->ins($nom,$_SESSION['id']);

  if (!$ok) {
    $_SESSION['message'] = "This category already exists";
    header('Location: ../view/categorie.php');
    exit;
  }
  $_SESSION['message'] = 'Category <b>'.$nom.'</b> created successfully!';
  header('Location: ../view/categorie.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/index.php');
exit;
?>
