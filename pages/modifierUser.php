<?php
    

require_once('maSession.php');

require_once('connexiondb.php');

$idU=isset($_GET['IdU'])?$_GET['IdU']:0;
$requete="select * from utilisateur where IdUser=$idU";
$resultat=$pdo->query($requete);

$User=$resultat->fetch();

$login=$User['Login'];
$email=$User['Email'];
$role=$User['Role'];


    
?>



<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier Utilisateur</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
 
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
    <br />
    
      <div class="panel panel-info margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
    <div class="panel panel-info"><!-- margetop du css-->
    <div class="panel-heading">Modifier les Données</div>
         <div class="panel-body">

<form method="post" action="updateUser.php" class="form">
    <?php if ($_SESSION['user']['Role']=='ADMIN') {?>
              <div class="form-group">
            <label for="IdU"> Id User : <?php echo $idU ?> </label>
        <input type="hidden" name="IdU" placeholder="Modifier Login " class="form-control" value="<?php echo $idU ?>" />
              </div>   <?php } ?> 
                  
    <div class="form-group">
                  <label for="login"> Login : </label>
        <input type="text" name="login" placeholder="Modifier login" class="form-control" value="<?php echo $login ?>" />
        </div>
                  
                  
            <div class="form-group">
      <label for="email"> Email : </label>
        <input type="text" name="email" placeholder="Modifier Email " class="form-control" value="<?php echo $email ?>" />
                </div>
                  
    <div class="form-group">
        <?php if ($_SESSION['user']['Role']=='ADMIN') {?>
        <label for="role"> Role : </label>
        <select name="role" class="form-control" id="role">
      
    <option value="ADMIN" <?php if($role=="ADMIN") echo "selected"?>>ADMIN</option> 
    <option value="USER" <?php if($role=="USER") echo "selected"?>>USER</option>
         </select>
                           
        

            </div>
    <?php } ?> 
     
        <a href="modifierPswd.php?IdU=<?php echo $idU ?>"><u>Changer mot de passe</u> </a>
   <br />
    
<br />
    <br />
    
<button type="submit" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-ok "></span> &nbsp; Enregistrer</button>  &nbsp;  &nbsp;  &nbsp;
             
     
             <!--<button type="submit" class="btn btn-danger" onclick="bureaux.php"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>-->
              
             
             </form>
                   <form method="post" action="afficheruniversite.php" class="form">
                 <button type="submit" class="btn btn-success"> 
            <span class="glyphicon glyphicon-remove "></span> Annuler</button>
                 </form>
              <br />
             
          
        
        
    
        
        </div>
        </div>
   </div>
    </div>
</body>
</html>