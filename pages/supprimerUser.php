<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexiondb.php');

$idU=isset($_GET['IdU'])?$_GET['IdU']:0;

$requete="delete from utilisateur where IdUser=?";
$params=array($idU);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:utilisateurs.php');
    }
else{
    header('location:login.php');
}

?>