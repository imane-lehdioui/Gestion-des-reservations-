<?php
require_once('maSession.php');
require_once('connexiondb.php');


$requete="select * from client ";

$resultat=$pdo->query($requete);
    
?>




<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Nouvel client</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
 <?php include("menu.php"); ?>
     <br /> <br /> <br />
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
    <br />
    
      <div class="panel panel-info margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
    <div class="panel panel-info"><!-- margetop du css-->
    <div class="panel-heading">Saisir les Données</div>
         <div class="panel-body">

<form method="post" action="insertEtudiant.php" class="form" >
              <div class="form-group">
                  <label for="nomP"> Nom Prénom : </label>
        <input type="text" name="nomP" placeholder="Saisir Nom Prénom " class="form-control" />
                  <br />
                  
                  <label for="nomC"> CIN : </label>
        <input type="text" name="nomC" placeholder="Saisir CIN " class="form-control" />
                  <br />

                    <br />           
                  
                      <label for="nomG">date  : </label>
                      <input type="date" name="nomG" placeholder="Saisir CIN " class="form-control" />
                    <br />
             
   
           
            
               
        <label for="nomNU"> Nom salle : </label>
      <div class="form-group">
      <select class="form-control" name="nomNU">
              <?php

         $stmt = $pdo->query("SELECT * FROM voiture");


              while ($row = $stmt->fetch()) 

              {?>
                  <option ><?php echo $row["id"];?></option>
              <?php 
              }
              ?>
          </select>
<button type="submit" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-ok "></span> &nbsp; Enregistrer</button>
             
            
             <!--<button type="submit" class="btn btn-danger" onclick="bureaux.php"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>-->
              &nbsp;&nbsp;&nbsp;
             <form method="post" action="afficherUniversite.php" class="form">
                 <button type="submit" class="btn btn-success"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>
                 </form>
              
             </form>
             
              <br />
             
        
        
    
        
        </div>
        </div>
   </div>
    </div>
</body>
</html>