<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexiondb.php');

$idP=isset($_GET['IdP'])?$_GET['IdP']:0;

$requete="delete from client where Id=?";
$params=array($idP);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:etudiant.php');
/*
$requeteBureau="select count(*) countBur from personnel where CodeBureau='$idP'";
$resultatBureau=$pdo->query($requeteBureau);
$tabCountBureau=$resultatBureau->fetch();
$nbrBur=$tabCountBureau['countBur'];

if($nbrBur==0){

$requete="delete from personnel where IdPersonnel=?";
$params=array($idP);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:personnel.php');
}
else{
$msg="Vous ne pouver pas effectuer cette suppression! Veuillez d'abord supprimer tous les bureaux";
    
    header("location:alerte.php?message=$msg");
    
}*/
    
   }
else{
    header('location:login.php');
} 



?>