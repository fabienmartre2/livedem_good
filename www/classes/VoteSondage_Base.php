<?php
Class VoteSondage_Base { 

	private $_id;
	private $_sondageId;
	private $_utilisateurId;
	private $_date;
	private $_ip;
	private $_statut;

	public function __construct($id, $sondageId, $utilisateurId, $date, $ip, $statut) {
		$this->_id = $id;
		$this->_sondageId = $sondageId;
		$this->_utilisateurId = $utilisateurId;
		$this->_date = $date;
		$this->_ip = $ip;
		$this->_statut = $statut;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getSondageId(){
		return stripslashes($this->_sondageId);
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
	public function getStatut(){
		return stripslashes($this->_statut);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE votesondage SET `votesondage_id` = :votesondage_id WHERE votesondage_id = :votesondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':votesondage_id' => $this->getId(), ':votesondage_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setSondageId($sondageId){
		$this->_sondageId = $sondageId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE votesondage SET `sondage_id` = :sondage_id WHERE votesondage_id = :votesondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':votesondage_id' => $this->getId(), ':sondage_id' => $this->getSondageId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE votesondage SET `utilisateur_id` = :utilisateur_id WHERE votesondage_id = :votesondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':votesondage_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE votesondage SET `votesondage_date` = :votesondage_date WHERE votesondage_id = :votesondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':votesondage_id' => $this->getId(), ':votesondage_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE votesondage SET `votesondage_ip` = :votesondage_ip WHERE votesondage_id = :votesondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':votesondage_id' => $this->getId(), ':votesondage_ip' => $this->getIp());
		return $resSelect->execute($data);
	}
	public function setStatut($statut){
		$this->_statut = $statut;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE votesondage SET `votesondage_statut` = :votesondage_statut WHERE votesondage_id = :votesondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':votesondage_id' => $this->getId(), ':votesondage_statut' => $this->getStatut());
		return $resSelect->execute($data);
	}

	public static function selectVoteSondage($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM votesondage WHERE votesondage_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new VoteSondage(
			$data['votesondage_id'], 
			$data['sondage_id'], 
			$data['utilisateur_id'], 
			$data['votesondage_date'], 
			$data['votesondage_ip'], 
			$data['votesondage_statut']
		);
	}


	public static function insertVoteSondage($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO votesondage SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`votesondage_id` = :votesondage_id, ';
			$data['votesondage_id'] = $post['id'];
		}
		if(isset($post['sondageId'])){
			$reqSelect .=	'`sondage_id` = :sondage_id, ';
			$data['sondage_id'] = $post['sondageId'];
		}
		if(isset($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`votesondage_date` = :votesondage_date, ';
			$data['votesondage_date'] = $post['date'];
		}
		if(isset($post['ip'])){
			$reqSelect .=	'`votesondage_ip` = :votesondage_ip, ';
			$data['votesondage_ip'] = $post['ip'];
		}
		if(isset($post['statut'])){
			$reqSelect .=	'`votesondage_statut` = :votesondage_statut, ';
			$data['votesondage_statut'] = $post['statut'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateVoteSondage($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['sondageId']))
			$this->setSondageId($post['sondageId']);
		if(isset($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		if(isset($post['ip']))
			$this->setIp($post['ip']);
		if(isset($post['statut']))
			$this->setStatut($post['statut']);
		return true;
	}

	public static function deleteVoteSondage($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM votesondage WHERE votesondage_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectVoteSondages($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT votesondage.* FROM votesondage";
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
			$result[] = new VoteSondage(
				$data['votesondage_id'], 
				$data['sondage_id'], 
				$data['utilisateur_id'], 
				$data['votesondage_date'], 
				$data['votesondage_ip'], 
				$data['votesondage_statut']
			);
		}
		return $result;
	}

	public static function getNbVoteSondages($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(votesondage.votesondage_id) as nombre FROM votesondage";
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