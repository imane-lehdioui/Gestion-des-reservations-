<?php
session_start();
if(isset($_SESSION['user'])){

require_once('connexiondb.php');

$idU=isset($_GET['IdU'])?$_GET['IdU']:0;
$etat=isset($_GET['etat'])?$_GET['etat']:1;

if($etat==1)
   $NvlEtat=0;
else
    $NvlEtat=1;

$requete="update utilisateur set Etat=? where IdUser=?";


    
    $params=array($NvlEtat,$idU);

$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:utilisateurs.php');
}
else{
    header('location:login.php');
}

?>