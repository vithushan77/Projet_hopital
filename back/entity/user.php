<?php

class user {

  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $mdp;
  private $role;

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

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
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

  public function getRole()
  {
    return $this->role;
  }

  public function setRole($role)
  {
    $this->role = $role;
  }
}

 ?>
