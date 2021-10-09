<?php

class user {

  private $id;
  private $nom;
  private $nom_usage;
  private $prenom;
  private $sexe;
  private $mail;
  private $mdp;
  private $statut;

  /**
 * constructeur de la classe user.
 * @param array $array
 */
public function __construct($array)
{
    $this->hydrate($array);
}
/**
 * @param array $donnees
 */
public function hydrate($donnees)
{
    foreach($donnees as $key => $value){
        $method = 'set'.ucfirst($key);
        if(method_exists($this,$method)){
            $this->$method($value);
        }
    }
}

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
  }

  public function getNom_usage()
  {
    return $this->nom_usage;
  }

  public function setNom_usage($nom_usage)
  {
    $this->nom_usage = $nom_usage;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
  }

  public function getSexe()
  {
    return $this->sexe;
  }

  public function setSexe($sexe)
  {
    $this->sexe = $sexe;
  }

  public function getMail()
  {
    return $this->mail;
  }

  public function setMail($mail)
  {
    $this->mail = $mail;
  }

  public function getMdp()
  {
    return $this->mdp;
  }

  public function setMdp($mdp)
  {
    $this->mdp = $mdp;
  }

  public function getStatut()
  {
    return $this->statut;
  }

  public function setStatut($statut)
  {
    $this->statut = $statut;
  }
}

 ?>
