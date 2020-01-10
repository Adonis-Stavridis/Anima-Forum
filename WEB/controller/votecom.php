<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/home.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (!isset($_SESSION['id'])) {
  $_SESSION['message'] = "You can't vote. Log in to have access to this feature";
  header('Location: ../view/home.php');
  exit;
}

require_once '../model/commentaire.php';

$newcom = new Commentaire();
$newcom->set_db();

if (isset($_POST['note']) && isset($_POST['comid']) && isset($_POST['up'])) {
  $note= htmlentities($_POST['note']);
  $note++;

  $ok = $newcom->note($note,$_SESSION['id'],$_POST['comid']);

  if (!$ok) {
    $_SESSION['message'] = "Error. Please retry later";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = 'Rating added!';
  header('Location: ../controller/getcommentaires.php');
  exit;
}

if (isset($_POST['note']) && isset($_POST['comid']) && isset($_POST['down'])) {
  $note= htmlentities($_POST['note']);
  $note--;

  $ok = $newcom->note($note,$_SESSION['id'],$_POST['comid']);

  if (!$ok) {
    $_SESSION['message'] = "Error. Please retry later";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = 'Rating added!';
  header('Location: ../controller/getcommentaires.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/home.php');
exit;
?>
