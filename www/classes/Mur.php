
<?php
Class Mur { 

	private $_id;
	private $_utilisateurId;
	private $_message;
	private $_date;
	private $_ip;
	private $_typeConteneur;
	private $_conteneurId;
	private $_suppression;

	public function __construct($id, $utilisateurId, $message, $date, $ip, $typeConteneur, $conteneurId, $suppression) {
		$this->_id = $id;
		$this->_utilisateurId = $utilisateurId;
		$this->_message = $message;
		$this->_date = $date;
		$this->_ip = $ip;
		$this->_typeConteneur = $typeConteneur;
		$this->_conteneurId = $conteneurId;
		$this->_suppression = $suppression;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
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
	public function getTypeConteneur(){
		return stripslashes($this->_typeConteneur);
	}
	public function getConteneurId(){
		return stripslashes($this->_conteneurId);
	}
	public function getSuppression(){
		return stripslashes($this->_suppression);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `mur_id` = :mur_id WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':mur_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `utilisateur_id` = :utilisateur_id WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setMessage($message){
		$this->_message = $message;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `mur_message` = :mur_message WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':mur_message' => $this->getMessage());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `mur_date` = :mur_date WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':mur_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `mur_ip` = :mur_ip WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':mur_ip' => $this->getIp());
		return $resSelect->execute($data);
	}
	public function setTypeConteneur($typeConteneur){
		$this->_typeConteneur = $typeConteneur;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `type_conteneur` = :type_conteneur WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':type_conteneur' => $this->getTypeConteneur());
		return $resSelect->execute($data);
	}
	public function setConteneurId($conteneurId){
		$this->_conteneurId = $conteneurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `conteneur_id` = :conteneur_id WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':conteneur_id' => $this->getConteneurId());
		return $resSelect->execute($data);
	}
	public function setSuppression($suppression){
		$this->_suppression = $suppression;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET `mur_suppression` = :mur_suppression WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':mur_id' => $this->getId(), ':mur_suppression' => $this->getSuppression());
		return $resSelect->execute($data);
	}

	public function updateMur(){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE mur SET
			`mur_id` = :mur_id, 
			`utilisateur_id` = :utilisateur_id, 
			`mur_message` = :mur_message, 
			`mur_date` = :mur_date, 
			`mur_ip` = :mur_ip, 
			`type_conteneur` = :type_conteneur, 
			`conteneur_id` = :conteneur_id, 
			`mur_suppression` = :mur_suppression
		 WHERE mur_id = :mur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(
			':mur_id' => $this->getId(), 
			':utilisateur_id' => $this->getUtilisateurId(), 
			':mur_message' => $this->getMessage(), 
			':mur_date' => $this->getDate(), 
			':mur_ip' => $this->getIp(), 
			':type_conteneur' => $this->getTypeConteneur(), 
			':conteneur_id' => $this->getConteneurId(), 
			':mur_suppression' => $this->getSuppression()
		);
		return $resSelect->execute($data);
	}

	public static function selectMur($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM mur WHERE mur_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vÃ©rifie la bonne rÃ©cuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new self(
			$data['mur_id'], 
			$data['utilisateur_id'], 
			$data['mur_message'], 
			$data['mur_date'], 
			$data['mur_ip'], 
			$data['type_conteneur'], 
			$data['conteneur_id'], 
			$data['mur_suppression']
		);
	}


	public static function insertMur($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO mur SET ";
		$data = array();
		if(!empty($post['id'])){
			$reqSelect .=	'`mur_id` = :mur_id, ';
			$data['mur_id'] = $post['id'];
		}
		if(!empty($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(!empty($post['message'])){
			$reqSelect .=	'`mur_message` = :mur_message, ';
			$data['mur_message'] = $post['message'];
		}
		if(!empty($post['date'])){
			$reqSelect .=	'`mur_date` = :mur_date, ';
			$data['mur_date'] = $post['date'];
		}
		if(!empty($post['ip'])){
			$reqSelect .=	'`mur_ip` = :mur_ip, ';
			$data['mur_ip'] = $post['ip'];
		}
		if(!empty($post['typeConteneur'])){
			$reqSelect .=	'`type_conteneur` = :type_conteneur, ';
			$data['type_conteneur'] = $post['typeConteneur'];
		}
		if(!empty($post['conteneurId'])){
			$reqSelect .=	'`conteneur_id` = :conteneur_id, ';
			$data['conteneur_id'] = $post['conteneurId'];
		}
		if(!empty($post['suppression'])){
			$reqSelect .=	'`mur_suppression` = :mur_suppression, ';
			$data['mur_suppression'] = $post['suppression'];
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
		if(!empty($post['message']))
			$this->setMessage($post['message']);
		if(!empty($post['date']))
			$this->setDate($post['date']);
		if(!empty($post['ip']))
			$this->setIp($post['ip']);
		if(!empty($post['typeConteneur']))
			$this->setTypeConteneur($post['typeConteneur']);
		if(!empty($post['conteneurId']))
			$this->setConteneurId($post['conteneurId']);
		if(!empty($post['suppression']))
			$this->setSuppression($post['suppression']);
		return true;
	}

	public static function deleteMur($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM mur WHERE mur_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public function selectMurs($page = 1, $max = 20, $where = null, $order = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT mur_id FROM mur";
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

	public static function getNbMurs($where = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT count(mur_id) as nombre FROM mur";
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