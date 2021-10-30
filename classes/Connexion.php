<?php

abstract class Connexion{
    public function bdd()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=bd_tp', 'root', 'root');
            return $bdd;
        } catch (Exception $e) {
            die('Erreur, impossible de se connecter a la base de données: ' . $e->getMessage());
        }

        $test="SHOW TABLES from personnages";
    }
}

