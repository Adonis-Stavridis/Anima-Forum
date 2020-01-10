<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/topic.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['nom'])) {
  $id = htmlentities($_POST['nom']);

  require_once '../model/topic.php';

  $newtopic = new Topic();
  $newtopic->set_db();
  $ok = $newtopic->sup($id);

  if (!$ok) {
    $_SESSION['message'] = "Error. Please retry later";
    header('Location: ../view/topic.php');
    exit;
  }
  $_SESSION['message'] = 'Topic <b>'.$nom.'</b> deleted successfully!';
  header('Location: ../view/topic.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/index.php');
exit;
?>
