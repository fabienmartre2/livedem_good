<?php
Class Feed { 

	private $_type;
	private $_id;
	private $_date;

	public function __construct($type, $id, $date) {
		$this->_type = $type;
		$this->_id = $id;
		$this->_date = $date;
	}

	public function getType(){
		return $this->_type;
	}

	public function getId(){
		return $this->_id;
	}

	public function getDate(){
		return $this->_date;
	}

	public static function getFeed($utilisateurId, $page = 1, $max = 20){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM (";
		$reqSelect .= " (SELECT 1 as feed_type, mur_id as feed_id, mur_date as feed_date FROM mur WHERE mur_suppression = '0' AND type_conteneur = '0' )";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 2 as feed_type, photo_id as feed_id, photo_date as feed_date FROM photo WHERE photo_suppression = '0' AND type_conteneur = '0' AND (album_id IS NULL AND utilisateur_id = :utilisateur_id) )";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 6 as feed_type, interaction_id as feed_id, interaction_date as feed_date FROM interaction WHERE interaction_delete = 0 AND interaction_valeur = 2 AND (utilisateur_id = :utilisateur_id ) )";
		$reqSelect .= " )as feed ORDER BY feed_date DESC";
		if($max != 0)
			$reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':utilisateur_id' => $utilisateurId));
		$result = array();
		while($data = $resSelect->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Feed($data['feed_type'], $data['feed_id'], $data['feed_date']);
		}
		return $result;
	}

	public static function getFeedSpecial($typeConteneur, $conteneurId, $albumId='', $page = 1, $max = 20){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		if(empty($albumId)){
		$reqSelect =  "SELECT * FROM (";
		$reqSelect .= " (SELECT 1 as feed_type, mur_id as feed_id, mur_date as feed_date FROM mur WHERE mur_suppression = '0' AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id) ";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 2 as feed_type, photo_id as feed_id, photo_date as feed_date FROM photo WHERE photo_suppression = '0' AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id AND album_id IS NULL )";
		$reqSelect .= " )as feed ORDER BY feed_date DESC";
		}
		else{
			$reqSelect =  "SELECT * FROM (";
			$reqSelect .= " (SELECT 1 as feed_type, mur_id as feed_id, mur_date as feed_date FROM mur WHERE mur_suppression = '0' AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id) ";
			$reqSelect .= " UNION";
			$reqSelect .= " (SELECT 2 as feed_type, photo_id as feed_id, photo_date as feed_date FROM photo WHERE photo_suppression = '0' AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id AND album_id = :album_id )";
			$reqSelect .= " )as feed ORDER BY feed_date DESC";
		}
		if($max != 0)
			$reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";
		$resSelect =  $connexion->prepare($reqSelect);
		if(empty($albumId))
			$resSelect->execute(array(':type_conteneur' => $typeConteneur, ':conteneur_id' => $conteneurId));
		else
			$resSelect->execute(array(':type_conteneur' => $typeConteneur, ':conteneur_id' => $conteneurId, ':album_id' => $albumId));
		$result = array();
		while($data = $resSelect->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Feed($data['feed_type'], $data['feed_id'], $data['feed_date']);
		}
		return $result;
	}

	public static function getPrivateFeed($utilisateurId, $page = 1, $max = 20){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM (";
		$reqSelect .= " (SELECT 1 as feed_type, mur_id as feed_id, mur_date as feed_date FROM mur WHERE mur_suppression = '0' AND type_conteneur = '0' AND utilisateur_id = :utilisateur_id  ) ";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 2 as feed_type, photo_id as feed_id, photo_date as feed_date FROM photo WHERE photo_suppression = '0' AND type_conteneur = '0' AND album_id IS NULL AND utilisateur_id = :utilisateur_id  )";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 6 as feed_type, interaction_id as feed_id, interaction_date as feed_date FROM interaction WHERE interaction_delete = 0 AND interaction_valeur = 2 AND utilisateur_id = :utilisateur_id)";
		$reqSelect .= " )as feed ORDER BY feed_date DESC";
		if($max != 0)
			$reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':utilisateur_id' => $utilisateurId));
		$result = array();
		while($data = $resSelect->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Feed($data['feed_type'], $data['feed_id'], $data['feed_date']);
		}
		return $result;
	}

	public static function getUpdateFeed($utilisateurId, $timestamp, $typeConteneur = "0", $conteneurId= "0"){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM ("."\n";

		// Je récupère le mur
		$reqSelect .= " (SELECT 1 as feed_type, mur_id as feed_id, mur_date as feed_date FROM mur WHERE mur_suppression = '0' AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id ) "."\n";
		$reqSelect .= " UNION"."\n";
		// Je récupère les photos
		$reqSelect .= " (SELECT 2 as feed_type, photo_id as feed_id, photo_date as feed_date FROM photo WHERE photo_suppression = '0' AND type_conteneur = :type_conteneur AND (album_id IS NULL AND utilisateur_id = :utilisateur_id))"."\n";
		$reqSelect .= " UNION"."\n";
		if($typeConteneur == 0){
		// Je récupère les commentaires
		$reqSelect .= " UNION"."\n";
		}
		$reqSelect .= " (SELECT 3 as feed_type, commentaire_id as feed_id, commentaire_date as feed_date FROM commentaire WHERE CONCAT(type_id, '-', commentaire_objetId) IN ("."\n";
			$reqSelect .= " SELECT * FROM ("."\n";
			$reqSelect .= " (SELECT CONCAT(1, '-' , mur_id) FROM mur WHERE type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id ) "."\n";
			$reqSelect .= " UNION"."\n";
			$reqSelect .= " (SELECT CONCAT(2, '-' , photo_id) FROM photo WHERE album_id IS NULL AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id )"."\n";
			$reqSelect .= " ) as reqcommentaire )"."\n";
		$reqSelect .= " )"."\n";
		// Fin commentaires

		// Je récupère les J'aime
		$reqSelect .= " UNION"."\n";
		$reqSelect .= " (SELECT 5 as feed_type, interaction_id as feed_id, interaction_date as feed_date FROM interaction WHERE interaction_valeur = 1 AND CONCAT(type_id, '-', interaction_objetId) IN ("."\n";
			$reqSelect .= " SELECT * FROM ("."\n";
			$reqSelect .= " (SELECT CONCAT(1, '-' , mur_id) FROM mur WHERE type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id ) "."\n";
			$reqSelect .= " UNION"."\n";
			$reqSelect .= " (SELECT CONCAT(2, '-' , photo_id) FROM photo WHERE album_id IS NULL AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id )"."\n";
			$reqSelect .= " UNION"."\n";
			// Je récupère les j'aime des commentaires
			$reqSelect .= " (SELECT CONCAT(3, '-' , commentaire_id) FROM commentaire WHERE CONCAT(type_id, '-', commentaire_objetId) IN ("."\n";
				$reqSelect .= " SELECT * FROM ("."\n";
				$reqSelect .= " (SELECT CONCAT(1, '-' , mur_id) FROM mur WHERE type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id  ) "."\n";
				$reqSelect .= " UNION"."\n";
				$reqSelect .= " (SELECT CONCAT(2, '-' , photo_id) FROM photo WHERE album_id IS NULL AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id  )"."\n";
				$reqSelect .= " ) as reqcommentairelike )"."\n";
			$reqSelect .= " )"."\n";
			$reqSelect .= " ) as reqjaime )"."\n";
		$reqSelect .= " )"."\n";
		// Fin j'aime

		// Je récupère les J'aime pas
		$reqSelect .= " UNION"."\n";
		$reqSelect .= " (SELECT 6 as feed_type, interaction_id as feed_id, interaction_date as feed_date FROM interaction WHERE interaction_valeur = 2 AND CONCAT(type_id, '-', interaction_objetId) IN ("."\n";
			$reqSelect .= " SELECT * FROM ("."\n";
			$reqSelect .= " (SELECT CONCAT(1, '-' , mur_id) FROM mur WHERE type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id ) "."\n";
			$reqSelect .= " UNION"."\n";
			$reqSelect .= " (SELECT CONCAT(2, '-' , photo_id) FROM photo WHERE album_id IS NULL AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id )"."\n";
			$reqSelect .= " UNION"."\n";
			// Je récupère les j'aime des commentaires
			$reqSelect .= " (SELECT CONCAT(3, '-' , commentaire_id) FROM commentaire WHERE CONCAT(type_id, '-', commentaire_objetId) IN ("."\n";
				$reqSelect .= " SELECT * FROM ("."\n";
				$reqSelect .= " (SELECT CONCAT(1, '-' , mur_id) FROM mur WHERE type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id  ) "."\n";
				$reqSelect .= " UNION"."\n";
				$reqSelect .= " (SELECT CONCAT(2, '-' , photo_id) FROM photo WHERE album_id IS NULL AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id  )"."\n";
				$reqSelect .= " ) as reqcommentairedislike )"."\n";
			$reqSelect .= " )"."\n";

			$reqSelect .= " ) as reqjaimepas )"."\n";
		$reqSelect .= " )"."\n";
		// Fin j'aime

		$reqSelect .= " )as feed WHERE UNIX_TIMESTAMP(feed_date) > :timestamp ORDER BY feed_date DESC"."\n";
		

		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':utilisateur_id' => $utilisateurId, ':timestamp' => $timestamp, ':type_conteneur' => $typeConteneur, ':conteneur_id' => $conteneurId));
		$result = array();
		while($data = $resSelect->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Feed($data['feed_type'], $data['feed_id'], $data['feed_date']);
		}
		
		return $result;
	}

	public static function getFeedCommentaires($type_id, $objet_id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM (";
		$reqSelect .= " (SELECT 3 as feed_type, commentaire_id as feed_id, commentaire_date as feed_date FROM commentaire WHERE commentaire_objetId = :objet_id AND type_id = :type_id )";
		$reqSelect .= " )as feed ORDER BY feed_date ASC";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':type_id' => $type_id, ':objet_id' => $objet_id));
		$result = array();
		while($data = $resSelect->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Feed($data['feed_type'], $data['feed_id'], $data['feed_date']);
		}
		return $result;
	}

	public static function getParticipants($typeConteneur, $conteneurId){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT utilisateur_id FROM (";
		$reqSelect .= " (SELECT 1 as feed_type, mur_id as feed_id, mur_date as feed_date, utilisateur_id FROM mur WHERE mur_suppression = '0' AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id )";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 2 as feed_type, photo_id as feed_id, photo_date as feed_date, utilisateur_id FROM photo WHERE photo_suppression = '0' AND type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id )";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 3 as feed_type, commentaire_id as feed_id, commentaire_date as feed_date, utilisateur_id FROM commentaire WHERE type_id = 1 AND commentaire_objetId IN (SELECT mur_id FROM mur WHERE type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id ) )";
		$reqSelect .= " UNION";
		$reqSelect .= " (SELECT 6 as feed_type, interaction_id as feed_id, interaction_date as feed_date, utilisateur_id FROM interaction WHERE interaction_delete = 0 AND type_id = 1 AND interaction_objetId IN (SELECT mur_id FROM mur WHERE type_conteneur = :type_conteneur AND conteneur_id = :conteneur_id ))";
		$reqSelect .= " )as feed GROUP BY utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array( ':type_conteneur' => $typeConteneur, ':conteneur_id' => $conteneurId));
		$result = array();
		while($data = $resSelect->fetch(PDO::FETCH_ASSOC)){
			$result[] = Utilisateur::selectUtilisateur($data['utilisateur_id']);
		}
		return $result;
	}

	public function getHTML(){
		$smarty = new Smarty();
		$smarty->setTemplateDir(LOCALISATION.'templates/');
		$smarty->setCompileDir(LOCALISATION.'data/templates_c/');
		$smarty->setCacheDir(LOCALISATION.'data/cache/');
		$smarty->caching = false;
		$smarty->force_compile = true;
		$smarty->assign('ADRESSE', ADRESSE);
		$smarty->assign('MARQUE', MARQUE);
		$smarty->assign('PAYPAL', PAYPAL);
		$smarty->assign('EMAIL', EMAIL);
		$smarty->assign('feed', $this);
		$output = $smarty->fetch('view_feed.tpl');
		return $output;
	}

}
?>