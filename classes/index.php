<?php

function chargerClasse($class){
    require $class.'.class.php';
}

spl_autoload_register('chargerClasse');
session_start();

$bdd=new PDO( 'mysql:host = localhost ; dbname = bd_tp ', 'root ', 'root');

$manager=new PersonnageManager($bdd);

if (isset($_POST['creer']){

    $personnage=new Personnage(array('nom'=>$_POST['nom']));
    $manager->addPerso();
}
}
?>