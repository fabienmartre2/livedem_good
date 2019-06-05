<?php
Class Signalement_Base { 

	private $_id;
	private $_typeId;
	private $_objetId;
	private $_utilisateurId;
	private $_date;
	private $_ip;

	public function __construct($id, $typeId, $objetId, $utilisateurId, $date, $ip) {
		$this->_id = $id;
		$this->_typeId = $typeId;
		$this->_objetId = $objetId;
		$this->_utilisateurId = $utilisateurId;
		$this->_date = $date;
		$this->_ip = $ip;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getTypeId(){
		return stripslashes($this->_typeId);
	}
	public function getObjetId(){
		return stripslashes($this->_objetId);
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
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signalement SET `signalement_id` = :signalement_id WHERE signalement_id = :signalement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signalement_id' => $this->getId(), ':signalement_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setTypeId($typeId){
		$this->_typeId = $typeId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signalement SET `type_id` = :type_id WHERE signalement_id = :signalement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signalement_id' => $this->getId(), ':type_id' => $this->getTypeId());
		return $resSelect->execute($data);
	}
	public function setObjetId($objetId){
		$this->_objetId = $objetId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signalement SET `signalement_objetid` = :signalement_objetid WHERE signalement_id = :signalement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signalement_id' => $this->getId(), ':signalement_objetid' => $this->getObjetId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signalement SET `utilisateur_id` = :utilisateur_id WHERE signalement_id = :signalement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signalement_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signalement SET `signalement_date` = :signalement_date WHERE signalement_id = :signalement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signalement_id' => $this->getId(), ':signalement_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE signalement SET `signalement_ip` = :signalement_ip WHERE signalement_id = :signalement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':signalement_id' => $this->getId(), ':signalement_ip' => $this->getIp());
		return $resSelect->execute($data);
	}

	public static function selectSignalement($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM signalement WHERE signalement_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Signalement(
			$data['signalement_id'], 
			$data['type_id'], 
			$data['signalement_objetid'], 
			$data['utilisateur_id'], 
			$data['signalement_date'], 
			$data['signalement_ip']
		);
	}


	public static function insertSignalement($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO signalement SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`signalement_id` = :signalement_id, ';
			$data['signalement_id'] = $post['id'];
		}
		if(isset($post['typeId'])){
			$reqSelect .=	'`type_id` = :type_id, ';
			$data['type_id'] = $post['typeId'];
		}
		if(isset($post['objetId'])){
			$reqSelect .=	'`signalement_objetid` = :signalement_objetid, ';
			$data['signalement_objetid'] = $post['objetId'];
		}
		if(isset($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`signalement_date` = :signalement_date, ';
			$data['signalement_date'] = $post['date'];
		}
		if(isset($post['ip'])){
			$reqSelect .=	'`signalement_ip` = :signalement_ip, ';
			$data['signalement_ip'] = $post['ip'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateSignalement($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['typeId']))
			$this->setTypeId($post['typeId']);
		if(isset($post['objetId']))
			$this->setObjetId($post['objetId']);
		if(isset($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		if(isset($post['ip']))
			$this->setIp($post['ip']);
		return true;
	}

	public static function deleteSignalement($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM signalement WHERE signalement_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectSignalements($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT signalement.* FROM signalement";
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
			$result[] = new Signalement(
				$data['signalement_id'], 
				$data['type_id'], 
				$data['signalement_objetid'], 
				$data['utilisateur_id'], 
				$data['signalement_date'], 
				$data['signalement_ip']
			);
		}
		return $result;
	}

	public static function getNbSignalements($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT signalement.signalement_id FROM signalement";
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