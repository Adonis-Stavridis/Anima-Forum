<?php
session_start();
unset($_SESSION['commentaires']);

if(isset($_POST['topicid']) && isset($_POST['topicut']) && isset($_POST['topicnote']) && isset($_POST['topicmod']) && isset($_POST['topic'])) {
  unset($_SESSION['topicid']);
  unset($_SESSION['topicut']);
  unset($_SESSION['topicnote']);
  unset($_SESSION['topicmod']);
  unset($_SESSION['topic']);

  $_SESSION['topicid'] = $_POST['topicid'];
  $_SESSION['topicut'] = $_POST['topicut'];
  $_SESSION['topicnote'] = $_POST['topicnote'];
  $_SESSION['topicmod'] = $_POST['topicmod'];
  $_SESSION['topic'] = $_POST['topic'];
}
if (isset($_SESSION['topicid']) && isset($_SESSION['topicut']) && isset($_SESSION['topicnote']) && isset($_SESSION['topicmod']) && isset($_SESSION['topic'])) {
  $intitule = htmlentities($_SESSION['topic']);
  $id = htmlentities($_SESSION['topicid']);
  $ut = htmlentities($_SESSION['topicut']);
  $note = htmlentities($_SESSION['topicnote']);
  $modif = htmlentities($_SESSION['topicmod']);

  $_SESSION['commentaires'] = '<div id="top_com">
  <div id="top_info">
  <h1>'.$intitule.'</h1>
  <p>Created by <b>'.$ut.'</b> and last modified on '.$modif.'<br>';

  if ($note == 0) {
    $_SESSION['commentaires'] .= "Be the first to rate this topic</p>";
  }
  else {
    $_SESSION['commentaires'] .= "Rate this topic</p>";
  }

  $_SESSION['commentaires'] .= '</div><div id="top_note">
  <form id="rate" action="../controller/insnotetopic.php" method="post">
  <div id="shownote">'.$note.'/5</div>
  <input type="submit" name="1" value="&#9733;">
  <input type="submit" name="2" value="&#9733;">
  <input type="submit" name="3" value="&#9733;">
  <input type="submit" name="4" value="&#9733;">
  <input type="submit" name="5" value="&#9733;">
  </form></div></div>';

  require_once '../model/commentaire.php';

  $newcom = new Commentaire();
  $newcom->set_db();
  $ok = $newcom->get($id);

  if ($ok != NULL) {
    while($crow = $ok->fetch(PDO::FETCH_ASSOC)) {
      $_SESSION['commentaires'] .= '<div id="commentaire">
      <div class="vote">
      <form id="vote" action="../controller/votecom.php" method="post">
      <input id="up" type="submit" name="up" value="&#8679;">
      <div id="shownotecom">'.$crow['Note'].'</div>
      <input type="hidden" name="note" value="'.$crow['Note'].'">
      <input type="hidden" name="comid" value="'.$crow['ID'].'">
      <input id="down" type="submit" name="down" value="&#8681;">
      </form>
      </div>
      <div class="cominfo">
      <p><b><u>'.$crow['Pseudo'].'</u> - '.$crow['Ecriture'].'</b><br><br>'.$crow['Intitule'].'</p>
      </div>';
      if (isset($_SESSION['droit']) && ($_SESSION['pseudo'] == $crow['Pseudo'] || $_SESSION['droit'] != "User")) {
        $_SESSION['commentaires'] .= '<form id="comsup" action="../controller/supcommentaire.php" method="post">
        <input type="hidden" name="comid" value="'.$crow['ID'].'">
        <input id="sup" type="submit" value="Delete">
        </form>';
      }
      if ($crow['Note'] >= 10) {
        $_SESSION['commentaires'] .= '<span id="verif">&#10004;</span>';
      }
      $_SESSION['commentaires'] .= '</div>';
    }
  }

  if (isset($_SESSION['droit'])) {
    $_SESSION['commentaires'] .= '<div id="addcom">
    <form class="addcom" action="../controller/inscommentaire.php" method="post">
    <textarea type="text" name="texte" maxlength="255" placeholder="Text"></textarea>
    <input type="submit" value="Add comment">
    </form>
    </div>';
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
