<?php
require_once('maSession.php');
    
require_once('connexiondb.php');

$requete="select * from voiture ";
$resultat=$pdo->query($requete);


?>




<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Nouvelle Université</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>

 <body>
<?php include("menu.php"); ?>
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
    <br />
        <br />
    
      <div class="panel panel-info margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
 
        <div class="panel panel-info"><!-- margetop du css-->
    <div class="panel-heading">Saisir les Données</div>
         <div class="panel-body">
<form action="insertUniversite.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
                  <label for="nomIU">Code salle : </label>
        <input type="text" name="nomIU" placeholder="Saisir un Code salle" class="form-control" />
                  <br />
                  
                  <label for="nomNUn">salle : </label>
        <input type="text" name="nomNUn" placeholder="salle" class="form-control" />
                  
              </div>
             
             <br />
             
             <div class="form-group">
                  <label for="nomDC">Date de Création : </label>
        <input type="text" name="nomDC" placeholder="année-mois-jours ( Respectez le format !!! )" 
               class="form-control" />
                  <br />

 
                 
                 <br />
                  <label for="nomA">Adresse : </label>
        <input type="text" name="nomA" placeholder="Saisir l'adresse" class="form-control" />
       
                   <label for="nomd">Description : </label>
        <input type="text" name="nomd" placeholder="Saisir la Description" class="form-control" />
         
        <label for="prix">prix : </label>
        <input type="text" name="prix" placeholder="Saisir le prix" class="form-control" />
                   
 <label for="nomd">choisir l'image: </label>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="enregistrer" name="submit"class="btn btn-primary">

           <a href="Universites.php" class="btn btn-success">

            <span class="glyphicon glyphicon-remove "></span>Annuler</a>
                </div>
</form>

</body>
</html>
