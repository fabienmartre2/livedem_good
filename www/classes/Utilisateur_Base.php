<?php
Class Utilisateur_Base { 

	private $_id;
	private $_pseudo;
	private $_nom;
	private $_prenom;
	private $_email;
	private $_password;
	private $_adresse;
	private $_villeId;
	private $_dateNaissance;
	private $_telFixe;
	private $_telPort;
	private $_inscription;
	private $_numSecu;
	private $_numElecteur;
	private $_bureauVote;
	private $_valid;
	private $_ip;
	private $_rang;
	private $_admin;
	private $_newsletter;

	public function __construct($id, $pseudo, $nom, $prenom, $email, $password, $adresse, $villeId, $dateNaissance, $telFixe, $telPort, $inscription, $numSecu, $numElecteur, $bureauVote, $valid, $ip, $rang, $admin, $newsletter) {
		$this->_id = $id;
		$this->_pseudo = $pseudo;
		$this->_nom = $nom;
		$this->_prenom = $prenom;
		$this->_email = $email;
		$this->_password = $password;
		$this->_adresse = $adresse;
		$this->_villeId = $villeId;
		$this->_dateNaissance = $dateNaissance;
		$this->_telFixe = $telFixe;
		$this->_telPort = $telPort;
		$this->_inscription = $inscription;
		$this->_numSecu = $numSecu;
		$this->_numElecteur = $numElecteur;
		$this->_bureauVote = $bureauVote;
		$this->_valid = $valid;
		$this->_ip = $ip;
		$this->_rang = $rang;
		$this->_admin = $admin;
		$this->_newsletter = $newsletter;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getPseudo(){
		return stripslashes($this->_pseudo);
	}
	public function getNom(){
		return stripslashes($this->_nom);
	}
	public function getPrenom(){
		return stripslashes($this->_prenom);
	}
	public function getEmail(){
		return stripslashes($this->_email);
	}
	public function getPassword(){
		return stripslashes($this->_password);
	}
	public function getAdresse(){
		return stripslashes($this->_adresse);
	}
	public function getVilleId(){
		return stripslashes($this->_villeId);
	}
	public function getDateNaissance(){
		return stripslashes($this->_dateNaissance);
	}
	public function getTelFixe(){
		return stripslashes($this->_telFixe);
	}
	public function getTelPort(){
		return stripslashes($this->_telPort);
	}
	public function getInscription(){
		return stripslashes($this->_inscription);
	}
	public function getNumSecu(){
		return stripslashes($this->_numSecu);
	}
	public function getNumElecteur(){
		return stripslashes($this->_numElecteur);
	}
	public function getBureauVote(){
		return stripslashes($this->_bureauVote);
	}
	public function getValid(){
		return stripslashes($this->_valid);
	}
	public function getIp(){
		return stripslashes($this->_ip);
	}
	public function getRang(){
		return stripslashes($this->_rang);
	}
	public function getAdmin(){
		return stripslashes($this->_admin);
	}
	public function getNewsletter(){
		return stripslashes($this->_newsletter);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_id` = :utilisateur_id WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setPseudo($pseudo){
		$this->_pseudo = $pseudo;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_pseudo` = :utilisateur_pseudo WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_pseudo' => $this->getPseudo());
		return $resSelect->execute($data);
	}
	public function setNom($nom){
		$this->_nom = $nom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_nom` = :utilisateur_nom WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_nom' => $this->getNom());
		return $resSelect->execute($data);
	}
	public function setPrenom($prenom){
		$this->_prenom = $prenom;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_prenom` = :utilisateur_prenom WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_prenom' => $this->getPrenom());
		return $resSelect->execute($data);
	}
	public function setEmail($email){
		$this->_email = $email;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_email` = :utilisateur_email WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_email' => $this->getEmail());
		return $resSelect->execute($data);
	}
	public function setPassword($password){
		$this->_password = $password;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_password` = :utilisateur_password WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_password' => $this->getPassword());
		return $resSelect->execute($data);
	}
	public function setAdresse($adresse){
		$this->_adresse = $adresse;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_adresse` = :utilisateur_adresse WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_adresse' => $this->getAdresse());
		return $resSelect->execute($data);
	}
	public function setVilleId($villeId){
		$this->_villeId = $villeId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `ville_id` = :ville_id WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':ville_id' => $this->getVilleId());
		return $resSelect->execute($data);
	}
	public function setDateNaissance($dateNaissance){
		$this->_dateNaissance = $dateNaissance;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_datenaissance` = :utilisateur_datenaissance WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_datenaissance' => $this->getDateNaissance());
		return $resSelect->execute($data);
	}
	public function setTelFixe($telFixe){
		$this->_telFixe = $telFixe;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_telfixe` = :utilisateur_telfixe WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_telfixe' => $this->getTelFixe());
		return $resSelect->execute($data);
	}
	public function setTelPort($telPort){
		$this->_telPort = $telPort;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_telport` = :utilisateur_telport WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_telport' => $this->getTelPort());
		return $resSelect->execute($data);
	}
	public function setInscription($inscription){
		$this->_inscription = $inscription;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_inscription` = :utilisateur_inscription WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_inscription' => $this->getInscription());
		return $resSelect->execute($data);
	}
	public function setNumSecu($numSecu){
		$this->_numSecu = $numSecu;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_numsecu` = :utilisateur_numsecu WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_numsecu' => $this->getNumSecu());
		return $resSelect->execute($data);
	}
	public function setNumElecteur($numElecteur){
		$this->_numElecteur = $numElecteur;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_numelecteur` = :utilisateur_numelecteur WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_numelecteur' => $this->getNumElecteur());
		return $resSelect->execute($data);
	}
	public function setBureauVote($bureauVote){
		$this->_bureauVote = $bureauVote;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_bureauvote` = :utilisateur_bureauvote WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_bureauvote' => $this->getBureauVote());
		return $resSelect->execute($data);
	}
	public function setValid($valid){
		$this->_valid = $valid;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_valid` = :utilisateur_valid WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_valid' => $this->getValid());
		return $resSelect->execute($data);
	}
	public function setIp($ip){
		$this->_ip = $ip;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_ip` = :utilisateur_ip WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_ip' => $this->getIp());
		return $resSelect->execute($data);
	}
	public function setRang($rang){
		$this->_rang = $rang;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_rang` = :utilisateur_rang WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_rang' => $this->getRang());
		return $resSelect->execute($data);
	}
	public function setAdmin($admin){
		$this->_admin = $admin;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_admin` = :utilisateur_admin WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_admin' => $this->getAdmin());
		return $resSelect->execute($data);
	}
	public function setNewsletter($newsletter){
		$this->_newsletter = $newsletter;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE utilisateur SET `utilisateur_newsletter` = :utilisateur_newsletter WHERE utilisateur_id = :utilisateur_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':utilisateur_id' => $this->getId(), ':utilisateur_newsletter' => $this->getNewsletter());
		return $resSelect->execute($data);
	}

	public static function selectUtilisateur($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM utilisateur WHERE utilisateur_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Utilisateur(
			$data['utilisateur_id'], 
			$data['utilisateur_pseudo'], 
			$data['utilisateur_nom'], 
			$data['utilisateur_prenom'], 
			$data['utilisateur_email'], 
			$data['utilisateur_password'], 
			$data['utilisateur_adresse'], 
			$data['ville_id'], 
			$data['utilisateur_datenaissance'], 
			$data['utilisateur_telfixe'], 
			$data['utilisateur_telport'], 
			$data['utilisateur_inscription'], 
			$data['utilisateur_numsecu'], 
			$data['utilisateur_numelecteur'], 
			$data['utilisateur_bureauvote'], 
			$data['utilisateur_valid'], 
			$data['utilisateur_ip'], 
			$data['utilisateur_rang'], 
			$data['utilisateur_admin'], 
			$data['utilisateur_newsletter']
		);
	}


	public static function insertUtilisateur($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO utilisateur SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['id'];
		}
		if(isset($post['pseudo'])){
			$reqSelect .=	'`utilisateur_pseudo` = :utilisateur_pseudo, ';
			$data['utilisateur_pseudo'] = $post['pseudo'];
		}
		if(isset($post['nom'])){
			$reqSelect .=	'`utilisateur_nom` = :utilisateur_nom, ';
			$data['utilisateur_nom'] = $post['nom'];
		}
		if(isset($post['prenom'])){
			$reqSelect .=	'`utilisateur_prenom` = :utilisateur_prenom, ';
			$data['utilisateur_prenom'] = $post['prenom'];
		}
		if(isset($post['email'])){
			$reqSelect .=	'`utilisateur_email` = :utilisateur_email, ';
			$data['utilisateur_email'] = $post['email'];
		}
		if(isset($post['password'])){
			$reqSelect .=	'`utilisateur_password` = :utilisateur_password, ';
			$data['utilisateur_password'] = $post['password'];
		}
		if(isset($post['adresse'])){
			$reqSelect .=	'`utilisateur_adresse` = :utilisateur_adresse, ';
			$data['utilisateur_adresse'] = $post['adresse'];
		}
		if(isset($post['villeId'])){
			$reqSelect .=	'`ville_id` = :ville_id, ';
			$data['ville_id'] = $post['villeId'];
		}
		if(isset($post['dateNaissance'])){
			$reqSelect .=	'`utilisateur_datenaissance` = :utilisateur_datenaissance, ';
			$data['utilisateur_datenaissance'] = $post['dateNaissance'];
		}
		if(isset($post['telFixe'])){
			$reqSelect .=	'`utilisateur_telfixe` = :utilisateur_telfixe, ';
			$data['utilisateur_telfixe'] = $post['telFixe'];
		}
		if(isset($post['telPort'])){
			$reqSelect .=	'`utilisateur_telport` = :utilisateur_telport, ';
			$data['utilisateur_telport'] = $post['telPort'];
		}
		if(isset($post['inscription'])){
			$reqSelect .=	'`utilisateur_inscription` = :utilisateur_inscription, ';
			$data['utilisateur_inscription'] = $post['inscription'];
		}
		if(isset($post['numSecu'])){
			$reqSelect .=	'`utilisateur_numsecu` = :utilisateur_numsecu, ';
			$data['utilisateur_numsecu'] = $post['numSecu'];
		}
		if(isset($post['numElecteur'])){
			$reqSelect .=	'`utilisateur_numelecteur` = :utilisateur_numelecteur, ';
			$data['utilisateur_numelecteur'] = $post['numElecteur'];
		}
		if(isset($post['bureauVote'])){
			$reqSelect .=	'`utilisateur_bureauvote` = :utilisateur_bureauvote, ';
			$data['utilisateur_bureauvote'] = $post['bureauVote'];
		}
		if(isset($post['valid'])){
			$reqSelect .=	'`utilisateur_valid` = :utilisateur_valid, ';
			$data['utilisateur_valid'] = $post['valid'];
		}
		if(isset($post['ip'])){
			$reqSelect .=	'`utilisateur_ip` = :utilisateur_ip, ';
			$data['utilisateur_ip'] = $post['ip'];
		}
		if(isset($post['rang'])){
			$reqSelect .=	'`utilisateur_rang` = :utilisateur_rang, ';
			$data['utilisateur_rang'] = $post['rang'];
		}
		if(isset($post['admin'])){
			$reqSelect .=	'`utilisateur_admin` = :utilisateur_admin, ';
			$data['utilisateur_admin'] = $post['admin'];
		}
		if(isset($post['newsletter'])){
			$reqSelect .=	'`utilisateur_newsletter` = :utilisateur_newsletter, ';
			$data['utilisateur_newsletter'] = $post['newsletter'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateUtilisateur($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['pseudo']))
			$this->setPseudo($post['pseudo']);
		if(isset($post['nom']))
			$this->setNom($post['nom']);
		if(isset($post['prenom']))
			$this->setPrenom($post['prenom']);
		if(isset($post['email']))
			$this->setEmail($post['email']);
		if(isset($post['password']))
			$this->setPassword($post['password']);
		if(isset($post['adresse']))
			$this->setAdresse($post['adresse']);
		if(isset($post['villeId']))
			$this->setVilleId($post['villeId']);
		if(isset($post['dateNaissance']))
			$this->setDateNaissance($post['dateNaissance']);
		if(isset($post['telFixe']))
			$this->setTelFixe($post['telFixe']);
		if(isset($post['telPort']))
			$this->setTelPort($post['telPort']);
		if(isset($post['inscription']))
			$this->setInscription($post['inscription']);
		if(isset($post['numSecu']))
			$this->setNumSecu($post['numSecu']);
		if(isset($post['numElecteur']))
			$this->setNumElecteur($post['numElecteur']);
		if(isset($post['bureauVote']))
			$this->setBureauVote($post['bureauVote']);
		if(isset($post['valid']))
			$this->setValid($post['valid']);
		if(isset($post['ip']))
			$this->setIp($post['ip']);
		if(isset($post['rang']))
			$this->setRang($post['rang']);
		if(isset($post['admin']))
			$this->setAdmin($post['admin']);
		if(isset($post['newsletter']))
			$this->setNewsletter($post['newsletter']);
		return true;
	}

	public static function deleteUtilisateur($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM utilisateur WHERE utilisateur_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectUtilisateurs($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT utilisateur.* FROM utilisateur";
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
			$result[] = new Utilisateur(
				$data['utilisateur_id'], 
				$data['utilisateur_pseudo'], 
				$data['utilisateur_nom'], 
				$data['utilisateur_prenom'], 
				$data['utilisateur_email'], 
				$data['utilisateur_password'], 
				$data['utilisateur_adresse'], 
				$data['ville_id'], 
				$data['utilisateur_datenaissance'], 
				$data['utilisateur_telfixe'], 
				$data['utilisateur_telport'], 
				$data['utilisateur_inscription'], 
				$data['utilisateur_numsecu'], 
				$data['utilisateur_numelecteur'], 
				$data['utilisateur_bureauvote'], 
				$data['utilisateur_valid'], 
				$data['utilisateur_ip'], 
				$data['utilisateur_rang'], 
				$data['utilisateur_admin'], 
				$data['utilisateur_newsletter']
			);
		}
		return $result;
	}

	public static function getNbUtilisateurs($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(utilisateur.utilisateur_id) as nombre FROM utilisateur";
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