<?php

class Magicien extends Personnage{

    private int $magie;

    

    public function lancerAttaque($perso)
    {
        $perso->prendDegat($this->magie);
    }

}