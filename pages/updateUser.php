<?php

require_once('maSession.php');

require_once('connexiondb.php');

$idU=isset($_POST['IdU'])?$_POST['IdU']:0;
$login=isset($_POST['login'])?$_POST['login']:"";
$email=isset($_POST['email'])?$_POST['email']:"";
$role=isset($_POST['role'])?$_POST['role']:"";



$requete="update utilisateur set Login=?,Email=?,Role=? where 
IdUser=?";

    
    $params=array($login,$email,$role,$idU);

$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:afficheruniversite.php');


?>