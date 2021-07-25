<?php
require_once('maSession.php');
//On a trois façons de faire appel à notre BD
//1)  include("connexiondb.php");//Fait copier-coller du code
//2)  require("connexiondb.php");//mm chose que 'include' mais elle ne va pas copier, elle va interpréter le code et copier son Rslt
require_once('connexiondb.php');//mm chose que 'require' mais elle cherche si on en a déjà une instance dans la mémoier.Si elle existe deja elle ne va pas la recopier
//§§§§§§§§§           Donc on prefere utiliser'require_once' c'est la meilleure!!      §§§§§§§§§§
//$requete= "select * from Bureau";


$codeBureau=isset($_GET['nomIU'])?$_GET['nomIU']:"";
$Etage=isset($_GET['nomNUn'])?$_GET['nomNUn']:"";

$size=isset($_GET['size'])?$_GET['size']:4;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

$requete="select * from voiture where nom like '%$Etage%'";
$requeteCount= "select count(*) countB from voiture"; 

$resultatB=$pdo->query($requete); //Pour des requetes 'select' on utilise "query", pour des requtes 'de mise a jr/suppression' on utilise "execute"
//$nomBureau=$_GET [''];
$resultatCount=$pdo->query($requeteCount);
$tabCount=$resultatCount->fetch();
$nbreBureau=$tabCount['countB'];
$reste=$nbreBureau % $size;   //Pour calculer le modulo
if($reste===0){
    $nbrPage= $nbreBureau / $size;
}
else{
    $nbrPage= floor($nbreBureau / $size)+1;     //floor: C'est pour la partie Entière
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Salles</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
 <?php include("menu.php"); ?>
    <div class="container">   <!-- pour centraliser le contenu de la page au milieu-->
     <br />
        <br />
        <br />
        <br />
    
      <div class="panel panel-info margetop60"><!-- margetop du css-->
    <div class="panel-heading">Rechercher salle</div>
         <div class="panel-body">
          <form method="get" action="universites.php" class="form-inline">
              <div class="form-group">
              <input type="text" name="nomNUn" placeholder="  Saisir salle  " class="form-control" 
                     value="<?php echo $Etage ?>" />
              </div>
              
              &nbsp;
             <button type="submit" class="btn btn-success"> 
                 <span class="glyphicon glyphicon-search "></span>  Rechercher</button>
              &nbsp; &nbsp; 
              
              <?php if ($_SESSION['user']['Role']=='ADMIN') {?>
              <a href="nouvelleUniversite.php"><span class="glyphicon glyphicon-plus "></span>
                  Nouvelle salle </a>
             <?php } ?>
             </form>
        </div>
           </div>
       
        <div class="panel panel-primary"><!-- margetop du css-->
    <div class="panel-heading">Liste des Salles &nbsp;&nbsp; Total : <?php echo $nbreBureau ?>&nbsp;salle(s) </div>
         <div class="panel-body">
          <!-- On va récuperer le Rslt de la requete dans un tableau associatif-->
             <table class="table table-striped table-bordred">
                 <thead>
                <tr>
                    <th> Code salle </th><th> salle </th><th>  Date création </th><th>  description </th>
                    <th> Adresse </th><th>   PRIX </th><th>   image </th>
                    <?php if ($_SESSION['user']['Role']=='ADMIN') {?> 

                    <th> Actions </th>
                    <?php } ?>
                   
                </tr>
                 
            </thead>
                 <tbody>

<!--Pour afficher tous les bureaux on va utiliser dans le corps du tableu(<tbody>)une boucle while sur '$esultatB' de la requete pour affichage des bureaux un par un-->  
                    
            <?php  while($universite=$resultatB->fetch()) {?> 

                <tr>
                  <td> <?php echo $universite['id'] ?></td>
                  <td> <?php echo $universite['nom'] ?></td>
                  <td> <?php echo $universite['Date_Creation'] ?></td>
              
                    <td> <?php echo $universite['description'] ?></td>
            
                    <td> <?php echo $universite['Adresse'] ?></td>
                    <td> <?php echo $universite['prix'] ?></td>
                     <td> <img src="images/<?php echo $universite['image'] ?>" width="50"></td>
                    <?php if ($_SESSION['user']['Role']=='ADMIN') {?> 
                    
                  <td><a href="modifierUniversite.php?nomIU=<?php echo $universite['id'] ?>">
                    <span class="glyphicon glyphicon-edit "></span>
                    </a>  
                      &nbsp;
                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?')"
                       href="supprimerUniversite.php?nomIU=<?php echo $universite['id'] ?>">  
                  <span class="glyphicon glyphicon-trash "></span>
                      </a>    
                  </td>  
                    <?php } ?>
                </tr>
         <?php }
                   ?>
                   
                 
                 </tbody>
             
             
             </table>
             <div>
                 <ul class="pagination pagination-small">
               <?php for($i=1;$i<=$nbrPage;$i++)   {?>  
            <li class="<?php if($i==$page) echo 'active' ?>"> 
                          <a href="universites.php?page=<?php echo $i;?>">
                         <?php echo $i;?>
                           </a>
            </li>
             
                 <?php } ?>
             </ul>
             </div>
           
             
        
        </div>
          </div>
          
         
   
    </div>


</body>
</html>