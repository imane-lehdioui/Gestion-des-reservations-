<?php

require_once('maSession.php');

require_once('connexiondb.php');

$nomIU=isset($_POST['nomIU'])?$_POST['nomIU']:"";
$nomNUn=isset($_POST['nomNUn'])?$_POST['nomNUn']:"";
$nomDC=isset($_POST['nomDC'])?$_POST['nomDC']:"";

$nomD=isset($_POST['nomd'])?$_POST['nomd']:"";

$nomA=isset($_POST['nomA'])?$_POST['nomA']:"";
$nomImg=isset($_POST['nomi'])?$_POST['nomi']:"";
$prix=isset($_POST['prix'])?$_POST['prix']:"";


$requete="update voiture set id=?,nom=?,Date_Creation=?,description=?,Adresse=?,prix=? ,image=?where id='$nomIU'";
    
    $params=array($nomIU,$nomNUn,$nomDC,$nomD,$nomA,$prix,$nomImg);

$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:universites.php');


?>

