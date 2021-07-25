<?php
require_once('maSession.php');
require_once('connexiondb.php');

$nomLog=isset($_POST['nomLog'])?$_POST['nomLog']:"";
$nomE=isset($_POST['nomE'])?$_POST['nomE']:"";
$nomR=isset($_POST['nomR'])?$_POST['nomR']:"";
$nomEt=isset($_POST['nomEt'])?$_POST['nomEt']:0;
$nomMP=isset($_POST['nomMP'])?$_POST['nomMP']:"";



$requete="insert into utilisateur (Login,Email,Role,Etat,Passwd) values (?,?,?,?,?) ";

    
    $params=array($nomLog,$nomE,$nomR,$nomEt,MD5('$nomMP'));

$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:utilisateurs.php');


?>