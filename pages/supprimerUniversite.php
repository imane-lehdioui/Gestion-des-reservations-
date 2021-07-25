<?php

session_start();
if(isset($_SESSION['user'])){



require_once('connexiondb.php');

$nomB=isset($_GET['nomIU'])?$_GET['nomIU']:"";


/*$requete="delete from personnel where CodeBureau='$nomB'";
$resultat->execute($params);
header('location:bureaux.php');*/
    
    

$requeteBureau="select count(*) countBur from client where Nomvoiture='$nomB'";
$resultatBureau=$pdo->query($requeteBureau);
$tabCountBureau=$resultatBureau->fetch();
$nbrBur=$tabCountBureau['countBur'];


if($nbrBur==0){

$requete="delete from voiture where id='$nomB'";
$params=array('$nomIU');
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:universites.php');
}
else{
$msg="Vous ne pouvez pas effectuer cette suppression! Veuillez d'abord supprimer tout les clients qui louent cette Salle !!";
    
    header("location:alerte.php?message=$msg");
}}
else{
    header('location:login.php');
}

?>