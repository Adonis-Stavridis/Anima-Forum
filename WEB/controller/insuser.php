<?php
if(!isset($_SERVER['REQUEST_METHOD']) || !is_string($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../view/signup.php');
  exit;
}

session_start();
unset($_SESSION['message']);

if (isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['confirm']) && isset($_POST['pseudo']) && isset($_POST['mail'])) {
  $login = htmlentities($_POST['login']);
  $mdp = htmlentities($_POST['mdp']);
  $confirm = htmlentities($_POST['confirm']);
  $pseudo = htmlentities($_POST['pseudo']);
  $mail = htmlentities($_POST['mail']);

  if ($mdp != $confirm) {
    $_SESSION['message'] = 'Confirm your password correctly';
    header('Location: ../view/signup.php');
    exit;
  }

  require_once '../model/utilisateur.php';

  $newuser = new Utilisateur();
  $newuser->set_db();
  $ok = $newuser->ins($login, $mdp, $pseudo, $mail);

  if (!$ok) {
    $_SESSION['message'] = "Username '". $login ."' or pen name '". $pseudo ."' already exist";
    header('Location: ../view/signup.php');
    exit;
  }
  $_SESSION['message'] = 'Congratulations <b>'.$login. '</b>, your account has been created!<br> You can now log in!';
  header('Location: ../view/index.php');
  exit;
}

$_SESSION['message'] = "Enter values for all fields";
header('Location: ../view/signup.php');
exit;
?>
