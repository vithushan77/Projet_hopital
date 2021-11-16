<?php

class urgences
{
    private $id;
    private $id_patient;
    private $symptomes;
    private $priorite;
    private $affectionCabinet;
    private $passageHopital;
    private $id_hopital;

    /**
     * constructeur de la classe urgences.
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

    /**
     * @return mixed
     */
    public function getIdPatient()
    {
        return $this->id_patient;
    }

    /**
     * @param mixed $id_patient
     */
    public function setIdPatient($id_patient)
    {
        $this->id_patient = $id_patient;
    }

    /**
     * @return mixed
     */
    public function getSymptomes()
    {
        return $this->symptomes;
    }

    /**
     * @param mixed $symptomes
     */
    public function setSymptomes($symptomes)
    {
        $this->symptomes = $symptomes;
    }

    /**
     * @return mixed
     */
    public function getPriorite()
    {
        return $this->priorite;
    }

    /**
     * @param mixed $priorite
     */
    public function setPriorite($priorite)
    {
        $this->priorite = $priorite;
    }

    /**
     * @return mixed
     */
    public function getAffectionCabinet()
    {
        return $this->affectionCabinet;
    }

    /**
     * @param mixed $affectionCabinet
     */
    public function setAffectionCabinet($affectionCabinet)
    {
        $this->affectionCabinet = $affectionCabinet;
    }

    /**
     * @return mixed
     */
    public function getPassageHopital()
    {
        return $this->passageHopital;
    }

    /**
     * @param mixed $passageHopital
     */
    public function setPassageHopital($passageHopital)
    {
        $this->passageHopital = $passageHopital;
    }

    /**
     * @return mixed
     */
    public function getIdHopital()
    {
        return $this->id_hopital;
    }

    /**
     * @param mixed $id_hopital
     */
    public function setIdHopital($id_hopital)
    {
        $this->id_hopital = $id_hopital;
    }
}