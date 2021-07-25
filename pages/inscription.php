<?php
    



require_once('connexiondb.php');


$requete="select * from utilisateur";
$resultat=$pdo->query($requete);






    
?>



<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
 
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
    <br />
    
      <div class="panel panel-info margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
    <div class="panel panel-info"><!-- margetop du css-->
    <div class="panel-heading">Inscription</div>
         <div class="panel-body">

<form method="post" action="insertUser.php" class="form">
              
                  
    <div class="form-group">
                  <label for="nomLog"> Login : </label>
        <input type="text" name="nomLog" placeholder="Inserer login" class="form-control"  />
        </div>
                  
                  
            <div class="form-group">
      <label for="nomE"> Email : </label>
        <input type="text" name="nomE" placeholder="Inserer Email " class="form-control"  />
                </div>
                  
    <div class="form-group">
      
        <input type="hidden" name="nomR" placeholder="Inserer Email " class="form-control" value="<?php echo "USER"?>"  />
                </div>
    <div class="form-group">
      
        <input type="hidden" name="nomEt" placeholder="Inserer Email " class="form-control" value="<?php echo 0?>"  />
                </div>
    
    
     <div class="form-group">
      <label for="nomMP"> Mot de Passe : </label>
        <input type="password" name="nomMP" placeholder="Inserer Mot de Passe " class="form-control"  />
                </div>
    <div class="form-group">
     <!-- <label for="nomCMP"> Confirmer Mot de Passe : </label>
        <input type="password" name="nomCMP" placeholder="Retapez votre Mot de Passe " class="form-control"  />
                </div>-->
        
     
<br />
    <br />
<button type="submit" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-ok "></span> &nbsp; Enregistrer</button>
             
            
             <!--<button type="submit" class="btn btn-danger" onclick="bureaux.php"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>-->
              </div> 
             
             </form>
             
              <br />
             <form method="post" action="utilisateurs.php" class="form">
                 <button type="submit" class="btn btn-secondary"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>
                 </form>
          
        
        
  
        </div>
        </div>
   </div>
    </div>
</body>
</html>