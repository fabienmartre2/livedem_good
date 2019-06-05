<?php
Class Departement_Base { 

	private $_id;
	private $_regionId;
	private $_nom;
	private $_numero;
	private $_fichier;

	public function __construct($id, $regionId, $nom, $numero, $fichier) {
		$this->_id = $id;
		$this->_regionId = $regionId;
		$this->_nom = $nom;
		$this->_numero = $numero;
		$this->_fichier = $fichier;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getRegionId(){
		return stripslashes($this->_regionId);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function getNumero(){
		return stripslashes($this->_numero);
	}
	public function getFichier(){
		return stripslashes($this->_fichier);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE departement SET `departement_id` = :departement_id WHERE departement_id = :departement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':departement_id' => $this->getId(), ':departement_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setRegionId($regionId){
		$this->_regionId = $regionId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE departement SET `region_id` = :region_id WHERE departement_id = :departement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':departement_id' => $this->getId(), ':region_id' => $this->getRegionId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE departement SET `departement_nom` = :departement_nom WHERE departement_id = :departement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':departement_id' => $this->getId(), ':departement_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setNumero($numero){
		$this->_numero = $numero;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE departement SET `departement_numero` = :departement_numero WHERE departement_id = :departement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':departement_id' => $this->getId(), ':departement_numero' => $this->getNumero());
		return $resSelect->execute($data);
	}
	public function setFichier($fichier){
		$this->_fichier = $fichier;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE departement SET `departement_fichier` = :departement_fichier WHERE departement_id = :departement_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':departement_id' => $this->getId(), ':departement_fichier' => $this->getFichier());
		return $resSelect->execute($data);
	}

	public static function selectDepartement($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM departement WHERE departement_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Departement(
			$data['departement_id'], 
			$data['region_id'], 
			$data['departement_nom'], 
			$data['departement_numero'], 
			$data['departement_fichier']
		);
	}


	public static function insertDepartement($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO departement SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`departement_id` = :departement_id, ';
			$data['departement_id'] = $post['id'];
		}
		if(isset($post['regionId'])){
			$reqSelect .=	'`region_id` = :region_id, ';
			$data['region_id'] = $post['regionId'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`departement_nom` = :departement_nom, ';
			$data['departement_nom'] = $post['nom'];
		}
		if(isset($post['numero'])){
			$reqSelect .=	'`departement_numero` = :departement_numero, ';
			$data['departement_numero'] = $post['numero'];
		}
		if(isset($post['fichier'])){
			$reqSelect .=	'`departement_fichier` = :departement_fichier, ';
			$data['departement_fichier'] = $post['fichier'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateDepartement($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['regionId']))
			$this->setRegionId($post['regionId']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['numero']))
			$this->setNumero($post['numero']);
		if(isset($post['fichier']))
			$this->setFichier($post['fichier']);
		return true;
	}

	public static function deleteDepartement($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM departement WHERE departement_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectDepartements($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT departement.* FROM departement";
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
			$result[] = new Departement(
				$data['departement_id'], 
				$data['region_id'], 
				$data['departement_nom'], 
				$data['departement_numero'], 
				$data['departement_fichier']
			);
		}
		return $result;
	}

	public static function getNbDepartements($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(departement.departement_id) as nombre FROM departement";
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