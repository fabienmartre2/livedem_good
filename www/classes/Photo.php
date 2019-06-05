
<?php
Class Photo { 

	private $_id;
	private $_utilisateurId;
	private $_albumId;
	private $_titre;
	private $_localisation;
	private $_date;
	private $_ip;
	private $_typeConteneur;
	private $_conteneurId;
	private $_valide;
	private $_visibilite;
	private $_typeId;
	private $_suppression;

	public function __construct($id, $utilisateurId, $albumId, $titre, $localisation, $date, $ip, $typeConteneur, $conteneurId, $valide, $visibilite, $typeId, $suppression) {
		$this->_id = $id;
		$this->_utilisateurId = $utilisateurId;
		$this->_albumId = $albumId;
		$this->_titre = $titre;
		$this->_localisation = $localisation;
		$this->_date = $date;
		$this->_ip = $ip;
		$this->_typeConteneur = $typeConteneur;
		$this->_conteneurId = $conteneurId;
		$this->_valide = $valide;
		$this->_visibilite = $visibilite;
		$this->_typeId = $typeId;
		$this->_suppression = $suppression;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
	}
	public function getAlbumId(){
		return stripslashes($this->_albumId);
	}
	public function getTitre(){
		return stripslashes($this->_titre);
	}
	public function getLocalisation(){
		return stripslashes($this->_localisation);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function getIp(){
		return stripslashes($this->_ip);
	}
	public function getTypeConteneur(){
		return stripslashes($this->_typeConteneur);
	}
	public function getConteneurId(){
		return stripslashes($this->_conteneurId);
	}
	public function getValide(){
		return stripslashes($this->_valide);
	}
	public function getVisibilite(){
		return stripslashes($this->_visibilite);
	}
	public function getTypeId(){
		return stripslashes($this->_typeId);
	}
	public function getSuppression(){
		return stripslashes($this->_suppression);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_id` = :photo_id WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `utilisateur_id` = :utilisateur_id WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setAlbumId($albumId){
		$this->_albumId = $albumId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `album_id` = :album_id WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':album_id' => $this->getAlbumId());
		return $resSelect->execute($data);
	}
	public function setTitre($titre){
		$this->_titre = $titre;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_titre` = :photo_titre WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_titre' => $this->getTitre());
		return $resSelect->execute($data);
	}
	public function setLocalisation($localisation){
		$this->_localisation = $localisation;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_localisation` = :photo_localisation WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_localisation' => $this->getLocalisation());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_date` = :photo_date WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_ip` = :photo_ip WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_ip' => $this->getIp());
		return $resSelect->execute($data);
	}
	public function setTypeConteneur($typeConteneur){
		$this->_typeConteneur = $typeConteneur;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `type_conteneur` = :type_conteneur WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':type_conteneur' => $this->getTypeConteneur());
		return $resSelect->execute($data);
	}
	public function setConteneurId($conteneurId){
		$this->_conteneurId = $conteneurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `conteneur_id` = :conteneur_id WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':conteneur_id' => $this->getConteneurId());
		return $resSelect->execute($data);
	}
	public function setValide($valide){
		$this->_valide = $valide;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_valide` = :photo_valide WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_valide' => $this->getValide());
		return $resSelect->execute($data);
	}
	public function setVisibilite($visibilite){
		$this->_visibilite = $visibilite;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_visibilite` = :photo_visibilite WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_visibilite' => $this->getVisibilite());
		return $resSelect->execute($data);
	}
	public function setTypeId($typeId){
		$this->_typeId = $typeId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `type_id` = :type_id WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':type_id' => $this->getTypeId());
		return $resSelect->execute($data);
	}
	public function setSuppression($suppression){
		$this->_suppression = $suppression;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET `photo_suppression` = :photo_suppression WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':photo_id' => $this->getId(), ':photo_suppression' => $this->getSuppression());
		return $resSelect->execute($data);
	}

	public function updatePhoto(){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE photo SET
			`photo_id` = :photo_id, 
			`utilisateur_id` = :utilisateur_id, 
			`album_id` = :album_id, 
			`photo_titre` = :photo_titre, 
			`photo_localisation` = :photo_localisation, 
			`photo_date` = :photo_date, 
			`photo_ip` = :photo_ip, 
			`type_conteneur` = :type_conteneur, 
			`conteneur_id` = :conteneur_id, 
			`photo_valide` = :photo_valide, 
			`photo_visibilite` = :photo_visibilite, 
			`type_id` = :type_id, 
			`photo_suppression` = :photo_suppression
		 WHERE photo_id = :photo_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(
			':photo_id' => $this->getId(), 
			':utilisateur_id' => $this->getUtilisateurId(), 
			':album_id' => $this->getAlbumId(), 
			':photo_titre' => $this->getTitre(), 
			':photo_localisation' => $this->getLocalisation(), 
			':photo_date' => $this->getDate(), 
			':photo_ip' => $this->getIp(), 
			':type_conteneur' => $this->getTypeConteneur(), 
			':conteneur_id' => $this->getConteneurId(), 
			':photo_valide' => $this->getValide(), 
			':photo_visibilite' => $this->getVisibilite(), 
			':type_id' => $this->getTypeId(), 
			':photo_suppression' => $this->getSuppression()
		);
		return $resSelect->execute($data);
	}

	public static function selectPhoto($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM photo WHERE photo_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vÃ©rifie la bonne rÃ©cuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new self(
			$data['photo_id'], 
			$data['utilisateur_id'], 
			$data['album_id'], 
			$data['photo_titre'], 
			$data['photo_localisation'], 
			$data['photo_date'], 
			$data['photo_ip'], 
			$data['type_conteneur'], 
			$data['conteneur_id'], 
			$data['photo_valide'], 
			$data['photo_visibilite'], 
			$data['type_id'], 
			$data['photo_suppression']
		);
	}


	public static function insertPhoto($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO photo SET ";
		$data = array();
		if(!empty($post['id'])){
			$reqSelect .=	'`photo_id` = :photo_id, ';
			$data['photo_id'] = $post['id'];
		}
		if(!empty($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(!empty($post['albumId'])){
			$reqSelect .=	'`album_id` = :album_id, ';
			$data['album_id'] = $post['albumId'];
		}
		if(!empty($post['titre'])){
			$reqSelect .=	'`photo_titre` = :photo_titre, ';
			$data['photo_titre'] = $post['titre'];
		}
		if(!empty($post['localisation'])){
			$reqSelect .=	'`photo_localisation` = :photo_localisation, ';
			$data['photo_localisation'] = $post['localisation'];
		}
		if(!empty($post['date'])){
			$reqSelect .=	'`photo_date` = :photo_date, ';
			$data['photo_date'] = $post['date'];
		}
		if(!empty($post['ip'])){
			$reqSelect .=	'`photo_ip` = :photo_ip, ';
			$data['photo_ip'] = $post['ip'];
		}
		if(!empty($post['typeConteneur'])){
			$reqSelect .=	'`type_conteneur` = :type_conteneur, ';
			$data['type_conteneur'] = $post['typeConteneur'];
		}
		if(!empty($post['conteneurId'])){
			$reqSelect .=	'`conteneur_id` = :conteneur_id, ';
			$data['conteneur_id'] = $post['conteneurId'];
		}
		if(!empty($post['valide'])){
			$reqSelect .=	'`photo_valide` = :photo_valide, ';
			$data['photo_valide'] = $post['valide'];
		}
		if(!empty($post['visibilite'])){
			$reqSelect .=	'`photo_visibilite` = :photo_visibilite, ';
			$data['photo_visibilite'] = $post['visibilite'];
		}
		if(!empty($post['typeId'])){
			$reqSelect .=	'`type_id` = :type_id, ';
			$data['type_id'] = $post['typeId'];
		}
		if(!empty($post['suppression'])){
			$reqSelect .=	'`photo_suppression` = :photo_suppression, ';
			$data['photo_suppression'] = $post['suppression'];
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
		if(!empty($post['albumId']))
			$this->setAlbumId($post['albumId']);
		if(!empty($post['titre']))
			$this->setTitre($post['titre']);
		if(!empty($post['localisation']))
			$this->setLocalisation($post['localisation']);
		if(!empty($post['date']))
			$this->setDate($post['date']);
		if(!empty($post['ip']))
			$this->setIp($post['ip']);
		if(!empty($post['typeConteneur']))
			$this->setTypeConteneur($post['typeConteneur']);
		if(!empty($post['conteneurId']))
			$this->setConteneurId($post['conteneurId']);
		if(!empty($post['valide']))
			$this->setValide($post['valide']);
		if(!empty($post['visibilite']))
			$this->setVisibilite($post['visibilite']);
		if(!empty($post['typeId']))
			$this->setTypeId($post['typeId']);
		if(!empty($post['suppression']))
			$this->setSuppression($post['suppression']);
		return true;
	}

	public static function deletePhoto($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM photo WHERE photo_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public function selectPhotos($page = 1, $max = 20, $where = null, $order = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT photo_id FROM photo";
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

	public static function getNbPhotos($where = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT count(photo_id) as nombre FROM photo";
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
}
?>