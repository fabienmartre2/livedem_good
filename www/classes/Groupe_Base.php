<?php
Class Groupe_Base { 

	private $_id;
	private $_nom;
	private $_thematiqueId;
	private $_utilisateurId;
	private $_sujet;
	private $_visibilite;
	private $_creation;

	public function __construct($id, $nom, $thematiqueId, $utilisateurId, $sujet, $visibilite, $creation) {
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_thematiqueId = $thematiqueId;
		$this->_utilisateurId = $utilisateurId;
		$this->_sujet = $sujet;
		$this->_visibilite = $visibilite;
		$this->_creation = $creation;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function getThematiqueId(){
		return stripslashes($this->_thematiqueId);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
	}
	public function getSujet(){
		return stripslashes($this->_sujet);
	}
	public function getVisibilite(){
		return stripslashes($this->_visibilite);
	}
	public function getCreation(){
		return stripslashes($this->_creation);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE groupe SET `groupe_id` = :groupe_id WHERE groupe_id = :groupe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':groupe_id' => $this->getId(), ':groupe_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE groupe SET `groupe_nom` = :groupe_nom WHERE groupe_id = :groupe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':groupe_id' => $this->getId(), ':groupe_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setThematiqueId($thematiqueId){
		$this->_thematiqueId = $thematiqueId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE groupe SET `thematique_id` = :thematique_id WHERE groupe_id = :groupe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':groupe_id' => $this->getId(), ':thematique_id' => $this->getThematiqueId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE groupe SET `utilisateur_id` = :utilisateur_id WHERE groupe_id = :groupe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':groupe_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setSujet($sujet){
		$this->_sujet = $sujet;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE groupe SET `groupe_sujet` = :groupe_sujet WHERE groupe_id = :groupe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':groupe_id' => $this->getId(), ':groupe_sujet' => $this->getSujet());
		return $resSelect->execute($data);
	}
	public function setVisibilite($visibilite){
		$this->_visibilite = $visibilite;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE groupe SET `groupe_visibilite` = :groupe_visibilite WHERE groupe_id = :groupe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':groupe_id' => $this->getId(), ':groupe_visibilite' => $this->getVisibilite());
		return $resSelect->execute($data);
	}
	public function setCreation($creation){
		$this->_creation = $creation;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE groupe SET `groupe_creation` = :groupe_creation WHERE groupe_id = :groupe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':groupe_id' => $this->getId(), ':groupe_creation' => $this->getCreation());
		return $resSelect->execute($data);
	}

	public static function selectGroupe($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM groupe WHERE groupe_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Groupe(
			$data['groupe_id'], 
			$data['groupe_nom'], 
			$data['thematique_id'], 
			$data['utilisateur_id'], 
			$data['groupe_sujet'], 
			$data['groupe_visibilite'], 
			$data['groupe_creation']
		);
	}


	public static function insertGroupe($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO groupe SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`groupe_id` = :groupe_id, ';
			$data['groupe_id'] = $post['id'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`groupe_nom` = :groupe_nom, ';
			$data['groupe_nom'] = $post['nom'];
		}
		if(isset($post['thematiqueId'])){
			$reqSelect .=	'`thematique_id` = :thematique_id, ';
			$data['thematique_id'] = $post['thematiqueId'];
		}
		if(isset($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(isset($post['sujet'])){
			$reqSelect .=	'`groupe_sujet` = :groupe_sujet, ';
			$data['groupe_sujet'] = $post['sujet'];
		}
		if(isset($post['visibilite'])){
			$reqSelect .=	'`groupe_visibilite` = :groupe_visibilite, ';
			$data['groupe_visibilite'] = $post['visibilite'];
		}
		if(isset($post['creation'])){
			$reqSelect .=	'`groupe_creation` = :groupe_creation, ';
			$data['groupe_creation'] = $post['creation'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateGroupe($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['thematiqueId']))
			$this->setThematiqueId($post['thematiqueId']);
		if(isset($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(isset($post['sujet']))
			$this->setSujet($post['sujet']);
		if(isset($post['visibilite']))
			$this->setVisibilite($post['visibilite']);
		if(isset($post['creation']))
			$this->setCreation($post['creation']);
		return true;
	}

	public static function deleteGroupe($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM groupe WHERE groupe_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectGroupes($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT groupe.* FROM groupe";
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
			$result[] = new Groupe(
				$data['groupe_id'], 
				$data['groupe_nom'], 
				$data['thematique_id'], 
				$data['utilisateur_id'], 
				$data['groupe_sujet'], 
				$data['groupe_visibilite'], 
				$data['groupe_creation']
			);
		}
		return $result;
	}

	public static function getNbGroupes($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(groupe.groupe_id) as nombre FROM groupe";
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