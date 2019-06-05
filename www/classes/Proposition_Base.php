<?php
Class Proposition_Base { 

	private $_id;
	private $_titre;
	private $_description;
	private $_utilisateurId;
	private $_date;
	private $_update;
	private $_image;
	private $_niveauId;
	private $_villeId;
	private $_departementId;
	private $_regionId;
	private $_cout;
	private $_zone;
	private $_financement;
	private $_impact;
	private $_delai;
	private $_periode;
	private $_statut;
	private $_categorieId;
	private $_transmission;
	private $_resultat;
	private $_dureeSoutien;
	private $_dureeDebat;
	private $_dureeVote;

	public function __construct($id, $titre, $description, $utilisateurId, $date, $update, $image, $niveauId, $villeId, $departementId, $regionId, $cout, $zone, $financement, $impact, $delai, $periode, $statut, $categorieId, $transmission, $resultat, $dureeSoutien, $dureeDebat, $dureeVote) {
		$this->_id = $id;
		$this->_titre = $titre;
		$this->_description = $description;
		$this->_utilisateurId = $utilisateurId;
		$this->_date = $date;
		$this->_update = $update;
		$this->_image = $image;
		$this->_niveauId = $niveauId;
		$this->_villeId = $villeId;
		$this->_departementId = $departementId;
		$this->_regionId = $regionId;
		$this->_cout = $cout;
		$this->_zone = $zone;
		$this->_financement = $financement;
		$this->_impact = $impact;
		$this->_delai = $delai;
		$this->_periode = $periode;
		$this->_statut = $statut;
		$this->_categorieId = $categorieId;
		$this->_transmission = $transmission;
		$this->_resultat = $resultat;
		$this->_dureeSoutien = $dureeSoutien;
		$this->_dureeDebat = $dureeDebat;
		$this->_dureeVote = $dureeVote;
	}

	public function getId(){
		return stripslashes($this->_id);
	}
	public function getTitre(){
		return stripslashes($this->_titre);
	}
	public function getDescription(){
		return stripslashes($this->_description);
	}
	public function getUtilisateurId(){
		return stripslashes($this->_utilisateurId);
	}
	public function getDate(){
		return stripslashes($this->_date);
	}
	public function getUpdate(){
		return stripslashes($this->_update);
	}
	public function getImage(){
		return stripslashes($this->_image);
	}
	public function getNiveauId(){
		return stripslashes($this->_niveauId);
	}
	public function getVilleId(){
		return stripslashes($this->_villeId);
	}
	public function getDepartementId(){
		return stripslashes($this->_departementId);
	}
	public function getRegionId(){
		return stripslashes($this->_regionId);
	}
	public function getCout(){
		return stripslashes($this->_cout);
	}
	public function getZone(){
		return stripslashes($this->_zone);
	}
	public function getFinancement(){
		return stripslashes($this->_financement);
	}
	public function getImpact(){
		return stripslashes($this->_impact);
	}
	public function getDelai(){
		return stripslashes($this->_delai);
	}
	public function getPeriode(){
		return stripslashes($this->_periode);
	}
	public function getStatut(){
		return stripslashes($this->_statut);
	}
	public function getCategorieId(){
		return stripslashes($this->_categorieId);
	}
	public function getTransmission(){
		return stripslashes($this->_transmission);
	}
	public function getResultat(){
		return stripslashes($this->_resultat);
	}
	public function getDureeSoutien(){
		return stripslashes($this->_dureeSoutien);
	}
	public function getDureeDebat(){
		return stripslashes($this->_dureeDebat);
	}
	public function getDureeVote(){
		return stripslashes($this->_dureeVote);
	}
	public function setId($id){
		$this->_id = $id;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_id` = :proposition_id WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_id' => $this->getId());
		return $resSelect->execute($data);
	}
	public function setTitre($titre){
		$this->_titre = $titre;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_titre` = :proposition_titre WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_titre' => $this->getTitre());
		return $resSelect->execute($data);
	}
	public function setDescription($description){
		$this->_description = $description;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_description` = :proposition_description WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_description' => $this->getDescription());
		return $resSelect->execute($data);
	}
	public function setUtilisateurId($utilisateurId){
		$this->_utilisateurId = $utilisateurId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `utilisateur_id` = :utilisateur_id WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':utilisateur_id' => $this->getUtilisateurId());
		return $resSelect->execute($data);
	}
	public function setDate($date){
		$this->_date = $date;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_date` = :proposition_date WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_date' => $this->getDate());
		return $resSelect->execute($data);
	}
	public function setUpdate($update){
		$this->_update = $update;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_update` = :proposition_update WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_update' => $this->getUpdate());
		return $resSelect->execute($data);
	}
	public function setImage($image){
		$this->_image = $image;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_image` = :proposition_image WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_image' => $this->getImage());
		return $resSelect->execute($data);
	}
	public function setNiveauId($niveauId){
		$this->_niveauId = $niveauId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `niveau_id` = :niveau_id WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':niveau_id' => $this->getNiveauId());
		return $resSelect->execute($data);
	}
	public function setVilleId($villeId){
		$this->_villeId = $villeId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `ville_id` = :ville_id WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':ville_id' => $this->getVilleId());
		return $resSelect->execute($data);
	}
	public function setDepartementId($departementId){
		$this->_departementId = $departementId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `departement_id` = :departement_id WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':departement_id' => $this->getDepartementId());
		return $resSelect->execute($data);
	}
	public function setRegionId($regionId){
		$this->_regionId = $regionId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `region_id` = :region_id WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':region_id' => $this->getRegionId());
		return $resSelect->execute($data);
	}
	public function setCout($cout){
		$this->_cout = $cout;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_cout` = :proposition_cout WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_cout' => $this->getCout());
		return $resSelect->execute($data);
	}
	public function setZone($zone){
		$this->_zone = $zone;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_zone` = :proposition_zone WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_zone' => $this->getZone());
		return $resSelect->execute($data);
	}
	public function setFinancement($financement){
		$this->_financement = $financement;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_financement` = :proposition_financement WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_financement' => $this->getFinancement());
		return $resSelect->execute($data);
	}
	public function setImpact($impact){
		$this->_impact = $impact;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_impact` = :proposition_impact WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_impact' => $this->getImpact());
		return $resSelect->execute($data);
	}
	public function setDelai($delai){
		$this->_delai = $delai;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_delai` = :proposition_delai WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_delai' => $this->getDelai());
		return $resSelect->execute($data);
	}
	public function setPeriode($periode){
		$this->_periode = $periode;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_periode` = :proposition_periode WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_periode' => $this->getPeriode());
		return $resSelect->execute($data);
	}
	public function setStatut($statut){
		$this->_statut = $statut;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_statut` = :proposition_statut WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_statut' => $this->getStatut());
		return $resSelect->execute($data);
	}
	public function setCategorieId($categorieId){
		$this->_categorieId = $categorieId;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `categorie_id` = :categorie_id WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':categorie_id' => $this->getCategorieId());
		return $resSelect->execute($data);
	}
	public function setTransmission($transmission){
		$this->_transmission = $transmission;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_transmission` = :proposition_transmission WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_transmission' => $this->getTransmission());
		return $resSelect->execute($data);
	}
	public function setResultat($resultat){
		$this->_resultat = $resultat;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_resultat` = :proposition_resultat WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_resultat' => $this->getResultat());
		return $resSelect->execute($data);
	}
	public function setDureeSoutien($dureeSoutien){
		$this->_dureeSoutien = $dureeSoutien;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_dureesoutien` = :proposition_dureesoutien WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_dureesoutien' => $this->getDureeSoutien());
		return $resSelect->execute($data);
	}
	public function setDureeDebat($dureeDebat){
		$this->_dureeDebat = $dureeDebat;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_dureedebat` = :proposition_dureedebat WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_dureedebat' => $this->getDureeDebat());
		return $resSelect->execute($data);
	}
	public function setDureeVote($dureeVote){
		$this->_dureeVote = $dureeVote;
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE proposition SET `proposition_dureevote` = :proposition_dureevote WHERE proposition_id = :proposition_id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':proposition_id' => $this->getId(), ':proposition_dureevote' => $this->getDureeVote());
		return $resSelect->execute($data);
	}

	public static function selectProposition($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT * FROM proposition WHERE proposition_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute(array(':id' => $id));
		$data = $resSelect->fetch(PDO::FETCH_ASSOC);
		// On vérifie la bonne récuparation
		if(empty($data))
			return false;
		// On retourne un membre
		return new Proposition(
			$data['proposition_id'], 
			$data['proposition_titre'], 
			$data['proposition_description'], 
			$data['utilisateur_id'], 
			$data['proposition_date'], 
			$data['proposition_update'], 
			$data['proposition_image'], 
			$data['niveau_id'], 
			$data['ville_id'], 
			$data['departement_id'], 
			$data['region_id'], 
			$data['proposition_cout'], 
			$data['proposition_zone'], 
			$data['proposition_financement'], 
			$data['proposition_impact'], 
			$data['proposition_delai'], 
			$data['proposition_periode'], 
			$data['proposition_statut'], 
			$data['categorie_id'], 
			$data['proposition_transmission'], 
			$data['proposition_resultat'], 
			$data['proposition_dureesoutien'], 
			$data['proposition_dureedebat'], 
			$data['proposition_dureevote']
		);
	}


	public static function insertProposition($post = array(), $files = array()){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "INSERT INTO proposition SET ";
		$data = array();
		if(isset($post['id'])){
			$reqSelect .=	'`proposition_id` = :proposition_id, ';
			$data['proposition_id'] = $post['id'];
		}
		if(isset($post['titre'])){
			$reqSelect .=	'`proposition_titre` = :proposition_titre, ';
			$data['proposition_titre'] = $post['titre'];
		}
		if(isset($post['description'])){
			$reqSelect .=	'`proposition_description` = :proposition_description, ';
			$data['proposition_description'] = $post['description'];
		}
		if(isset($post['utilisateurId'])){
			$reqSelect .=	'`utilisateur_id` = :utilisateur_id, ';
			$data['utilisateur_id'] = $post['utilisateurId'];
		}
		if(isset($post['date'])){
			$reqSelect .=	'`proposition_date` = :proposition_date, ';
			$data['proposition_date'] = $post['date'];
		}
		if(isset($post['update'])){
			$reqSelect .=	'`proposition_update` = :proposition_update, ';
			$data['proposition_update'] = $post['update'];
		}
		if(isset($post['image'])){
			$reqSelect .=	'`proposition_image` = :proposition_image, ';
			$data['proposition_image'] = $post['image'];
		}
		if(isset($post['niveauId'])){
			$reqSelect .=	'`niveau_id` = :niveau_id, ';
			$data['niveau_id'] = $post['niveauId'];
		}
		if(isset($post['villeId'])){
			$reqSelect .=	'`ville_id` = :ville_id, ';
			$data['ville_id'] = $post['villeId'];
		}
		if(isset($post['departementId'])){
			$reqSelect .=	'`departement_id` = :departement_id, ';
			$data['departement_id'] = $post['departementId'];
		}
		if(isset($post['regionId'])){
			$reqSelect .=	'`region_id` = :region_id, ';
			$data['region_id'] = $post['regionId'];
		}
		if(isset($post['cout'])){
			$reqSelect .=	'`proposition_cout` = :proposition_cout, ';
			$data['proposition_cout'] = $post['cout'];
		}
		if(isset($post['zone'])){
			$reqSelect .=	'`proposition_zone` = :proposition_zone, ';
			$data['proposition_zone'] = $post['zone'];
		}
		if(isset($post['financement'])){
			$reqSelect .=	'`proposition_financement` = :proposition_financement, ';
			$data['proposition_financement'] = $post['financement'];
		}
		if(isset($post['impact'])){
			$reqSelect .=	'`proposition_impact` = :proposition_impact, ';
			$data['proposition_impact'] = $post['impact'];
		}
		if(isset($post['delai'])){
			$reqSelect .=	'`proposition_delai` = :proposition_delai, ';
			$data['proposition_delai'] = $post['delai'];
		}
		if(isset($post['periode'])){
			$reqSelect .=	'`proposition_periode` = :proposition_periode, ';
			$data['proposition_periode'] = $post['periode'];
		}
		if(isset($post['statut'])){
			$reqSelect .=	'`proposition_statut` = :proposition_statut, ';
			$data['proposition_statut'] = $post['statut'];
		}
		if(isset($post['categorieId'])){
			$reqSelect .=	'`categorie_id` = :categorie_id, ';
			$data['categorie_id'] = $post['categorieId'];
		}
		if(isset($post['transmission'])){
			$reqSelect .=	'`proposition_transmission` = :proposition_transmission, ';
			$data['proposition_transmission'] = $post['transmission'];
		}
		if(isset($post['resultat'])){
			$reqSelect .=	'`proposition_resultat` = :proposition_resultat, ';
			$data['proposition_resultat'] = $post['resultat'];
		}
		if(isset($post['dureeSoutien'])){
			$reqSelect .=	'`proposition_dureesoutien` = :proposition_dureesoutien, ';
			$data['proposition_dureesoutien'] = $post['dureeSoutien'];
		}
		if(isset($post['dureeDebat'])){
			$reqSelect .=	'`proposition_dureedebat` = :proposition_dureedebat, ';
			$data['proposition_dureedebat'] = $post['dureeDebat'];
		}
		if(isset($post['dureeVote'])){
			$reqSelect .=	'`proposition_dureevote` = :proposition_dureevote, ';
			$data['proposition_dureevote'] = $post['dureeVote'];
		}
		$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
		$resSelect =  $connexion->prepare($reqSelect);
		$resSelect->execute($data);
		return $connexion->lastInsertId();
	}

	public function updateProposition($post, $files = array()){
		if(isset($post['id']))
			$this->setId($post['id']);
		if(isset($post['titre']))
			$this->setTitre($post['titre']);
		if(isset($post['description']))
			$this->setDescription($post['description']);
		if(isset($post['utilisateurId']))
			$this->setUtilisateurId($post['utilisateurId']);
		if(isset($post['date']))
			$this->setDate($post['date']);
		if(isset($post['update']))
			$this->setUpdate($post['update']);
		if(isset($post['image']))
			$this->setImage($post['image']);
		if(isset($post['niveauId']))
			$this->setNiveauId($post['niveauId']);
		if(isset($post['villeId']))
			$this->setVilleId($post['villeId']);
		if(isset($post['departementId']))
			$this->setDepartementId($post['departementId']);
		if(isset($post['regionId']))
			$this->setRegionId($post['regionId']);
		if(isset($post['cout']))
			$this->setCout($post['cout']);
		if(isset($post['zone']))
			$this->setZone($post['zone']);
		if(isset($post['financement']))
			$this->setFinancement($post['financement']);
		if(isset($post['impact']))
			$this->setImpact($post['impact']);
		if(isset($post['delai']))
			$this->setDelai($post['delai']);
		if(isset($post['periode']))
			$this->setPeriode($post['periode']);
		if(isset($post['statut']))
			$this->setStatut($post['statut']);
		if(isset($post['categorieId']))
			$this->setCategorieId($post['categorieId']);
		if(isset($post['transmission']))
			$this->setTransmission($post['transmission']);
		if(isset($post['resultat']))
			$this->setResultat($post['resultat']);
		if(isset($post['dureeSoutien']))
			$this->setDureeSoutien($post['dureeSoutien']);
		if(isset($post['dureeDebat']))
			$this->setDureeDebat($post['dureeDebat']);
		if(isset($post['dureeVote']))
			$this->setDureeVote($post['dureeVote']);
		return true;
	}

	public static function deleteProposition($id){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "DELETE FROM proposition WHERE proposition_id = :id";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':id' => $id);
		return $resSelect->execute($data);
	}

	public static function selectPropositions($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){
		$page = intval($page);
		$max = intval($max);
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT proposition.* FROM proposition";
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
			$result[] = new Proposition(
				$data['proposition_id'], 
				$data['proposition_titre'], 
				$data['proposition_description'], 
				$data['utilisateur_id'], 
				$data['proposition_date'], 
				$data['proposition_update'], 
				$data['proposition_image'], 
				$data['niveau_id'], 
				$data['ville_id'], 
				$data['departement_id'], 
				$data['region_id'], 
				$data['proposition_cout'], 
				$data['proposition_zone'], 
				$data['proposition_financement'], 
				$data['proposition_impact'], 
				$data['proposition_delai'], 
				$data['proposition_periode'], 
				$data['proposition_statut'], 
				$data['categorie_id'], 
				$data['proposition_transmission'], 
				$data['proposition_resultat'], 
				$data['proposition_dureesoutien'], 
				$data['proposition_dureedebat'], 
				$data['proposition_dureevote']
			);
		}
		return $result;
	}

	public static function getNbPropositions($where = null, $join = null){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT COUNT(proposition.proposition_id) as nombre FROM proposition";
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