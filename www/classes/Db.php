<?php 

class Db {
  /* pour être sûr qu'il n'y a qu'une et une seule instance */
  private static $instance;

  /* le lien de connexion BD */
  protected $connexion;

  /* constructeur privé */
  private function __construct() {
		try{
			$this->connexion = new PDO(PDO_DSN, USER, PASSWD);
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connexion->query("SET NAMES utf8");
		}
		catch(Exception $e){
			echo 'Connexion impossible a la base de donnees. Veuillez renouveller votre demande dans quelques secondes.';
			die();
		}
  }

  /* clonage impossible */
  private function __clone() {}

  /**
   * Accéder à l'UNIQUE instance de la classe
   */
  static public function getInstance() {
    if (! (self::$instance instanceof self)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  /**
   * Accesseur à la connexion
   */
  public function getConnexion() {
    return $this->connexion;
  }
}
