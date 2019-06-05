<?php
Class BlocMail_Base { 

	private $_id;
	private $_nom;
	private $_contenu;
	private $_variable;

	public function __construct($id, $nom, $contenu, $variable) {
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_contenu = $contenu;
		$this->_variable = $variable;
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
	public function getVariable(){
		return stripslashes($this->_variable);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE blocmail SET `blocmail_id` = :blocmail_id WHERE blocmail_id = :blocmail_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':blocmail_id' => $this->getId(), ':blocmail_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE blocmail SET `blocmail_nom` = :blocmail_nom WHERE blocmail_id = :blocmail_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':blocmail_id' => $this->getId(), ':blocmail_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setContenu($contenu){
		$this->_contenu = $contenu;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE blocmail SET `blocmail_contenu` = :blocmail_contenu WHERE blocmail_id = :blocmail_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':blocmail_id' => $this->getId(), ':blocmail_contenu' => $this->getContenu());
		return $resSelect->execute($data);
	}
	public function setVariable($variable){
		$this->_variable = $variable;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE blocmail SET `blocmail_variable` = :blocmail_variable WHERE blocmail_id = :blocmail_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':blocmail_id' => $this->getId(), ':blocmail_variable' => $this->getVariable());
		return $resSelect->execute($data);
	}

	public static function selectBlocMail($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM blocmail WHERE blocmail_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new BlocMail(
			$data['blocmail_id'], 
			$data['blocmail_nom'], 
			$data['blocmail_contenu'], 
			$data['blocmail_variable']
		);
	}


	public static function insertBlocMail($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO blocmail SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`blocmail_id` = :blocmail_id, ';
			$data['blocmail_id'] = $post['id'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`blocmail_nom` = :blocmail_nom, ';
			$data['blocmail_nom'] = $post['nom'];
		}
		if(isset($post['contenu'])){
			$reqSelect .=	'`blocmail_contenu` = :blocmail_contenu, ';
			$data['blocmail_contenu'] = $post['contenu'];
		}
		if(isset($post['variable'])){
			$reqSelect .=	'`blocmail_variable` = :blocmail_variable, ';
			$data['blocmail_variable'] = $post['variable'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateBlocMail($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['contenu']))
			$this->setContenu($post['contenu']);
		if(isset($post['variable']))
			$this->setVariable($post['variable']);
		return true;
	}

	public static function deleteBlocMail($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM blocmail WHERE blocmail_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectBlocMails($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT blocmail.* FROM blocmail";
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
			$result[] = new BlocMail(
				$data['blocmail_id'], 
				$data['blocmail_nom'], 
				$data['blocmail_contenu'], 
				$data['blocmail_variable']
			);
		}
		return $result;
	}

	public static function getNbBlocMails($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT blocmail.blocmail_id FROM blocmail";
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