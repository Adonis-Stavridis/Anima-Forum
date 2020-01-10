<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/profil.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['usrlog']) && isset($_POST['curdroit']) && isset($_POST['droit']) && isset($_POST['Mod'])) {
  $usrlog = htmlentities($_POST['usrlog']);
  $curdroit = htmlentities($_POST['curdroit']);
  $droit = htmlentities($_POST['droit']);

  if ($curdroit == $droit) {
    $_SESSION['message'] = "No changes have been brought";
    header('Location: ../view/profil.php');
    exit;
  }

  require_once '../model/utilisateur.php';

  $user = new Utilisateur();
  $user->set_db();
  $ok = $user->mod_droits($usrlog, $droit);

  if (!$ok) {
  	$_SESSION['message'] = "Backend error. Operation could not be done";
  	header('Location: ../view/profil.php');
  	exit;
  }

  $_SESSION['message'] = "Permissions of <b>".$usrlog.'</b> modified!';
  header('Location: ../view/profil.php');
  exit;
}

$_SESSION['message'] = "Session expired. Log in again!";
header('Location: ../view/index.php');
exit;
?>
