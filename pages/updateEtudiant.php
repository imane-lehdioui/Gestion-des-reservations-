<?php


require_once('maSession.php');

require_once('connexiondb.php');

$idP=isset($_POST['IdP'])?$_POST['IdP']:0;
$nomP=isset($_POST['nomP'])?$_POST['nomP']:"";
$nomC=isset($_POST['nomC'])?$_POST['nomC']:"";

$nomG=isset($_POST['nomG'])?$_POST['nomG']:"";

$nomNU=isset($_POST['nomNU'])?$_POST['nomNU']:"";



$requete="update client set NomPrenom=?,CIN=?,date=?,Nomvoiture=? where 
Id=?";

    
    $params=array($nomP,$nomC,$nomG,$nomNU,$idP);

$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:etudiant.php');


?>
