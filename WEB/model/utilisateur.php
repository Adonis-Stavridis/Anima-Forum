<?php

require_once "model_base.php";

class Utilisateur extends Model_Base {
	public function ins($login, $mdp, $pseudo, $mail) {
		$stmt = self::$_db->prepare('CALL ins_utilisateur (:login, :mdp, :pseudo, :mail)');
		$stmt->bindvalue(':login', $login, PDO::PARAM_STR);
		$stmt->bindvalue(':mdp', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
		$stmt->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->bindvalue(':mail', $mail, PDO::PARAM_STR);
		return ($stmt->execute());
	}

	public function connect($login, $mdp) {
		$stmt = self::$_db->prepare('CALL con_utilisateur (:login)');
		$stmt->bindValue(':login', $login, PDO::PARAM_STR);
		$ok = $stmt->execute();
		if ($ok) {
			$data = $stmt->fetch();
			$n_ok = password_verify($mdp, $data["Mdp"]);
			if ($n_ok) {
				$_SESSION['id'] = $data["ID"];
				$_SESSION['login'] = $data["Login"];
				$_SESSION['pseudo'] = $data["Pseudo"];
				$_SESSION['mail'] = $data["Mail"];
				$_SESSION['droit'] = $data["Signification"];
			}
			return ($n_ok);
		}
		return ($ok);
	}

	public function get_all() {
		$stmt = self::$_db->prepare('CALL get_utilisateurs ()');
		if($stmt->execute()) {
			return ($stmt);
		}
		else {
			return (NULL);
		}
	}

  public function sup($login) {
		$stmt = self::$_db->prepare('CALL sup_utilisateur (:login)');
		$stmt->bindvalue(':login', $login, PDO::PARAM_STR);
		return ($stmt->execute());
	}

	public function verif_mdp ($login, $mdp) {
		$stmt = self::$_db->prepare('CALL con_utilisateur (:login)');
		$stmt->bindValue(':login', $login, PDO::PARAM_STR);
		$ok = $stmt->execute();
		if ($ok) {
			$data = $stmt->fetch();
			$n_ok = password_verify($mdp, $data["Mdp"]);
			return ($n_ok);
		}
		return ($ok);
	}

	public function mod_mdp ($id, $mdp) {
		$stmt = self::$_db->prepare('CALL mod_mdp (:id, :mdp)');
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->bindvalue(':mdp', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
		return($stmt->execute());
	}

	public function mod_pseudo($id, $pseudo) {
		$stmt = self::$_db->prepare('CALL mod_pseudo (:id, :pseudo)');
		$stmt->bindvalue(':id', $id, PDO::PARAM_INT);
		$stmt->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
		return($stmt->execute());
	}

	public function mod_mail($id, $mail) {
		$stmt = self::$_db->prepare('CALL mod_mail (:id, :mail)');
		$stmt->bindvalue(':id', $id, PDO::PARAM_INT);
		$stmt->bindvalue(':mail', $mail, PDO::PARAM_STR);
		return($stmt->execute());
	}

	public function mod_droits($login, $droit) {
		$stmt = self::$_db->prepare('CALL mod_droits (:login, :droit)');
		$stmt->bindvalue(':login', $login, PDO::PARAM_STR);
		$stmt->bindvalue(':droit', $droit, PDO::PARAM_INT);
		return($stmt->execute());
	}
}

?>
