?php
require_once('maSession.php');
?>

<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Code à Barres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
 <?php include("menu.php"); ?>
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
     <br />
    
      <br /><br /><br /><br /><br />
       
        <div class="panel panel-primary"><!-- margetop du css-->
    <div class="panel-heading"></div>
         <div class="panel-body">
          <label for="nomFa">Num Inventaire : </label>
  <input type="text" name="nomFa" placeholder="Saisir Numéro Inventaire" class="form-control"  />
                 
                  <br />
             
             
             <button type="submit" class="btn btn-success"> 
            <span class="glyphicon glyphicon-barcode "></span> &nbsp; Générer</button>
             
             
             <br /><br />
             <form method="post" action="immobilisations.php" class="form">
                 <button type="submit" class="btn btn-secondary"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>
                 </form>
        </div>
          </div>
          
        
   
    </div>
</body>
</html>