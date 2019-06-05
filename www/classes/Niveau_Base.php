<?php
Class Niveau_Base { 

	private $_id;
	private $_nom;

	public function __construct($id, $nom) {
		$this->_id = $id;
		$this->_nom = $nom;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE niveau SET `niveau_id` = :niveau_id WHERE niveau_id = :niveau_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':niveau_id' => $this->getId(), ':niveau_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE niveau SET `niveau_nom` = :niveau_nom WHERE niveau_id = :niveau_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':niveau_id' => $this->getId(), ':niveau_nom' => $this->getNom());
		return $resSelect->execute($data);
	}

	public static function selectNiveau($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM niveau WHERE niveau_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Niveau(
			$data['niveau_id'], 
			$data['niveau_nom']
		);
	}


	public static function insertNiveau($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO niveau SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`niveau_id` = :niveau_id, ';
			$data['niveau_id'] = $post['id'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`niveau_nom` = :niveau_nom, ';
			$data['niveau_nom'] = $post['nom'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateNiveau($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		return true;
	}

	public static function deleteNiveau($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM niveau WHERE niveau_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectNiveaus($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT niveau.* FROM niveau";
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
			$result[] = new Niveau(
				$data['niveau_id'], 
				$data['niveau_nom']
			);
		}
		return $result;
	}

	public static function getNbNiveaus($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(niveau.niveau_id) as nombre FROM niveau";
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