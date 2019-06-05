<?php
Class Sondage_Base { 

	private $_id;
	private $_question;
	private $_date;
	private $_dateFin;

	public function __construct($id, $question, $date, $dateFin) {
		$this->_id = $id;
		$this->_question = $question;
		$this->_date = $date;
		$this->_dateFin = $dateFin;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getQuestion(){
		return stripslashes($this->_question);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function getDateFin(){
		return stripslashes($this->_dateFin);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE sondage SET `sondage_id` = :sondage_id WHERE sondage_id = :sondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':sondage_id' => $this->getId(), ':sondage_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setQuestion($question){
		$this->_question = $question;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE sondage SET `sondage_question` = :sondage_question WHERE sondage_id = :sondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':sondage_id' => $this->getId(), ':sondage_question' => $this->getQuestion());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE sondage SET `sondage_date` = :sondage_date WHERE sondage_id = :sondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':sondage_id' => $this->getId(), ':sondage_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setDateFin($dateFin){
		$this->_dateFin = $dateFin;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE sondage SET `sondage_datefin` = :sondage_datefin WHERE sondage_id = :sondage_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':sondage_id' => $this->getId(), ':sondage_datefin' => $this->getDateFin());
		return $resSelect->execute($data);
	}

	public static function selectSondage($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM sondage WHERE sondage_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Sondage(
			$data['sondage_id'], 
			$data['sondage_question'], 
			$data['sondage_date'], 
			$data['sondage_datefin']
		);
	}


	public static function insertSondage($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO sondage SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`sondage_id` = :sondage_id, ';
			$data['sondage_id'] = $post['id'];
		}
		if(isset($post['question'])){
			$reqSelect .=	'`sondage_question` = :sondage_question, ';
			$data['sondage_question'] = $post['question'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`sondage_date` = :sondage_date, ';
			$data['sondage_date'] = $post['date'];
		}
		if(isset($post['dateFin'])){
			$reqSelect .=	'`sondage_datefin` = :sondage_datefin, ';
			$data['sondage_datefin'] = $post['dateFin'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateSondage($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['question']))
			$this->setQuestion($post['question']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		if(isset($post['dateFin']))
			$this->setDateFin($post['dateFin']);
		return true;
	}

	public static function deleteSondage($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM sondage WHERE sondage_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectSondages($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT sondage.* FROM sondage";
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
			$result[] = new Sondage(
				$data['sondage_id'], 
				$data['sondage_question'], 
				$data['sondage_date'], 
				$data['sondage_datefin']
			);
		}
		return $result;
	}

	public static function getNbSondages($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(sondage.sondage_id) as nombre FROM sondage";
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