<?php
Class Ville_Base { 

	private $_id;
	private $_nom;
	private $_article;
	private $_codepostal;
	private $_departementId;
	private $_lat;
	private $_long;
	private $_fichier;

	public function __construct($id, $nom, $article, $codepostal, $departementId, $lat, $long, $fichier) {
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_article = $article;
		$this->_codepostal = $codepostal;
		$this->_departementId = $departementId;
		$this->_lat = $lat;
		$this->_long = $long;
		$this->_fichier = $fichier;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function getArticle(){
		return stripslashes($this->_article);
	}
	public function getCodepostal(){
		return stripslashes($this->_codepostal);
	}
	public function getDepartementId(){
		return stripslashes($this->_departementId);
	}
	public function getLat(){
		return stripslashes($this->_lat);
	}
	public function getLong(){
		return stripslashes($this->_long);
	}
	public function getFichier(){
		return stripslashes($this->_fichier);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `ville_id` = :ville_id WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':ville_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `ville_nom` = :ville_nom WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':ville_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setArticle($article){
		$this->_article = $article;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `ville_article` = :ville_article WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':ville_article' => $this->getArticle());
		return $resSelect->execute($data);
	}
	public function setCodepostal($codepostal){
		$this->_codepostal = $codepostal;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `ville_codepostal` = :ville_codepostal WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':ville_codepostal' => $this->getCodepostal());
		return $resSelect->execute($data);
	}
	public function setDepartementId($departementId){
		$this->_departementId = $departementId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `departement_id` = :departement_id WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':departement_id' => $this->getDepartementId());
		return $resSelect->execute($data);
	}
	public function setLat($lat){
		$this->_lat = $lat;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `ville_lat` = :ville_lat WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':ville_lat' => $this->getLat());
		return $resSelect->execute($data);
	}
	public function setLong($long){
		$this->_long = $long;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `ville_long` = :ville_long WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':ville_long' => $this->getLong());
		return $resSelect->execute($data);
	}
	public function setFichier($fichier){
		$this->_fichier = $fichier;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE ville SET `ville_fichier` = :ville_fichier WHERE ville_id = :ville_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':ville_id' => $this->getId(), ':ville_fichier' => $this->getFichier());
		return $resSelect->execute($data);
	}

	public static function selectVille($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM ville WHERE ville_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Ville(
			$data['ville_id'], 
			$data['ville_nom'], 
			$data['ville_article'], 
			$data['ville_codepostal'], 
			$data['departement_id'], 
			$data['ville_lat'], 
			$data['ville_long'], 
			$data['ville_fichier']
		);
	}


	public static function insertVille($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO ville SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`ville_id` = :ville_id, ';
			$data['ville_id'] = $post['id'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`ville_nom` = :ville_nom, ';
			$data['ville_nom'] = $post['nom'];
		}
		if(isset($post['article'])){
			$reqSelect .=	'`ville_article` = :ville_article, ';
			$data['ville_article'] = $post['article'];
		}
		if(isset($post['codepostal'])){
			$reqSelect .=	'`ville_codepostal` = :ville_codepostal, ';
			$data['ville_codepostal'] = $post['codepostal'];
		}
		if(isset($post['departementId'])){
			$reqSelect .=	'`departement_id` = :departement_id, ';
			$data['departement_id'] = $post['departementId'];
		}
		if(isset($post['lat'])){
			$reqSelect .=	'`ville_lat` = :ville_lat, ';
			$data['ville_lat'] = $post['lat'];
		}
		if(isset($post['long'])){
			$reqSelect .=	'`ville_long` = :ville_long, ';
			$data['ville_long'] = $post['long'];
		}
		if(isset($post['fichier'])){
			$reqSelect .=	'`ville_fichier` = :ville_fichier, ';
			$data['ville_fichier'] = $post['fichier'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateVille($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['article']))
			$this->setArticle($post['article']);
		if(isset($post['codepostal']))
			$this->setCodepostal($post['codepostal']);
		if(isset($post['departementId']))
			$this->setDepartementId($post['departementId']);
		if(isset($post['lat']))
			$this->setLat($post['lat']);
		if(isset($post['long']))
			$this->setLong($post['long']);
		if(isset($post['fichier']))
			$this->setFichier($post['fichier']);
		return true;
	}

	public static function deleteVille($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM ville WHERE ville_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectVilles($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT ville.* FROM ville";
		if(!empty($join)){
			foreach($join as $cle => $valeur){
				$reqSelect .= " ".$cle." ON ".$valeur." ";
			}
		}
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			if(!is_array($where[0])){
				foreach($where as $cle => $valeur){
					$reqSelect .= " AND ".$valeur."";
				}
			}
			else{
				foreach($where[0] as $cle => $valeur){
					$reqSelect .= " AND ".$valeur."";
				}
			}
		}
		if(!empty($groupby)){
			$reqSelect .= " GROUP BY ".$groupby."";
		}
		if(!empty($order)){
			$reqSelect .= " ORDER BY ".$order."";
		}
		if($max != 0)
			$reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";
		$resSelect =  $connexion->prepare($reqSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		if(!empty($where) && isset($where[1]) && is_array($where[1])){
				$resSelect->execute($where[1]);
		}
		else{
				$resSelect->execute();
		}
		$datas = $resSelect->fetchall(PDO::FETCH_ASSOC);
		$result = array();
		foreach($datas as $data){
			$result[] = new Ville(
				$data['ville_id'], 
				$data['ville_nom'], 
				$data['ville_article'], 
				$data['ville_codepostal'], 
				$data['departement_id'], 
				$data['ville_lat'], 
				$data['ville_long'], 
				$data['ville_fichier']
			);
		}
		return $result;
	}

	public static function getNbVilles($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(ville.ville_id) as nombre FROM ville";
		if(!empty($join)){
			foreach($join as $cle => $valeur){
				$reqSelect .= " ".$cle." ON ".$valeur." ";
			}
		}
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			if(!is_array($where[0])){
				foreach($where as $cle => $valeur){
					$reqSelect .= " AND ".$valeur."";
				}
			}
			else{
				foreach($where[0] as $cle => $valeur){
					$reqSelect .= " AND ".$valeur."";
				}
			}
		}
		$resSelect =  $connexion->prepare($reqSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		if(!empty($where) && isset($where[1]) && is_array($where[1])){
				$resSelect->execute($where[1]);
		}
		else{
				$resSelect->execute();
		}
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		return $data['nombre'];
	}
}
?>