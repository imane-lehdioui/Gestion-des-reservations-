<?php

/* Pour que l'application ne se plante pas au moment de la cnx à la BD, il est recommandé de gérer les exceptions avec le fameux "try/catch"
*/
  try {
$pdo=new PDO ("mysql:host=localhost;dbname=Pfa","root","");  
    //PDO c'est pour la Connexion à la base de donnée quelque soit son type!!
}
   catch(Exception $e) {
           die('Erreur de connexion :'.$e->getMessage());
        }


?>