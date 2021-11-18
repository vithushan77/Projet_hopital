<?php

class medecin {

  private $id;
  private $id_user;
  private $id_specialite;
  private $telephone;
  private $ville;

  /**
 * constructeur de la classe medecin.
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

public function getId_user()
{
  return $this->id_user;
}

public function setId_user($id_user)
{
  $this->id_user = $id_user;
}

public function getId_specialite()
{
  return $this->id_specialite;
}

public function setId_specialite($id_specialite)
{
  $this->id_specialite = $id_specialite;
}

public function getTelephone()
{
  return $this->telephone;
}

public function setTelephone($telephone)
{
  $this->telephone = $telephone;
}

public function getVille()
{
  return $this->ville;
}

public function setVille($ville)
{
  $this->ville = $ville;
}

}


 ?>
