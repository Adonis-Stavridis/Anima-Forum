<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/profil.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['usrlog']) && isset($_POST['Sup'])) {
  $usrlog = htmlentities($_POST['usrlog']);

  require_once '../model/utilisateur.php';

  $user = new Utilisateur();
  $user->set_db();
  $ok = $user->sup($usrlog);

  if (!$ok) {
  	$_SESSION['message'] = "Backend error. Operation could not be done";
  	header('Location: ../view/profil.php');
  	exit;
  }

  $_SESSION['message'] = "User <b>".$usrlog.'</b> deleted!';
  header('Location: ../view/profil.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/index.php');
exit;
?>
