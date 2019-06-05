<?php
Class Region_Base { 

	private $_id;
	private $_nom;
	private $_fichier;

	public function __construct($id, $nom, $fichier) {
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_fichier = $fichier;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function getFichier(){
		return stripslashes($this->_fichier);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE region SET `region_id` = :region_id WHERE region_id = :region_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':region_id' => $this->getId(), ':region_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE region SET `region_nom` = :region_nom WHERE region_id = :region_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':region_id' => $this->getId(), ':region_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setFichier($fichier){
		$this->_fichier = $fichier;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE region SET `region_fichier` = :region_fichier WHERE region_id = :region_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':region_id' => $this->getId(), ':region_fichier' => $this->getFichier());
		return $resSelect->execute($data);
	}

	public static function selectRegion($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM region WHERE region_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Region(
			$data['region_id'], 
			$data['region_nom'], 
			$data['region_fichier']
		);
	}


	public static function insertRegion($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO region SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`region_id` = :region_id, ';
			$data['region_id'] = $post['id'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`region_nom` = :region_nom, ';
			$data['region_nom'] = $post['nom'];
		}
		if(isset($post['fichier'])){
			$reqSelect .=	'`region_fichier` = :region_fichier, ';
			$data['region_fichier'] = $post['fichier'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateRegion($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['fichier']))
			$this->setFichier($post['fichier']);
		return true;
	}

	public static function deleteRegion($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM region WHERE region_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectRegions($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT region.* FROM region";
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
			$result[] = new Region(
				$data['region_id'], 
				$data['region_nom'], 
				$data['region_fichier']
			);
		}
		return $result;
	}

	public static function getNbRegions($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(region.region_id) as nombre FROM region";
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