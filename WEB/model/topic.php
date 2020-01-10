<?php

require_once "model_base.php";

class Topic extends Model_Base {
	public function ins($intitule, $utilisateur, $categorie) {
    $stmt = self::$_db->prepare('CALL ins_topic (:intitule, :utilisateur, :categorie)');
    $stmt->bindvalue(':intitule',$intitule,PDO::PARAM_STR);
    $stmt->bindvalue(':utilisateur',$utilisateur,PDO::PARAM_INT);
		$stmt->bindvalue(':categorie',$categorie,PDO::PARAM_INT);
    return($stmt->execute());
  }

	public function get($categorie) {
		$stmt = self::$_db->prepare('CALL get_topics (:categorie)');
		$stmt->bindvalue(':categorie',$categorie,PDO::PARAM_INT);
		if($stmt->execute()) {
			return ($stmt);
		}
		else {
			return (NULL);
		}
	}

	public function mod($id,$intitule) {
		$stmt = self::$_db->prepare('CALL mod_topic (:id, :intitule)');
		$stmt->bindvalue(':id',$id,PDO::PARAM_INT);
		$stmt->bindvalue(':intitule',$intitule,PDO::PARAM_STR);
		return($stmt->execute());
	}

  public function sup($id) {
    $stmt = self::$_db->prepare('CALL sup_topic (:id)');
    $stmt->bindvalue(':id',$id,PDO::PARAM_STR);
    return($stmt->execute());
  }

	public function ins_note($note,$userid,$topicid) {
		$stmt = self::$_db->prepare('SELECT Note FROM Topic_note WHERE Utilisateur = :userid AND Topic = :topicid');
		$stmt->bindvalue(':userid',$userid,PDO::PARAM_INT);
		$stmt->bindvalue(':topicid',$topicid,PDO::PARAM_INT);
		$ok = $stmt->execute();
		if ($ok) {
			if ($stmt->rowCount() == 0) {
				$stmt1 = self::$_db->prepare('INSERT INTO Topic_note(Note, Utilisateur, Topic) VALUES (:note, :userid, :topicid)');
				$stmt1->bindvalue(':note',$note,PDO::PARAM_INT);
				$stmt1->bindvalue(':userid',$userid,PDO::PARAM_INT);
				$stmt1->bindvalue(':topicid',$topicid,PDO::PARAM_INT);
				$ok1 = $stmt1->execute();
				if (!$ok1) {
					return $ok1;
				}
			}
			else {
				$stmt1 = self::$_db->prepare('UPDATE Topic_note SET Note = :note WHERE Utilisateur = :userid AND Topic = :topicid');
				$stmt1->bindvalue(':note',$note,PDO::PARAM_INT);
				$stmt1->bindvalue(':userid',$userid,PDO::PARAM_INT);
				$stmt1->bindvalue(':topicid',$topicid,PDO::PARAM_INT);
				$ok1 = $stmt1->execute();
				if (!$ok1) {
					return $ok1;
				}
			}
			$stmt2 = self::$_db->prepare('SELECT AVG(Note) as Avg FROM Topic_note WHERE Topic = :topicid');
			$stmt2->bindvalue(':topicid',$topicid,PDO::PARAM_INT);
			$ok2 = $stmt2->execute();
			if ($ok2) {
				if ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
					$stmt3 = self::$_db->prepare('UPDATE Topic SET Note = :note WHERE ID = :topicid');
					$stmt3->bindvalue(':note',$row['Avg'],PDO::PARAM_INT);
					$stmt3->bindvalue(':topicid',$topicid,PDO::PARAM_INT);
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
