<?php

class hopitaux {

  private $id;
  private $nomHopitaux;
  private $adresse;
  private $telephone;

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

public function getNomHopitaux()
{
  return $this->nomHopitaux;
}

public function setNomHopitaux($nomHopitaux)
{
  $this->nomHopitaux = $nomHopitaux;
}

public function getAdresse()
{
  return $this->adresse;
}

public function setAdresse($adresse)
{
  $this->adresse = $adresse;
}

public function getTelephone()
{
  return $this->telephone;
}

public function setTelephone($telephone)
{
  $this->telephone = $telephone;
}

}

 ?>
