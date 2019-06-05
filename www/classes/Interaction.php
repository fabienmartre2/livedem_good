<?php
Class Interaction { 

	private $_id;
	private $_utilisateurId;
	private $_typeId;
	private $_objetId;
	private $_valeur;
	private $_date;
	private $_ip;
	private $_delete;

	public function __construct($id, $utilisateurId, $typeId, $objetId, $valeur, $date, $ip, $delete) {
		$this->_id = $id;
		$this->_utilisateurId = $utilisateurId;
		$this->_typeId = $typeId;
		$this->_objetId = $objetId;
		$this->_valeur = $valeur;
		$this->_date = $date;
		$this->_ip = $ip;
		$this->_delete = $delete;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
	}
	public function getTypeId(){
		return stripslashes($this->_typeId);
	}
	public function getObjetId(){
		return stripslashes($this->_objetId);
	}
	public function getValeur(){
		return stripslashes($this->_valeur);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function getIp(){
		return stripslashes($this->_ip);
	}
	public function getDelete(){
		return stripslashes($this->_delete);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `interaction_id` = :interaction_id WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':interaction_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `utilisateur_id` = :utilisateur_id WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setTypeId($typeId){
		$this->_typeId = $typeId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `type_id` = :type_id WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':type_id' => $this->getTypeId());
		return $resSelect->execute($data);
	}
	public function setObjetId($objetId){
		$this->_objetId = $objetId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `interaction_objetid` = :interaction_objetid WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':interaction_objetid' => $this->getObjetId());
		return $resSelect->execute($data);
	}
	public function setValeur($valeur){
		$this->_valeur = $valeur;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `interaction_valeur` = :interaction_valeur WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':interaction_valeur' => $this->getValeur());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `interaction_date` = :interaction_date WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':interaction_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `interaction_ip` = :interaction_ip WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':interaction_ip' => $this->getIp());
		return $resSelect->execute($data);
	}
	public function setDelete($delete){
		$this->_delete = $delete;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET `interaction_delete` = :interaction_delete WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':interaction_id' => $this->getId(), ':interaction_delete' => $this->getDelete());
		return $resSelect->execute($data);
	}

	public function updateInteraction(){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE interaction SET
			`interaction_id` = :interaction_id, 
			`utilisateur_id` = :utilisateur_id, 
			`type_id` = :type_id, 
			`interaction_objetid` = :interaction_objetid, 
			`interaction_valeur` = :interaction_valeur, 
			`interaction_date` = :interaction_date, 
			`interaction_ip` = :interaction_ip, 
			`interaction_delete` = :interaction_delete
		 WHERE interaction_id = :interaction_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(
			':interaction_id' => $this->getId(), 
			':utilisateur_id' => $this->getUtilisateurId(), 
			':type_id' => $this->getTypeId(), 
			':interaction_objetid' => $this->getObjetId(), 
			':interaction_valeur' => $this->getValeur(), 
			':interaction_date' => $this->getDate(), 
			':interaction_ip' => $this->getIp(), 
			':interaction_delete' => $this->getDelete()
		);
		return $resSelect->execute($data);
	}

	public static function selectInteraction($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM interaction WHERE interaction_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vÃ©rifie la bonne rÃ©cuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new self(
			$data['interaction_id'], 
			$data['utilisateur_id'], 
			$data['type_id'], 
			$data['interaction_objetid'], 
			$data['interaction_valeur'], 
			$data['interaction_date'], 
			$data['interaction_ip'], 
			$data['interaction_delete']
		);
	}


	public static function insertInteraction($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO interaction SET ";
		$data = array();
		if(!empty($post['id'])){
			$reqSelect .=	'`interaction_id` = :interaction_id, ';
			$data['interaction_id'] = $post['id'];
		}
		if(!empty($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(!empty($post['typeId'])){
			$reqSelect .=	'`type_id` = :type_id, ';
			$data['type_id'] = $post['typeId'];
		}
		if(!empty($post['objetId'])){
			$reqSelect .=	'`interaction_objetid` = :interaction_objetid, ';
			$data['interaction_objetid'] = $post['objetId'];
		}
		if(!empty($post['valeur'])){
			$reqSelect .=	'`interaction_valeur` = :interaction_valeur, ';
			$data['interaction_valeur'] = $post['valeur'];
		}
		if(!empty($post['date'])){
			$reqSelect .=	'`interaction_date` = :interaction_date, ';
			$data['interaction_date'] = $post['date'];
		}
		if(!empty($post['ip'])){
			$reqSelect .=	'`interaction_ip` = :interaction_ip, ';
			$data['interaction_ip'] = $post['ip'];
		}
		if(!empty($post['delete'])){
			$reqSelect .=	'`interaction_delete` = :interaction_delete, ';
			$data['interaction_delete'] = $post['delete'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateData($post, $files = array()){
		if(!empty($post['id']))
			$this->setId($post['id']);
		if(!empty($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(!empty($post['typeId']))
			$this->setTypeId($post['typeId']);
		if(!empty($post['objetId']))
			$this->setObjetId($post['objetId']);
		if(!empty($post['valeur']))
			$this->setValeur($post['valeur']);
		if(!empty($post['date']))
			$this->setDate($post['date']);
		if(!empty($post['ip']))
			$this->setIp($post['ip']);
		if(!empty($post['delete']))
			$this->setDelete($post['delete']);
		return true;
	}

	public static function deleteInteraction($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM interaction WHERE interaction_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public function selectInteractions($page = 1, $max = 20, $where = null, $order = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT interaction_id FROM interaction";
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			foreach($where as $cle => $valeur){
				$reqSelect .= " AND ".$valeur."";
			}
		}
		if(!empty($order)){
			$reqSelect .= " ORDER BY ".$order."";
		}
		if($max != 0)
			$reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute();
		$data = $resSelect->fetchall(PDO::FETCH_COLUMN, 0);
		return $data;
	}

	public static function getNbInteractions($where = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT count(interaction_id) as nombre FROM interaction";
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			foreach($where as $cle => $valeur){
				$reqSelect .= " AND ".$valeur."";
			}
		}
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute();
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		return $data['nombre'];
	}


	public static function getNb($typeId, $objetId, $valeur){
		return Interaction::getNbInteractions(array("type_id = '".$typeId."'", "interaction_objetid = '".$objetId."'", "interaction_valeur = '".$valeur."'", "interaction_delete = 0"));
	}

	public static function existInteraction($utilisateurId, $typeId, $objetId, $valeur){
		$interactions = Interaction::selectInteractions(1, 1, array("utilisateur_id = '".$utilisateurId."'","type_id = '".$typeId."'", "interaction_objetid = '".$objetId."'", "interaction_valeur = '".$valeur."'", "interaction_delete = 0"));
		if($interactions)
			return $interactions[0];
		else
			return false;
	}
}
?>