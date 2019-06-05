<?php
Class Admin { 

  private $_id;
  private $_pseudo;
  private $_password;
  private $_email;
  private $_niveau;

  public function __construct($id, $pseudo, $password, $email, $niveau) {
    $this->_id = $id;
    $this->_pseudo = $pseudo;
    $this->_password = $password;
    $this->_email = $email;
    $this->_niveau = $niveau;
  }

  public function getId(){
    return stripslashes($this->_id);
  }
  public function getPseudo(){
    return stripslashes($this->_pseudo);
  }
  public function getPassword(){
    return stripslashes($this->_password);
  }
  public function getEmail(){
    return stripslashes($this->_email);
  }
  public function getNiveau(){
    return stripslashes($this->_niveau);
  }
  public function setId($id){
    $this->_id = $id;
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "UPDATE admin SET `admin_id` = :admin_id WHERE admin_id = :admin_id";
    $resSelect =  $connexion->prepare($reqSelect);
    $data = array(':admin_id' => $this->getId(), ':admin_id' => $this->getId());
    return $resSelect->execute($data);
  }
  public function setPseudo($pseudo){
    $this->_pseudo = $pseudo;
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "UPDATE admin SET `admin_pseudo` = :admin_pseudo WHERE admin_id = :admin_id";
    $resSelect =  $connexion->prepare($reqSelect);
    $data = array(':admin_id' => $this->getId(), ':admin_pseudo' => $this->getPseudo());
    return $resSelect->execute($data);
  }
  public function setPassword($password){
    $this->_password = $password;
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "UPDATE admin SET `admin_password` = :admin_password WHERE admin_id = :admin_id";
    $resSelect =  $connexion->prepare($reqSelect);
    $data = array(':admin_id' => $this->getId(), ':admin_password' => $this->getPassword());
    return $resSelect->execute($data);
  }
  public function setEmail($email){
    $this->_email = $email;
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "UPDATE admin SET `admin_email` = :admin_email WHERE admin_id = :admin_id";
    $resSelect =  $connexion->prepare($reqSelect);
    $data = array(':admin_id' => $this->getId(), ':admin_email' => $this->getEmail());
    return $resSelect->execute($data);
  }
  public function setNiveau($niveau){
    $this->_niveau = $niveau;
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "UPDATE admin SET `admin_niveau` = :admin_niveau WHERE admin_id = :admin_id";
    $resSelect =  $connexion->prepare($reqSelect);
    $data = array(':admin_id' => $this->getId(), ':admin_niveau' => $this->getNiveau());
    return $resSelect->execute($data);
  }

  public static function selectAdmin($id){
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "SELECT * FROM admin WHERE admin_id = :id";
    $resSelect =  $connexion->prepare($reqSelect);
    $resSelect->execute(array(':id' => $id));
    $data = $resSelect->fetch(PDO::FETCH_ASSOC);
    // On vÃ©rifie la bonne rÃ©cuparation
    if(empty($data))
      return false;
    // On retourne un membre
    return new self(
      $data['admin_id'], 
      $data['admin_pseudo'], 
      $data['admin_password'], 
      $data['admin_email'], 
      $data['admin_niveau']
    );
  }


  public static function insertAdmin($post = array(), $files = array()){
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "INSERT INTO admin SET ";
    $data = array();
    if(!empty($post['id'])){
      $reqSelect .= '`admin_id` = :admin_id, ';
      $data['admin_id'] = $post['id'];
    }
    if(!empty($post['pseudo'])){
      $reqSelect .= '`admin_pseudo` = :admin_pseudo, ';
      $data['admin_pseudo'] = $post['pseudo'];
    }
    if(!empty($post['password'])){
      $reqSelect .= '`admin_password` = :admin_password, ';
      $data['admin_password'] = $post['password'];
    }
    if(!empty($post['email'])){
      $reqSelect .= '`admin_email` = :admin_email, ';
      $data['admin_email'] = $post['email'];
    }
    if(!empty($post['niveau'])){
      $reqSelect .= '`admin_niveau` = :admin_niveau, ';
      $data['admin_niveau'] = $post['niveau'];
    }
    $reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);
    $resSelect =  $connexion->prepare($reqSelect);
    $resSelect->execute($data);
    return $connexion->lastInsertId();
  }

  public function updateAdmin($post, $files = array()){
    if(!empty($post['id']))
      $this->setId($post['id']);
    if(!empty($post['pseudo']))
      $this->setPseudo($post['pseudo']);
    if(!empty($post['password']))
      $this->setPassword($post['password']);
    if(!empty($post['email']))
      $this->setEmail($post['email']);
    if(!empty($post['niveau']))
      $this->setNiveau($post['niveau']);
    return true;
  }

  public static function deleteAdmin($id){
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "DELETE FROM admin WHERE admin_id = :id";
    $resSelect =  $connexion->prepare($reqSelect);
    $data = array(':id' => $id);
    return $resSelect->execute($data);
  }

  public function selectAdmins($page = 1, $max = 20, $where = null, $order = null, $groupby = null){
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "SELECT admin_id FROM admin";
    $reqSelect .= " WHERE 1 = 1 ";
    if(!empty($where)){
      foreach($where as $cle => $valeur){
        $reqSelect .= " AND ".$valeur."";
      }
    }
    if(!empty($order)){
      $reqSelect .= " ORDER BY ".$order."";
    }
    if(!empty($groupby)){
      $reqSelect .= " GROUP BY ".$groupby."";
    }
    if($max != 0)
      $reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";
    $resSelect =  $connexion->prepare($reqSelect);
    $resSelect->execute();
    $data = $resSelect->fetchall(PDO::FETCH_COLUMN, 0);
    $result = array();
    foreach($data as $id){
      $result[] = Admin::selectAdmin($id);
    }
    return $result;
  }

  public static function getNbAdmins($where = null){
    $db = Db::getInstance();
    $connexion = $db->getConnexion();
    $reqSelect =  "SELECT count(admin_id) as nombre FROM admin";
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