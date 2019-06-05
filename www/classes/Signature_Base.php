<?php
Class Signature_Base { 

	private $_id;
	private $_petitionId;
	private $_utilisateurId;
	private $_date;
	private $_ip;
	private $_message;

	public function __construct($id, $petitionId, $utilisateurId, $date, $ip, $message) {
		$this->_id = $id;
		$this->_petitionId = $petitionId;
		$this->_utilisateurId = $utilisateurId;
		$this->_date = $date;
		$this->_ip = $ip;
		$this->_message = $message;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getPetitionId(){
		return stripslashes($this->_petitionId);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function getIp(){
		return stripslashes($this->_ip);
	}
	public function getMessage(){
		return stripslashes($this->_message);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signature SET `signature_id` = :signature_id WHERE signature_id = :signature_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signature_id' => $this->getId(), ':signature_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setPetitionId($petitionId){
		$this->_petitionId = $petitionId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signature SET `petition_id` = :petition_id WHERE signature_id = :signature_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signature_id' => $this->getId(), ':petition_id' => $this->getPetitionId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signature SET `utilisateur_id` = :utilisateur_id WHERE signature_id = :signature_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signature_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signature SET `signature_date` = :signature_date WHERE signature_id = :signature_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signature_id' => $this->getId(), ':signature_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signature SET `signature_ip` = :signature_ip WHERE signature_id = :signature_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signature_id' => $this->getId(), ':signature_ip' => $this->getIp());
		return $resSelect->execute($data);
	}
	public function setMessage($message){
		$this->_message = $message;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signature SET `signature_message` = :signature_message WHERE signature_id = :signature_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signature_id' => $this->getId(), ':signature_message' => $this->getMessage());
		return $resSelect->execute($data);
	}

	public static function selectSignature($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM signature WHERE signature_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Signature(
			$data['signature_id'], 
			$data['petition_id'], 
			$data['utilisateur_id'], 
			$data['signature_date'], 
			$data['signature_ip'], 
			$data['signature_message']
		);
	}


	public static function insertSignature($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO signature SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`signature_id` = :signature_id, ';
			$data['signature_id'] = $post['id'];
		}
		if(isset($post['petitionId'])){
			$reqSelect .=	'`petition_id` = :petition_id, ';
			$data['petition_id'] = $post['petitionId'];
		}
		if(isset($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`signature_date` = :signature_date, ';
			$data['signature_date'] = $post['date'];
		}
		if(isset($post['ip'])){
			$reqSelect .=	'`signature_ip` = :signature_ip, ';
			$data['signature_ip'] = $post['ip'];
		}
		if(isset($post['message'])){
			$reqSelect .=	'`signature_message` = :signature_message, ';
			$data['signature_message'] = $post['message'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateSignature($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['petitionId']))
			$this->setPetitionId($post['petitionId']);
		if(isset($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		if(isset($post['ip']))
			$this->setIp($post['ip']);
		if(isset($post['message']))
			$this->setMessage($post['message']);
		return true;
	}

	public static function deleteSignature($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM signature WHERE signature_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectSignatures($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT signature.* FROM signature";
		if(!empty($join)){
			foreach($join as $cle => $valeur){
				$reqSelect .= " ".$cle." ON ".$valeur." ";
			}
		}
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			foreach($where as $cle => $valeur){
				$reqSelect .= " AND ".$valeur."";
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
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute();
		$datas = $resSelect->fetchall(PDO::FETCH_ASSOC);
		$result = array();
		foreach($datas as $data){
			$result[] = new Signature(
				$data['signature_id'], 
				$data['petition_id'], 
				$data['utilisateur_id'], 
				$data['signature_date'], 
				$data['signature_ip'], 
				$data['signature_message']
			);
		}
		return $result;
	}

	public static function getNbSignatures($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT signature.signature_id FROM signature";
		if(!empty($join)){
			foreach($join as $cle => $valeur){
				$reqSelect .= " ".$cle." ON ".$valeur." ";
			}
		}
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			foreach($where as $cle => $valeur){
				$reqSelect .= " AND ".$valeur."";
			}
		}
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute();
		return $resSelect->rowCount();
	}
}
?>