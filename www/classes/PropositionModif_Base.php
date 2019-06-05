<?php
Class PropositionModif_Base { 

	private $_id;
	private $_propositionId;
	private $_oldStatut;
	private $_newStatut;
	private $_date;

	public function __construct($id, $propositionId, $oldStatut, $newStatut, $date) {
		$this->_id = $id;
		$this->_propositionId = $propositionId;
		$this->_oldStatut = $oldStatut;
		$this->_newStatut = $newStatut;
		$this->_date = $date;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getPropositionId(){
		return stripslashes($this->_propositionId);
	}
	public function getOldStatut(){
		return stripslashes($this->_oldStatut);
	}
	public function getNewStatut(){
		return stripslashes($this->_newStatut);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE propositionmodif SET `propositionmodif_id` = :propositionmodif_id WHERE propositionmodif_id = :propositionmodif_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':propositionmodif_id' => $this->getId(), ':propositionmodif_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setPropositionId($propositionId){
		$this->_propositionId = $propositionId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE propositionmodif SET `proposition_id` = :proposition_id WHERE propositionmodif_id = :propositionmodif_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':propositionmodif_id' => $this->getId(), ':proposition_id' => $this->getPropositionId());
		return $resSelect->execute($data);
	}
	public function setOldStatut($oldStatut){
		$this->_oldStatut = $oldStatut;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE propositionmodif SET `propositionmodif_oldstatut` = :propositionmodif_oldstatut WHERE propositionmodif_id = :propositionmodif_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':propositionmodif_id' => $this->getId(), ':propositionmodif_oldstatut' => $this->getOldStatut());
		return $resSelect->execute($data);
	}
	public function setNewStatut($newStatut){
		$this->_newStatut = $newStatut;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE propositionmodif SET `propositionmodif_newstatut` = :propositionmodif_newstatut WHERE propositionmodif_id = :propositionmodif_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':propositionmodif_id' => $this->getId(), ':propositionmodif_newstatut' => $this->getNewStatut());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE propositionmodif SET `propositionmodif_date` = :propositionmodif_date WHERE propositionmodif_id = :propositionmodif_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':propositionmodif_id' => $this->getId(), ':propositionmodif_date' => $this->getDate());
		return $resSelect->execute($data);
	}

	public static function selectPropositionModif($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM propositionmodif WHERE propositionmodif_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new PropositionModif(
			$data['propositionmodif_id'], 
			$data['proposition_id'], 
			$data['propositionmodif_oldstatut'], 
			$data['propositionmodif_newstatut'], 
			$data['propositionmodif_date']
		);
	}


	public static function insertPropositionModif($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO propositionmodif SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`propositionmodif_id` = :propositionmodif_id, ';
			$data['propositionmodif_id'] = $post['id'];
		}
		if(isset($post['propositionId'])){
			$reqSelect .=	'`proposition_id` = :proposition_id, ';
			$data['proposition_id'] = $post['propositionId'];
		}
		if(isset($post['oldStatut'])){
			$reqSelect .=	'`propositionmodif_oldstatut` = :propositionmodif_oldstatut, ';
			$data['propositionmodif_oldstatut'] = $post['oldStatut'];
		}
		if(isset($post['newStatut'])){
			$reqSelect .=	'`propositionmodif_newstatut` = :propositionmodif_newstatut, ';
			$data['propositionmodif_newstatut'] = $post['newStatut'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`propositionmodif_date` = :propositionmodif_date, ';
			$data['propositionmodif_date'] = $post['date'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updatePropositionModif($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['propositionId']))
			$this->setPropositionId($post['propositionId']);
		if(isset($post['oldStatut']))
			$this->setOldStatut($post['oldStatut']);
		if(isset($post['newStatut']))
			$this->setNewStatut($post['newStatut']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		return true;
	}

	public static function deletePropositionModif($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM propositionmodif WHERE propositionmodif_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectPropositionModifs($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT propositionmodif.* FROM propositionmodif";
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
			$result[] = new PropositionModif(
				$data['propositionmodif_id'], 
				$data['proposition_id'], 
				$data['propositionmodif_oldstatut'], 
				$data['propositionmodif_newstatut'], 
				$data['propositionmodif_date']
			);
		}
		return $result;
	}

	public static function getNbPropositionModifs($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(propositionmodif.propositionmodif_id) as nombre FROM propositionmodif";
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