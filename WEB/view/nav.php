<?php
session_start();
?>

<nav>
  <ul>
    <?php
    require_once '../model/categorie.php';

    $newcat = new Categorie();
    $newcat->set_db();
    $ok = $newcat->get();

    if ($ok != NULL) {
      while ($row = $ok->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <li>
          <form action="../controller/gettopics.php" method="post">
            <?php
            echo '<input type="hidden" name="catid" value="'.$row['ID'].'">
            <input id="cat" type="submit" name="cat" value="'.$row['Intitule'].'">';
            ?>
          </form>

          <?php
          if (isset($_SESSION['topics']) && !empty($_SESSION['topics']) && isset($_SESSION['catid']) && $_SESSION['catid'] == $row['ID'])	{
        		echo $_SESSION['topics'];
        	}
          ?>
        </li>
    <?php
      }
    if (isset($_SESSION['login']) && isset($_SESSION['droit']) && $_SESSION['droit'] == "Admin") {
    ?>
    <li>
      <a id="modcat" href="categorie.php">Modify Categories</a>
    </li>
    <?php
    }
  }
  ?>
  </ul>
</nav>
