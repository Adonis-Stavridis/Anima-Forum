<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/contact.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if ((isset($_SESSION['mail']) || isset($_POST['mail'])) && isset($_POST['sujet']) && isset($_POST['texte'])) {
  if (isset($_SESSION['mail'])) {
    $mail = $_SESSION['mail'];
  }
  elseif (isset($_POST['mail'])) {
    $mail = htmlentities($_POST['mail']);
  }
  else {
    $_SESSION['message'] = "Please indicate your email address";
    header("Location: ../view/contact.php");
    exit;
  }
  $sujet = "Forum Contact - ". htmlentities($_POST['sujet']);
  $texte = htmlentities($_POST['texte']);

  $mailTo = "adonis-ioannis.stavridis@etu.unistra.fr";
  $headers = "From: " . $mail;

  $_SESSION['message'] = "Your email has been sent!";
  header('Location: ../view/contact.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/index.php');
exit;

?>
