<?php
require_once('maSession.php');
require_once('connexiondb.php');

$nomP=isset($_POST['nomP'])?$_POST['nomP']:"";

$nomC=isset($_POST['nomC'])?$_POST['nomC']:"";

$nomG=isset($_POST['nomG'])?$_POST['nomG']:"";

$nomNU=isset($_POST['nomNU'])?$_POST['nomNU']:"";


$requete="insert into client (NomPrenom,CIN,date,Nomvoiture) values (?,?,?,?) ";


    
    $params=array($nomP,$nomC,$nomG,$nomNU);

$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:afficherUniversite.php');


?>