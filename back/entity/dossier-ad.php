<?php

class dossier {

  private $id;
  private $id_patient;
  private $date_naissance;
  private $adresse_post;
  private $mutuelle;
  private $num_ss;
  private $optn;
  private $regime;

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

  public function getId_patient()
  {
    return $this->id_patient;
  }

  public function setId_patient($id_patient)
  {
    $this->id_patient = $id_patient;
  }

  public function getDate_naissance()
  {
    return $this->date_naissance;
  }

  public function setDate_naissance($sexe)
  {
    $this->date_naissance = $date_naissance;
  }

  public function getAdresse_post()
  {
    return $this->adresse_post;
  }

  public function setAdresse_post($adresse_post)
  {
    $this->adresse_post = $adresse_post;
  }

  public function getMutuelle()
  {
    return $this->mutuelle;
  }

  public function setMutuelle($mutuelle)
  {
    $this->mutuelle = $mutuelle;
  }

  public function getNum_ss()
  {
    return $this->num_ss;
  }

  public function setNum_ss($num_ss)
  {
    $this->num_ss = $num_ss;
  }

  public function getOptn()
  {
    return $this->optn;
  }

  public function setOptn($optn)
  {
    $this->optn = $optn;
  }

  public function getRegime()
  {
    return $this->regime;
  }

  public function setRegime($regime)
  {
    $this->regime = $regime;
  }

}
