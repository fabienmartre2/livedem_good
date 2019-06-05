<?php
Class Vote_Base { 

	private $_id;
	private $_propositionId;
	private $_utilisateurId;
	private $_date;
	private $_ip;
	private $_code;
	private $_statut;

	public function __construct($id, $propositionId, $utilisateurId, $date, $ip, $code, $statut) {
		$this->_id = $id;
		$this->_propositionId = $propositionId;
		$this->_utilisateurId = $utilisateurId;
		$this->_date = $date;
		$this->_ip = $ip;
		$this->_code = $code;
		$this->_statut = $statut;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getPropositionId(){
		return stripslashes($this->_propositionId);
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
	public function getCode(){
		return stripslashes($this->_code);
	}
	public function getStatut(){
		return stripslashes($this->_statut);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE vote SET `vote_id` = :vote_id WHERE vote_id = :vote_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':vote_id' => $this->getId(), ':vote_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setPropositionId($propositionId){
		$this->_propositionId = $propositionId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE vote SET `proposition_id` = :proposition_id WHERE vote_id = :vote_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':vote_id' => $this->getId(), ':proposition_id' => $this->getPropositionId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE vote SET `utilisateur_id` = :utilisateur_id WHERE vote_id = :vote_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':vote_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE vote SET `vote_date` = :vote_date WHERE vote_id = :vote_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':vote_id' => $this->getId(), ':vote_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE vote SET `vote_ip` = :vote_ip WHERE vote_id = :vote_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':vote_id' => $this->getId(), ':vote_ip' => $this->getIp());
		return $resSelect->execute($data);
	}
	public function setCode($code){
		$this->_code = $code;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE vote SET `vote_code` = :vote_code WHERE vote_id = :vote_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':vote_id' => $this->getId(), ':vote_code' => $this->getCode());
		return $resSelect->execute($data);
	}
	public function setStatut($statut){
		$this->_statut = $statut;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE vote SET `vote_statut` = :vote_statut WHERE vote_id = :vote_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':vote_id' => $this->getId(), ':vote_statut' => $this->getStatut());
		return $resSelect->execute($data);
	}

	public static function selectVote($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM vote WHERE vote_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Vote(
			$data['vote_id'], 
			$data['proposition_id'], 
			$data['utilisateur_id'], 
			$data['vote_date'], 
			$data['vote_ip'], 
			$data['vote_code'], 
			$data['vote_statut']
		);
	}


	public static function insertVote($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO vote SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`vote_id` = :vote_id, ';
			$data['vote_id'] = $post['id'];
		}
		if(isset($post['propositionId'])){
			$reqSelect .=	'`proposition_id` = :proposition_id, ';
			$data['proposition_id'] = $post['propositionId'];
		}
		if(isset($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`vote_date` = :vote_date, ';
			$data['vote_date'] = $post['date'];
		}
		if(isset($post['ip'])){
			$reqSelect .=	'`vote_ip` = :vote_ip, ';
			$data['vote_ip'] = $post['ip'];
		}
		if(isset($post['code'])){
			$reqSelect .=	'`vote_code` = :vote_code, ';
			$data['vote_code'] = $post['code'];
		}
		if(isset($post['statut'])){
			$reqSelect .=	'`vote_statut` = :vote_statut, ';
			$data['vote_statut'] = $post['statut'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateVote($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['propositionId']))
			$this->setPropositionId($post['propositionId']);
		if(isset($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		if(isset($post['ip']))
			$this->setIp($post['ip']);
		if(isset($post['code']))
			$this->setCode($post['code']);
		if(isset($post['statut']))
			$this->setStatut($post['statut']);
		return true;
	}

	public static function deleteVote($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM vote WHERE vote_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectVotes($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT vote.* FROM vote";
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
			$result[] = new Vote(
				$data['vote_id'], 
				$data['proposition_id'], 
				$data['utilisateur_id'], 
				$data['vote_date'], 
				$data['vote_ip'], 
				$data['vote_code'], 
				$data['vote_statut']
			);
		}
		return $result;
	}

	public static function getNbVotes($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(vote.vote_id) as nombre FROM vote";
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