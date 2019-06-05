<?php
Class Petition_Base { 

	private $_id;
	private $_titre;
	private $_description;
	private $_utilisateurId;
	private $_date;
	private $_image;
	private $_statut;
	private $_categorieId;

	public function __construct($id, $titre, $description, $utilisateurId, $date, $image, $statut, $categorieId) {
		$this->_id = $id;
		$this->_titre = $titre;
		$this->_description = $description;
		$this->_utilisateurId = $utilisateurId;
		$this->_date = $date;
		$this->_image = $image;
		$this->_statut = $statut;
		$this->_categorieId = $categorieId;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getTitre(){
		return stripslashes($this->_titre);
	}
	public function getDescription(){
		return stripslashes($this->_description);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function getImage(){
		return stripslashes($this->_image);
	}
	public function getStatut(){
		return stripslashes($this->_statut);
	}
	public function getCategorieId(){
		return stripslashes($this->_categorieId);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `petition_id` = :petition_id WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':petition_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setTitre($titre){
		$this->_titre = $titre;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `petition_titre` = :petition_titre WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':petition_titre' => $this->getTitre());
		return $resSelect->execute($data);
	}
	public function setDescription($description){
		$this->_description = $description;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `petition_description` = :petition_description WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':petition_description' => $this->getDescription());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `utilisateur_id` = :utilisateur_id WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `petition_date` = :petition_date WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':petition_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setImage($image){
		$this->_image = $image;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `petition_image` = :petition_image WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':petition_image' => $this->getImage());
		return $resSelect->execute($data);
	}
	public function setStatut($statut){
		$this->_statut = $statut;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `petition_statut` = :petition_statut WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':petition_statut' => $this->getStatut());
		return $resSelect->execute($data);
	}
	public function setCategorieId($categorieId){
		$this->_categorieId = $categorieId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE petition SET `categorie_id` = :categorie_id WHERE petition_id = :petition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':petition_id' => $this->getId(), ':categorie_id' => $this->getCategorieId());
		return $resSelect->execute($data);
	}

	public static function selectPetition($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM petition WHERE petition_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Petition(
			$data['petition_id'], 
			$data['petition_titre'], 
			$data['petition_description'], 
			$data['utilisateur_id'], 
			$data['petition_date'], 
			$data['petition_image'], 
			$data['petition_statut'], 
			$data['categorie_id']
		);
	}


	public static function insertPetition($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO petition SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`petition_id` = :petition_id, ';
			$data['petition_id'] = $post['id'];
		}
		if(isset($post['titre'])){
			$reqSelect .=	'`petition_titre` = :petition_titre, ';
			$data['petition_titre'] = $post['titre'];
		}
		if(isset($post['description'])){
			$reqSelect .=	'`petition_description` = :petition_description, ';
			$data['petition_description'] = $post['description'];
		}
		if(isset($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`petition_date` = :petition_date, ';
			$data['petition_date'] = $post['date'];
		}
		if(isset($post['image'])){
			$reqSelect .=	'`petition_image` = :petition_image, ';
			$data['petition_image'] = $post['image'];
		}
		if(isset($post['statut'])){
			$reqSelect .=	'`petition_statut` = :petition_statut, ';
			$data['petition_statut'] = $post['statut'];
		}
		if(isset($post['categorieId'])){
			$reqSelect .=	'`categorie_id` = :categorie_id, ';
			$data['categorie_id'] = $post['categorieId'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updatePetition($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['titre']))
			$this->setTitre($post['titre']);
		if(isset($post['description']))
			$this->setDescription($post['description']);
		if(isset($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		if(isset($post['image']))
			$this->setImage($post['image']);
		if(isset($post['statut']))
			$this->setStatut($post['statut']);
		if(isset($post['categorieId']))
			$this->setCategorieId($post['categorieId']);
		return true;
	}

	public static function deletePetition($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM petition WHERE petition_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectPetitions($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT petition.* FROM petition";
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
			$result[] = new Petition(
				$data['petition_id'], 
				$data['petition_titre'], 
				$data['petition_description'], 
				$data['utilisateur_id'], 
				$data['petition_date'], 
				$data['petition_image'], 
				$data['petition_statut'], 
				$data['categorie_id']
			);
		}
		return $result;
	}

	public static function getNbPetitions($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(petition.petition_id) as nombre FROM petition";
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