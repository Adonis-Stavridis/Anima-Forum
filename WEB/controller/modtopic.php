<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/topic.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['nom']) && isset($_POST['nnom'])) {
  $nom = htmlentities($_POST['nom']);
  $nnom = htmlentities($_POST['nnom']);

  if ($nom == $nnom) {
    $_SESSION['message'] = "Topic <b>".$nnom."</b> is unchanged";
    header('Location: ../view/topic.php');
    exit;
  }

  require_once '../model/topic.php';

  $newtopic = new Topic();
  $newtopic->set_db();
  $ok = $newtopic->mod($nom,$nnom);

  if (!$ok) {
    $_SESSION['message'] = "Topic <b>".$nnom."</b> already exists!";
    header('Location: ../view/topic.php');
    exit;
  }
  $_SESSION['message'] = 'Topic <b>'.$nnom.'</b> modified successfully!';
  header('Location: ../view/topic.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/index.php');
exit;
?>
