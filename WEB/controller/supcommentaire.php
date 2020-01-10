<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/home.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['comid'])) {
  $id = htmlentities($_POST['comid']);

  require_once '../model/commentaire.php';

  $newcom = new Commentaire();
  $newcom->set_db();
  $ok = $newcom->sup($id);

  if (!$ok) {
    $_SESSION['message'] = "Error. Please retry later";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = 'Comment deleted!';
  header('Location: ../controller/getcommentaires.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/home.php');
exit;
?>
