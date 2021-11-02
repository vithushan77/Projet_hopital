<?php

class specialites {

  private $id;
  private $nomSpe;

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

  public function getNomSpe()
  {
      return $this->nomSpe;
  }

  public function setNomSpe($nomSpe)
  {
      $this->nomSpe = $nomSpe;
  }

}

 ?>
