<?php
require_once 'global.php';

class Model_Base {
  protected static $_db;

  public static function set_db() {
    try {
			self::$_db = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
		}
		catch (PDOException $e) {
			$_SESSION['message'] = $e->getMessage();
			header('Location:index.php');
			exit;
		}
  }

  public static function close_db() {
    self::$_db= null;
  }
}
?>
