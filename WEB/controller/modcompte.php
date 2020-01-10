<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/profil.php');
  exit;
}

session_start();
unset($_SESSION['message']);

require_once '../model/utilisateur.php';

$user = new Utilisateur();
$user->set_db();

if (isset($_POST['mdp']) && isset($_SESSION['login'])) {
  $ok = $user->verif_mdp($_SESSION['login'], $_POST['mdp']);

  if (!$ok) {
    $_SESSION['message'] = "Password incorrect";
    header('Location: ../view/profil.php');
    exit;
  }
}
else {
  $_SESSION['message'] = "Session expired. Log in again!";
  header('Location: ../view/index.php');
  exit;
}

if (isset($_POST['sup']) && isset($_SESSION['login'])) {
  $ok = $user->sup($_SESSION['login']);

  if (!$ok) {
    $_SESSION['message'] = "Account could not be deleted";
    header('Location: ../view/profil.php');
    exit;
  }
  else {
    $_SESSION['message'] = "Account <b>" .$_SESSION['login']. "</b> has been deleted!";
    header("Location: ../view/index.php");
    exit;
  }
}

$_SESSION['message'] = "";
$chgmt = 0;

if (isset($_POST['mod']) && isset($_POST['nmdp']) && !empty($_POST['nmdp']) && isset($_SESSION['id'])) {
  $ok = $user->mod_mdp($_SESSION['id'], $_POST['nmdp']);

  if (!$ok) {
    $_SESSION['message'] .= "Password could be modified<br>";
  }
  else {
    $_SESSION['message'] .= "Password modified!<br>";
    $chgmt++;
  }
}

if (isset($_POST['mod']) && isset($_POST['npseudo']) && !empty($_POST['npseudo']) && isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
  if ($_POST['npseudo'] == $_SESSION['pseudo']) {
    $_SESSION['message'] .= "Pen Name is unchanged<br>";
  }
  else {
    $ok = $user->mod_pseudo($_SESSION['id'], $_POST['npseudo']);

    if (!$ok) {
      $_SESSION['message'] .= "Pen Name could not be modified<br>";
    }
    else {
      unset($_SESSION['pseudo']);
      $_SESSION['pseudo'] = $_POST['npseudo'];
      $_SESSION['message'] .= "Pen Name modified!<br>";
      $chgmt++;
    }
  }
}

if (isset($_POST['mod']) && isset($_POST['nmail']) && !empty($_POST['nmail']) && isset($_SESSION['id']) && isset($_SESSION['mail'])) {
  if ($_POST['nmail'] == $_SESSION['mail']) {
    $_SESSION['message'] .= "Email address is unchanged<br>";
  }
  else {
    $ok = $user->mod_mail($_SESSION['id'], $_POST['nmail']);

    if (!$ok) {
      $_SESSION['message'] .= "Email address could be modified<br>";
    }
    else {
      unset($_SESSION['mail']);
      $_SESSION['mail'] = $_POST['nmail'];
      $_SESSION['message'] .= "Email address modified!<br>";
      $chgmt++;
    }
  }
}

if ($chgmt == 0) {
  $_SESSION['message'] .= "No changes have been brought";
}

header('Location: ../view/profil.php');
exit;
?>
