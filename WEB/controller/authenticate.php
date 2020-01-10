<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/index.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['login']) && isset($_POST['mdp'])) {
  $login = htmlentities($_POST['login']);
  $mdp = htmlentities($_POST['mdp']);

  require_once '../model/utilisateur.php';

  $user = new Utilisateur();
  $user->set_db();
  $ok = $user->connect($login, $mdp);

  if (!$ok) {
  	$_SESSION['message'] = 'Wrong username or password';
  	header('Location: ../view/index.php');
  	exit;
  }

  $_SESSION['message'] = "Woofcome <b>".$_SESSION['pseudo'].'</b>!';
  header('Location: ../view/home.php');
  exit;
}

$_SESSION['message'] = "Enter values for all fields";
header('Location: ../view/index.php');
exit;
?>
