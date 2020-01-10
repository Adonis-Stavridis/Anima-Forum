<?php

require_once "model_base.php";

class Commentaire extends Model_Base {
	public function ins($intitule, $utilisateur, $com) {
    $stmt = self::$_db->prepare('CALL ins_commentaire (:intitule, :utilisateur, :com)');
    $stmt->bindvalue(':intitule',$intitule,PDO::PARAM_STR);
    $stmt->bindvalue(':utilisateur',$utilisateur,PDO::PARAM_INT);
		$stmt->bindvalue(':com',$com,PDO::PARAM_INT);
    return($stmt->execute());
  }

	public function get($com) {
		$stmt = self::$_db->prepare('CALL get_commentaires (:com)');
		$stmt->bindvalue(':com',$com,PDO::PARAM_INT);
		if($stmt->execute()) {
			return ($stmt);
		}
		else {
			return (NULL);
		}
	}

  public function sup($id) {
    $stmt = self::$_db->prepare('CALL sup_commentaire (:id)');
    $stmt->bindvalue(':id',$id,PDO::PARAM_INT);
    return($stmt->execute());
  }

	public function note($note,$userid,$comid) {
		$stmt = self::$_db->prepare('SELECT Note FROM Commentaire_note WHERE Utilisateur = :userid AND Commentaire = :comid');
		$stmt->bindvalue(':userid',$userid,PDO::PARAM_INT);
		$stmt->bindvalue(':comid',$comid,PDO::PARAM_INT);
		$ok = $stmt->execute();
		if ($ok) {
			if ($stmt->rowCount() == 0) {
				$stmt1 = self::$_db->prepare('INSERT INTO Commentaire_note(Note, Utilisateur, Commentaire) VALUES (:note, :userid, :comid)');
				$stmt1->bindvalue(':note',$note,PDO::PARAM_INT);
				$stmt1->bindvalue(':userid',$userid,PDO::PARAM_INT);
				$stmt1->bindvalue(':comid',$comid,PDO::PARAM_INT);
				$ok1 = $stmt1->execute();
				if (!$ok1) {
					return $ok1;
				}
			}
			else {
				$stmt1 = self::$_db->prepare('UPDATE Commentaire_note SET Note = :note WHERE Utilisateur = :userid AND Commentaire = :comid');
				$stmt1->bindvalue(':note',$note,PDO::PARAM_INT);
				$stmt1->bindvalue(':userid',$userid,PDO::PARAM_INT);
				$stmt1->bindvalue(':comid',$comid,PDO::PARAM_INT);
				$ok1 = $stmt1->execute();
				if (!$ok1) {
					return $ok1;
				}
			}
			$stmt2 = self::$_db->prepare('SELECT SUM(Note) as Sum FROM Commentaire_note WHERE Commentaire = :comid');
			$stmt2->bindvalue(':comid',$comid,PDO::PARAM_INT);
			$ok2 = $stmt2->execute();
			if ($ok2) {
				if ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
					$stmt3 = self::$_db->prepare('UPDATE Commentaire SET Note = :note WHERE ID = :comid');
					$stmt3->bindvalue(':note',$row['Sum'],PDO::PARAM_INT);
					$stmt3->bindvalue(':comid',$comid,PDO::PARAM_INT);
					return ($stmt3->execute());
				}
			}
			else {
				return $ok2;
			}
		}
		else {
			return $ok;
		}
	}
}

?>
