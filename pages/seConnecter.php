<?php

session_start(); //pour creer une sesson sinn la varibale $_SESSION globale sera normale!!!!
require_once('connexiondb.php');

$login=isset($_POST['login'])?$_POST['login']:"";
$pwd=isset($_POST['pwd'])?$_POST['pwd']:"";



$requete="select IdUser,Login,Email,Role,Etat from utilisateur where Login='$login' and Passwd=MD5('$pwd')";

$resultat=$pdo->query($requete);

if($user=$resultat->fetch()){
    if($user['Etat']==1){
        $_SESSION['user']=$user;
        header('location:afficherUniversite.php');
    }
    else {
        $_SESSION['erreurCnx']=" Erreur de connexion ! Votre compte est désactivé pour le moment.<br>Veuillez contacter votre Administrateur!";
        header('location:login.php');    
       
       
    }
}
else {
    $_SESSION['erreurCnx']=" Erreur de connexion !  Login ou Mot de passe erroné(s)";
    header('location:login.php'); 
        
    }
    




?>
