<?php
require_once('maSession.php');
$message=isset($_GET['message'])?$_GET['message']:"Erreur !!";

?>



<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Alerte</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
 <?php include("menu.php"); ?>
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
     <br />
        <br />
         <br />
    
      <div class="panel panel-danger margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
    <div class="panel-heading"><h4>Erreur !!</h4></div>
         <div class="panel-body">
          <h3> <?php echo $message ?></h3>
            <h4> <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour >>>></a></h4>
        </div>
           </div>
       
        
          
        
   
    </div>
</body>
</html>