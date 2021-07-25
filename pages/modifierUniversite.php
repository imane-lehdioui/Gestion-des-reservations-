<?php
require_once('maSession.php');
require_once('connexiondb.php');

$codeB=isset($_GET['nomIU'])?$_GET['nomIU']:0;
$requete="select * from voiture where id='$codeB' ";

//IdUniversite,IntituleUniversite,Date_Creation,Fondateur,Filieres,Adresse) values (?,?,?,?,?,?) ";
                //$nomIU,$nomNUn,$nomDC,$nomF,$nomFil,$nomA

$resultat=$pdo->query($requete);
$bur=$resultat->fetch();

$Etage=$bur['nom'];
$inti=$bur['Date_Creation'];

$adr=$bur['Adresse'];

$desc=$bur['description'];
$img=$bur['image'];
$prix=$bur['prix'];
?>




<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
  <meta charset="utf-8">
  <title>Modifier Salle</title>
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
    <div class="panel-heading">Modifier les Données</div>
         <div class="panel-body">
             
         <form method="post" action="updateUniversite.php" class="form">
              <div class="form-group">
         
                  <label for="nomIU">Code Salle : <?php echo $codeB?> </label>
        <input type="hidden" name="nomIU" placeholder="Saisir un Code Salle" class="form-control" 
               value="<?php echo $codeB ?>"  />
                  <br />
                  
                  
                  <label for="nomNUn">Salle : </label>
  <input type="text" name="nomNUn" placeholder="Saisir nom salle" class="form-control"value="<?php echo $Etage ?>"  />
                  <br />
                  
                  <label for="nomDC">Date création : </label>
  <input type="text" name="nomDC" placeholder="Saisir nom salle" class="form-control"value="<?php echo $inti ?>"  />
                  <br />
                  
                  
                  
                  
                 <label for="nomA">Adresse : </label>
        <input type="text" name="nomA" placeholder="Saisir l'adresse" class="form-control" value="<?php echo $adr ?>"  />
               <br />
                   <label for="nomA">Description : </label>
        <input type="text" name="nomd" placeholder="Saisir la description" class="form-control" value="<?php echo $desc ?>"  />
               <br />
               <label for="prix">prix : </label>
        <input type="text" name="prix" placeholder="Saisir l'adresse" class="form-control" value="<?php echo $prix ?>"  />
               <br />
              <label for="nomA">Image : </label>
        <input type="text" name="nomi" placeholder="Saisir l'image" class="form-control" value="<?php echo $img ?>"  />      
                 
                 
                 
                 
              </div>
             
              <button type="submit" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-ok "></span> &nbsp; Enregistrer</button>&nbsp;&nbsp;&nbsp;
             
            
             <!--<button type="submit" class="btn btn-danger" onclick="bureaux.php"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>-->
               <a href="universites.php" class="btn btn-success"><span class="glyphicon glyphicon-remove "></span> Annuler</button></a>
            
                 </form>
             
             </form>
             
              <br />
             
        </div>
          </div>
          
        </div>
   
    </div>
</body>
</html>