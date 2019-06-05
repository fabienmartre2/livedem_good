<?php
Class BlocTexte_Base { 

	private $_id;
	private $_nom;
	private $_contenu;

	public function __construct($id, $nom, $contenu) {
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_contenu = $contenu;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function getContenu(){
		return stripslashes($this->_contenu);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE bloctexte SET `bloctexte_id` = :bloctexte_id WHERE bloctexte_id = :bloctexte_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':bloctexte_id' => $this->getId(), ':bloctexte_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE bloctexte SET `bloctexte_nom` = :bloctexte_nom WHERE bloctexte_id = :bloctexte_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':bloctexte_id' => $this->getId(), ':bloctexte_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setContenu($contenu){
		$this->_contenu = $contenu;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE bloctexte SET `bloctexte_contenu` = :bloctexte_contenu WHERE bloctexte_id = :bloctexte_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':bloctexte_id' => $this->getId(), ':bloctexte_contenu' => $this->getContenu());
		return $resSelect->execute($data);
	}

	public static function selectBlocTexte($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM bloctexte WHERE bloctexte_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new BlocTexte(
			$data['bloctexte_id'], 
			$data['bloctexte_nom'], 
			$data['bloctexte_contenu']
		);
	}


	public static function insertBlocTexte($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO bloctexte SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`bloctexte_id` = :bloctexte_id, ';
			$data['bloctexte_id'] = $post['id'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`bloctexte_nom` = :bloctexte_nom, ';
			$data['bloctexte_nom'] = $post['nom'];
		}
		if(isset($post['contenu'])){
			$reqSelect .=	'`bloctexte_contenu` = :bloctexte_contenu, ';
			$data['bloctexte_contenu'] = $post['contenu'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateBlocTexte($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['contenu']))
			$this->setContenu($post['contenu']);
		return true;
	}

	public static function deleteBlocTexte($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM bloctexte WHERE bloctexte_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectBlocTextes($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT bloctexte.* FROM bloctexte";
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
			$result[] = new BlocTexte(
				$data['bloctexte_id'], 
				$data['bloctexte_nom'], 
				$data['bloctexte_contenu']
			);
		}
		return $result;
	}

	public static function getNbBlocTextes($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT bloctexte.bloctexte_id FROM bloctexte";
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