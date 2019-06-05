<?php
Class Categorie_Base { 

	private $_id;
	private $_nom;
	private $_image;

	public function __construct($id, $nom, $image) {
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_image = $image;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function getImage(){
		return stripslashes($this->_image);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE categorie SET `categorie_id` = :categorie_id WHERE categorie_id = :categorie_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':categorie_id' => $this->getId(), ':categorie_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE categorie SET `categorie_nom` = :categorie_nom WHERE categorie_id = :categorie_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':categorie_id' => $this->getId(), ':categorie_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setImage($image){
		$this->_image = $image;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE categorie SET `categorie_image` = :categorie_image WHERE categorie_id = :categorie_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':categorie_id' => $this->getId(), ':categorie_image' => $this->getImage());
		return $resSelect->execute($data);
	}

	public static function selectCategorie($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM categorie WHERE categorie_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Categorie(
			$data['categorie_id'], 
			$data['categorie_nom'], 
			$data['categorie_image']
		);
	}


	public static function insertCategorie($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO categorie SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`categorie_id` = :categorie_id, ';
			$data['categorie_id'] = $post['id'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`categorie_nom` = :categorie_nom, ';
			$data['categorie_nom'] = $post['nom'];
		}
		if(isset($post['image'])){
			$reqSelect .=	'`categorie_image` = :categorie_image, ';
			$data['categorie_image'] = $post['image'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateCategorie($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['image']))
			$this->setImage($post['image']);
		return true;
	}

	public static function deleteCategorie($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM categorie WHERE categorie_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectCategories($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT categorie.* FROM categorie";
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
			$result[] = new Categorie(
				$data['categorie_id'], 
				$data['categorie_nom'], 
				$data['categorie_image']
			);
		}
		return $result;
	}

	public static function getNbCategories($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(categorie.categorie_id) as nombre FROM categorie";
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