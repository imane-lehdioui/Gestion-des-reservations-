<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Page Blanche</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
 <?php include("menu.php"); ?>
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
    
    
      <div class="panel panel-info margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
    <div class="panel-heading">Rechercher Bureaux</div>
         <div class="panel-body">
          le contenu du panel
        </div>
           </div>
       
        <div class="panel panel-primary"><!-- margetop du css-->
    <div class="panel-heading">Liste Bureaux</div>
         <div class="panel-body">
          le tableau des bureaux (BD)
        </div>
          </div>
          
        
   
    </div>
</body>
</html>