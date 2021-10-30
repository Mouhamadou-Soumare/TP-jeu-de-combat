<?php

abstract class Personnage{

    private $id;
    private string $nom;
    private int $force;
    private int $degats;
    private int $pv;

    public function  __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value){
            $method='set'.ucfirst($key);

            if (is_callable($this,$method)){
                $this->$method($value);
            }
        }
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getForce(): int
    {
        return $this->force;
    }

    /**
     * @param int $force
     */
    public function setForce(int $force): void
    {
        $this->force = $force;
    }

    /**
     * @return int
     */
    public function getDegats(): int
    {
        return $this->degats;
    }

    /**
     * @param int $degats
     */
    public function setDegats(int $degats): void
    {
        $this->degats = $degats;
    }

    /**
     * @return int
     *  */
    public function getPv(): int
    {
        return $this->pv;
    }

    /**
     * @param int $pv
     */
    public function setPv(int $pv): void
    {
        $this->pv = $pv;
    }

    public function lancerAttaque(Personnage $persoAdverse){
        $newPv=$persoAdverse->getPv() - ($this->getForce());
        $persoAdverse->setPv($newPv);
    }

    public  function  recevoirAttaque(Personnage $persoAdverse){
        $this->setDegats($this->degats() + $this->getForce());
        if ($this->degats() >= $this->getPv()){
            $this->setPv(0);

    }
    }

}
