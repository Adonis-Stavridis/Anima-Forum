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

require_once '../model/topic.php';

$newtopic = new Topic();
$newtopic->set_db();

if (isset($_POST['1'])) {
  $ok = $newtopic->ins_note(1,$_SESSION['id'],$_SESSION['topicid']);
  if (!$ok) {
    $_SESSION['message'] = "This feature does not work unfortunately...";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = "Rating added!";
  header('Location: ../controller/getcommentaires.php');
  exit;
}
elseif (isset($_POST['2'])) {
  $ok = $newtopic->ins_note(2,$_SESSION['id'],$_SESSION['topicid']);
  if (!$ok) {
    $_SESSION['message'] = "This feature does not work unfortunately...";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = "Rating added!";
  header('Location: ../controller/getcommentaires.php');
  exit;
}
elseif (isset($_POST['3'])) {
  $ok = $newtopic->ins_note(3,$_SESSION['id'],$_SESSION['topicid']);
  if (!$ok) {
    $_SESSION['message'] = "This feature does not work unfortunately...";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = "Rating added!";
  header('Location: ../controller/getcommentaires.php');
  exit;
}
elseif (isset($_POST['4'])) {
  $ok = $newtopic->ins_note(4,$_SESSION['id'],$_SESSION['topicid']);
  if (!$ok) {
    $_SESSION['message'] = "This feature does not work unfortunately...";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = "Rating added!";
  header('Location: ../controller/getcommentaires.php');
  exit;
}
elseif (isset($_POST['5'])) {
  $ok = $newtopic->ins_note(5,$_SESSION['id'],$_SESSION['topicid']);
  if (!$ok) {
    $_SESSION['message'] = "This feature does not work unfortunately...";
    header('Location: ../view/home.php');
    exit;
  }
  $_SESSION['message'] = "Rating added!";
  header('Location: ../controller/getcommentaires.php');
  exit;
}
else {
  $_SESSION['message'] = "Session expired. Log in again!";
  header('Location: ../view/index.php');
  exit;
}
