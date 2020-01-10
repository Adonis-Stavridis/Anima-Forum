<?php

require_once "model_base.php";

class Categorie extends Model_Base {
	public function ins($intitule, $utilisateur) {
    $stmt = self::$_db->prepare('CALL ins_categorie (:intitule, :utilisateur)');
    $stmt->bindvalue(':intitule',$intitule,PDO::PARAM_STR);
    $stmt->bindvalue(':utilisateur',$utilisateur,PDO::PARAM_INT);
    return($stmt->execute());
  }

	public function get() {
		$stmt = self::$_db->prepare('CALL get_categories ()');
		if($stmt->execute()) {
			return ($stmt);
		}
		else {
			return (NULL);
		}
	}

	public function mod($intitule, $nintitule) {
		$stmt = self::$_db->prepare('CALL mod_categorie (:intitule, :nintitule)');
    $stmt->bindvalue(':intitule',$intitule,PDO::PARAM_STR);
		$stmt->bindvalue(':nintitule',$nintitule,PDO::PARAM_STR);
		return($stmt->execute());
	}

  public function sup($intitule) {
    $stmt = self::$_db->prepare('CALL sup_categorie (:intitule)');
    $stmt->bindvalue(':intitule',$intitule,PDO::PARAM_STR);
    return($stmt->execute());
  }
}

?>
