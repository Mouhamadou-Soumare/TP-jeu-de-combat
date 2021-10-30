<?php
class PersonnageManager{
    private $bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }
    public function setBdd(PDO $bdd){
        $this->bdd= $bdd;
    }
    public function addPerso(){
        $prep=$this->bdd->prepare('INSERT INTO PersonnagesTable 
                                    SET nom = :nom,
                                        force = :force,
                                        degats = :degats');
        $prep->bindValue(':nom',$_GET['nom'],PDO::PARAM_STR);
        $prep->bindValue(':force',$_GET['force'],PDO::PARAM_INT);
        $prep->bindValue(':degats',$_GET['degats'],PDO::PARAM_INT);

        $prep->execute();
    }

    public function deletePerso(Personnage $personnage){
        $this->bdd->exec('DELETE FROM personnages WHERE id ='. $personnage->getId());
    }
    public function getPerso($id){
        $q=$this->bdd->query('SELECT id,nom,force,degats,pv
                              FROM personnages WHERE id='.$id);


    }

    public function getAllPerso(PDO $bdd){
        $req= $bdd->query('SELECT * FROM personnages');
        $req->SetFecthMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Perso');
        $persos=$req-> fetchAll();
    }
}