<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/home.php');
  exit;
}

session_start();
unset($_SESSION['message']);
unset($_SESSION['topics']);

if(isset($_POST['cat']) && isset($_POST['catid'])) {
  require_once '../model/topic.php';

  $topic = new Topic();
  $topic->set_db();
  $tok = $topic->get($_POST['catid']);

  $_SESSION['topics'] = "";

  if ($tok != NULL) {
    while($trow = $tok->fetch(PDO::FETCH_ASSOC)) {
      $_SESSION['topics'] .= '<li><form action="../controller/getcommentaires.php" method="post">
      <input type="hidden" name="topicid" value="'.$trow['ID'].'">
      <input type="hidden" name="topicut" value="'.$trow['Pseudo'].'">
      <input type="hidden" name="topicnote" value="'.$trow['Note'].'">
      <input type="hidden" name="topicmod" value="'.$trow['Modif'].'">
      <input id="topic" type="submit" name="topic" value="'.$trow['Intitule'].'"></form></li>';
    }
    $_SESSION['catid'] = $_POST['catid'];
  }

  if (isset($_SESSION['droit'])) {
    $_SESSION['topics'] .= '<li><a id="modtopic" href="topic.php">Modify Topics</a></li>';
  }

  header('Location: ../view/home.php');
  exit;
}
else {
  $_SESSION['message'] = "Session expired. Log in again!";
  header('Location: ../view/index.php');
  exit;
}
?>
