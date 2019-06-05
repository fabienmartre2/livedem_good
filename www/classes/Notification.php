<?php
Class Notification { 

	private $_id;
	private $_utilisateurId;
	private $_objetId;
	private $_typeId;
	private $_etat;

	public function __construct($id, $utilisateurId, $objetId, $typeId, $etat) {
		$this->_id = $id;
		$this->_utilisateurId = $utilisateurId;
		$this->_objetId = $objetId;
		$this->_typeId = $typeId;
		$this->_etat = $etat;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
	}
	public function getObjetId(){
		return stripslashes($this->_objetId);
	}
	public function getTypeId(){
		return stripslashes($this->_typeId);
	}
	public function getEtat(){
		return stripslashes($this->_etat);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE notification SET `notification_id` = :notification_id WHERE notification_id = :notification_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':notification_id' => $this->getId(), ':notification_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE notification SET `utilisateur_id` = :utilisateur_id WHERE notification_id = :notification_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':notification_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setObjetId($objetId){
		$this->_objetId = $objetId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE notification SET `notification_objetid` = :notification_objetid WHERE notification_id = :notification_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':notification_id' => $this->getId(), ':notification_objetid' => $this->getObjetId());
		return $resSelect->execute($data);
	}
	public function setTypeId($typeId){
		$this->_typeId = $typeId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE notification SET `notification_typeid` = :notification_typeid WHERE notification_id = :notification_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':notification_id' => $this->getId(), ':notification_typeid' => $this->getTypeId());
		return $resSelect->execute($data);
	}
	public function setEtat($etat){
		$this->_etat = $etat;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE notification SET `notification_etat` = :notification_etat WHERE notification_id = :notification_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':notification_id' => $this->getId(), ':notification_etat' => $this->getEtat());
		return $resSelect->execute($data);
	}

	public function updateNotification(){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE notification SET
			`notification_id` = :notification_id, 
			`utilisateur_id` = :utilisateur_id, 
			`notification_objetid` = :notification_objetid, 
			`notification_typeid` = :notification_typeid, 
			`notification_etat` = :notification_etat
		 WHERE notification_id = :notification_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(
			':notification_id' => $this->getId(), 
			':utilisateur_id' => $this->getUtilisateurId(), 
			':notification_objetid' => $this->getObjetId(), 
			':notification_typeid' => $this->getTypeId(), 
			':notification_etat' => $this->getEtat()
		);
		return $resSelect->execute($data);
	}

	public static function selectNotification($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM notification WHERE notification_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new self(
			$data['notification_id'], 
			$data['utilisateur_id'], 
			$data['notification_objetid'], 
			$data['notification_typeid'], 
			$data['notification_etat']
		);
	}


	public static function insertNotification($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO notification SET ";
		$data = array();
		if(!empty($post['id'])){
			$reqSelect .=	'`notification_id` = :notification_id, ';
			$data['notification_id'] = $post['id'];
		}
		if(!empty($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(!empty($post['objetId'])){
			$reqSelect .=	'`notification_objetid` = :notification_objetid, ';
			$data['notification_objetid'] = $post['objetId'];
		}
		if(!empty($post['typeId'])){
			$reqSelect .=	'`notification_typeid` = :notification_typeid, ';
			$data['notification_typeid'] = $post['typeId'];
		}
		if(!empty($post['etat'])){
			$reqSelect .=	'`notification_etat` = :notification_etat, ';
			$data['notification_etat'] = $post['etat'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateData($post, $files = array()){
		if(!empty($post['id']))
			$this->setId($post['id']);
		if(!empty($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(!empty($post['objetId']))
			$this->setObjetId($post['objetId']);
		if(!empty($post['typeId']))
			$this->setTypeId($post['typeId']);
		if(!empty($post['etat']))
			$this->setEtat($post['etat']);
		return true;
	}

	public static function deleteNotification($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM notification WHERE notification_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public function selectNotifications($page = 1, $max = 20, $where = null, $order = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT notification_id FROM notification";
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			foreach($where as $cle => $valeur){
				$reqSelect .= " AND ".$valeur."";
			}
		}
		if(!empty($order)){
			$reqSelect .= " ORDER BY ".$order."";
		}
		if($max != 0)
			$reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute();
		$data = $resSelect->fetchall(PDO::FETCH_COLUMN, 0);
		return $data;
	}

	public static function getNbNotifications($where = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT count(notification_id) as nombre FROM notification";
		$reqSelect .= " WHERE 1 = 1 ";
		if(!empty($where)){
			foreach($where as $cle => $valeur){
				$reqSelect .= " AND ".$valeur."";
			}
		}
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute();
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		return $data['nombre'];
	}
	
	public function getNotification(){
		$smarty = new Smarty();
		$smarty->setTemplateDir(LOCALISATION.'templates/');
		$smarty->setCompileDir(LOCALISATION.'data/templates_c/');
		$smarty->setCacheDir(LOCALISATION.'data/cache/');
		$smarty->caching = false;
		$smarty->force_compile = true;
		$smarty->assign('ADRESSE', ADRESSE);
		$smarty->assign('MARQUE', MARQUE);
		$smarty->assign('PAYPAL', PAYPAL);
		$smarty->assign('EMAIL', EMAIL);
		$smarty->assign('notification', $this);
		$output = $smarty->fetch('view_notification.tpl');
		return $output;
	}
	
	public static function updateLu($notification_id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE notification SET notification_etat = 1 WHERE notification_id = :notification_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array('notification_id' => $notification_id));
		return true;
	}	
}
?>