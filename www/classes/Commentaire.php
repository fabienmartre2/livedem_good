<?php
Class Commentaire { 

	private $_id;
	private $_utilisateurId;
	private $_typeId;
	private $_objetId;
	private $_message;
	private $_date;
	private $_ip;

	public function __construct($id, $utilisateurId, $typeId, $objetId, $message, $date, $ip) {
		$this->_id = $id;
		$this->_utilisateurId = $utilisateurId;
		$this->_typeId = $typeId;
		$this->_objetId = $objetId;
		$this->_message = $message;
		$this->_date = $date;
		$this->_ip = $ip;
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
	public function getMessage(){
		return stripslashes($this->_message);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function getIp(){
		return stripslashes($this->_ip);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET `commentaire_id` = :commentaire_id WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':commentaire_id' => $this->getId(), ':commentaire_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET `utilisateur_id` = :utilisateur_id WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':commentaire_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setTypeId($typeId){
		$this->_typeId = $typeId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET `type_id` = :type_id WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':commentaire_id' => $this->getId(), ':type_id' => $this->getTypeId());
		return $resSelect->execute($data);
	}
	public function setObjetId($objetId){
		$this->_objetId = $objetId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET `commentaire_objetid` = :commentaire_objetid WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':commentaire_id' => $this->getId(), ':commentaire_objetid' => $this->getObjetId());
		return $resSelect->execute($data);
	}
	public function setMessage($message){
		$this->_message = $message;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET `commentaire_message` = :commentaire_message WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':commentaire_id' => $this->getId(), ':commentaire_message' => $this->getMessage());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET `commentaire_date` = :commentaire_date WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':commentaire_id' => $this->getId(), ':commentaire_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET `commentaire_ip` = :commentaire_ip WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':commentaire_id' => $this->getId(), ':commentaire_ip' => $this->getIp());
		return $resSelect->execute($data);
	}

	public function updateCommentaire(){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE commentaire SET
			`commentaire_id` = :commentaire_id, 
			`utilisateur_id` = :utilisateur_id, 
			`type_id` = :type_id, 
			`commentaire_objetid` = :commentaire_objetid, 
			`commentaire_message` = :commentaire_message, 
			`commentaire_date` = :commentaire_date, 
			`commentaire_ip` = :commentaire_ip
		 WHERE commentaire_id = :commentaire_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(
			':commentaire_id' => $this->getId(), 
			':utilisateur_id' => $this->getUtilisateurId(), 
			':type_id' => $this->getTypeId(), 
			':commentaire_objetid' => $this->getObjetId(), 
			':commentaire_message' => $this->getMessage(), 
			':commentaire_date' => $this->getDate(), 
			':commentaire_ip' => $this->getIp()
		);
		return $resSelect->execute($data);
	}

	public static function selectCommentaire($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM commentaire WHERE commentaire_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vÃ©rifie la bonne rÃ©cuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new self(
			$data['commentaire_id'], 
			$data['utilisateur_id'], 
			$data['type_id'], 
			$data['commentaire_objetid'], 
			$data['commentaire_message'], 
			$data['commentaire_date'], 
			$data['commentaire_ip']
		);
	}
	
	public static function selectDistinctCommentaires($objetId, $typeId){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT DISTINCT utilisateur_id FROM commentaire WHERE commentaire_objetId = :objetId AND type_id= :typeId";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':objetId' => $objetId, ':typeId' => $typeId));
		$data = $resSelect->fetchall(PDO::FETCH_COLUMN, 0);
		// On vÃ©rifie la bonne rÃ©cuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return $data;
	}


	public static function insertCommentaire($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO commentaire SET ";
		$data = array();
		if(!empty($post['id'])){
			$reqSelect .=	'`commentaire_id` = :commentaire_id, ';
			$data['commentaire_id'] = $post['id'];
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
			$reqSelect .=	'`commentaire_objetid` = :commentaire_objetid, ';
			$data['commentaire_objetid'] = $post['objetId'];
		}
		if(!empty($post['message'])){
			$reqSelect .=	'`commentaire_message` = :commentaire_message, ';
			$data['commentaire_message'] = $post['message'];
		}
		if(!empty($post['date'])){
			$reqSelect .=	'`commentaire_date` = :commentaire_date, ';
			$data['commentaire_date'] = $post['date'];
		}
		if(!empty($post['ip'])){
			$reqSelect .=	'`commentaire_ip` = :commentaire_ip, ';
			$data['commentaire_ip'] = $post['ip'];
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
		if(!empty($post['message']))
			$this->setMessage($post['message']);
		if(!empty($post['date']))
			$this->setDate($post['date']);
		if(!empty($post['ip']))
			$this->setIp($post['ip']);
		return true;
	}

	public static function deleteCommentaire($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM commentaire WHERE commentaire_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public function selectCommentaires($page = 1, $max = 20, $where = null, $order = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT commentaire_id FROM commentaire";
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

	public static function getNbCommentaires($where = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT count(commentaire_id) as nombre FROM commentaire";
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
}
?>