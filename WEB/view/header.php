<?php
session_start();
?>

<header>
  <a href="home.php" id="Home">Anima-Forum</a>
  <ul>
    <?php
    if (isset($_SESSION['login'])) {
    ?>
    <a href="profil.php">Profile -
    <?php echo $_SESSION['login']; ?>
    </a>
    <a href="index.php">Log out</a>
    <?php
    }
    else {
    ?>
    <a href="index.php">Log in</a>
    <a href="signup.php">Sign up</a>
    <?php } ?>
  </ul>
</header>
