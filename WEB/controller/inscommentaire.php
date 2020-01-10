<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/home.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['texte']) && isset($_SESSION['id']) && isset($_SESSION['topicid'])) {
  $texte= htmlentities($_POST['texte']);

  require_once '../model/commentaire.php';

  $newcom = new Commentaire();
  $newcom->set_db();
  $ok = $newcom->ins($texte,$_SESSION['id'],$_SESSION['topicid']);

  if (!$ok) {
    $_SESSION['message'] = "Error. Please retry later";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = 'Comment added!';
  header('Location: ../controller/getcommentaires.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/home.php');
exit;
?>
