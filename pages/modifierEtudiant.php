<?php
require_once('maSession.php');
require_once('connexiondb.php');
$idP=isset($_GET['IdP'])?$_GET['IdP']:0;
$requete="select * from client where Id=$idP ";
$resultat=$pdo->query($requete);
$per=$resultat->fetch();

$nomP=$per['NomPrenom'];
$nomC=$per['CIN'];

$nomG=$per['date'];

$nomUN=$per['Nomvoiture'];


?>



<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier étudiant </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    
    
</head>
<body>
 <?php include("menu.php"); ?>
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
    <br />
    
      <div class="panel panel-info margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
    <div class="panel panel-info"><!-- margetop du css-->
    <div class="panel-heading">Modifier les Données</div>
         <div class="panel-body">
            
             


<form method="post" action="updateEtudiant.php" class="form">
              <div class="form-group">
            <label for="IdP"> Id Personne : <?php echo $idP ?> </label>
        <input type="hidden" name="IdP" placeholder="" class="form-control" value="<?php echo $idP ?>" />
                  <br />      
                  <label for="nomP"> Nom Prénom : </label>
        <input type="text" name="nomP" placeholder="Modifier Nom Prénom " class="form-control" value="<?php echo $nomP ?>" />
                  <br />
                  <label for="nomC"> CIN : </label>
        <input type="text" name="nomC" placeholder="Modifier CIN " class="form-control" value="<?php echo $nomC ?>" />
                  <br />
                  
                
                    <br />
                  <label for="nomG"> date  : </label>
                  <input type="text" name="nomG" placeholder="Modifier date " class="form-control" value="<?php echo $nomG ?>" />
    
            
                    <br />
                
               
            
            
        <label for="nomNU"> Salle : </label>
        <input type="text" name="nomNU" placeholder="Modifier salle " class="form-control" value="<?php echo $nomUN ?>"/>

            </div>
    <br />

<button type="submit" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-ok "></span> &nbsp; Enregistrer</button>&nbsp;&nbsp;&nbsp;
             
            
             <!--<button type="submit" class="btn btn-danger" onclick="bureaux.php"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>-->
              <form method="post" action="etudiant.php" class="form">
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