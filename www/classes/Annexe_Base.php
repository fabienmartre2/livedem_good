<?php
Class Annexe_Base { 

	private $_id;
	private $_titre;
	private $_contenu;
	private $_description;
	private $_keywords;
	private $_fichier;
	private $_protected;

	public function __construct($id, $titre, $contenu, $description, $keywords, $fichier, $protected) {
		$this->_id = $id;
		$this->_titre = $titre;
		$this->_contenu = $contenu;
		$this->_description = $description;
		$this->_keywords = $keywords;
		$this->_fichier = $fichier;
		$this->_protected = $protected;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getTitre(){
		return stripslashes($this->_titre);
	}
	public function getContenu(){
		return stripslashes($this->_contenu);
	}
	public function getDescription(){
		return stripslashes($this->_description);
	}
	public function getKeywords(){
		return stripslashes($this->_keywords);
	}
	public function getFichier(){
		return stripslashes($this->_fichier);
	}
	public function getProtected(){
		return stripslashes($this->_protected);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE annexe SET `annexe_id` = :annexe_id WHERE annexe_id = :annexe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':annexe_id' => $this->getId(), ':annexe_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setTitre($titre){
		$this->_titre = $titre;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE annexe SET `annexe_titre` = :annexe_titre WHERE annexe_id = :annexe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':annexe_id' => $this->getId(), ':annexe_titre' => $this->getTitre());
		return $resSelect->execute($data);
	}
	public function setContenu($contenu){
		$this->_contenu = $contenu;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE annexe SET `annexe_contenu` = :annexe_contenu WHERE annexe_id = :annexe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':annexe_id' => $this->getId(), ':annexe_contenu' => $this->getContenu());
		return $resSelect->execute($data);
	}
	public function setDescription($description){
		$this->_description = $description;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE annexe SET `annexe_description` = :annexe_description WHERE annexe_id = :annexe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':annexe_id' => $this->getId(), ':annexe_description' => $this->getDescription());
		return $resSelect->execute($data);
	}
	public function setKeywords($keywords){
		$this->_keywords = $keywords;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE annexe SET `annexe_keywords` = :annexe_keywords WHERE annexe_id = :annexe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':annexe_id' => $this->getId(), ':annexe_keywords' => $this->getKeywords());
		return $resSelect->execute($data);
	}
	public function setFichier($fichier){
		$this->_fichier = $fichier;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE annexe SET `annexe_fichier` = :annexe_fichier WHERE annexe_id = :annexe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':annexe_id' => $this->getId(), ':annexe_fichier' => $this->getFichier());
		return $resSelect->execute($data);
	}
	public function setProtected($protected){
		$this->_protected = $protected;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE annexe SET `annexe_protected` = :annexe_protected WHERE annexe_id = :annexe_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':annexe_id' => $this->getId(), ':annexe_protected' => $this->getProtected());
		return $resSelect->execute($data);
	}

	public static function selectAnnexe($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM annexe WHERE annexe_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Annexe(
			$data['annexe_id'], 
			$data['annexe_titre'], 
			$data['annexe_contenu'], 
			$data['annexe_description'], 
			$data['annexe_keywords'], 
			$data['annexe_fichier'], 
			$data['annexe_protected']
		);
	}


	public static function insertAnnexe($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO annexe SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`annexe_id` = :annexe_id, ';
			$data['annexe_id'] = $post['id'];
		}
		if(isset($post['titre'])){
			$reqSelect .=	'`annexe_titre` = :annexe_titre, ';
			$data['annexe_titre'] = $post['titre'];
		}
		if(isset($post['contenu'])){
			$reqSelect .=	'`annexe_contenu` = :annexe_contenu, ';
			$data['annexe_contenu'] = $post['contenu'];
		}
		if(isset($post['description'])){
			$reqSelect .=	'`annexe_description` = :annexe_description, ';
			$data['annexe_description'] = $post['description'];
		}
		if(isset($post['keywords'])){
			$reqSelect .=	'`annexe_keywords` = :annexe_keywords, ';
			$data['annexe_keywords'] = $post['keywords'];
		}
		if(isset($post['fichier'])){
			$reqSelect .=	'`annexe_fichier` = :annexe_fichier, ';
			$data['annexe_fichier'] = $post['fichier'];
		}
		if(isset($post['protected'])){
			$reqSelect .=	'`annexe_protected` = :annexe_protected, ';
			$data['annexe_protected'] = $post['protected'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateAnnexe($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['titre']))
			$this->setTitre($post['titre']);
		if(isset($post['contenu']))
			$this->setContenu($post['contenu']);
		if(isset($post['description']))
			$this->setDescription($post['description']);
		if(isset($post['keywords']))
			$this->setKeywords($post['keywords']);
		if(isset($post['fichier']))
			$this->setFichier($post['fichier']);
		if(isset($post['protected']))
			$this->setProtected($post['protected']);
		return true;
	}

	public static function deleteAnnexe($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM annexe WHERE annexe_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectAnnexes($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT annexe.* FROM annexe";
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
			$result[] = new Annexe(
				$data['annexe_id'], 
				$data['annexe_titre'], 
				$data['annexe_contenu'], 
				$data['annexe_description'], 
				$data['annexe_keywords'], 
				$data['annexe_fichier'], 
				$data['annexe_protected']
			);
		}
		return $result;
	}

	public static function getNbAnnexes($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(annexe.annexe_id) as nombre FROM annexe";
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