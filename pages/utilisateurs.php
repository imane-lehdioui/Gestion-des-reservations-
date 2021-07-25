<?php
require_once('maSession.php');
//On a trois façons de faire appel à notre BD
//1)  include("connexiondb.php");//Fait copier-coller du code
//2)  require("connexiondb.php");//mm chose que 'include' mais elle ne va pas copier, elle va interpréter le code et copier son Rslt
require_once('connexiondb.php');//mm chose que 'require' mais elle cherche si on en a déjà une instance dans la mémoier.Si elle existe deja elle ne va pas la recopier
//§§§§§§§§§           Donc on prefere utiliser'require_once' c'est la meilleure!!      §§§§§§§§§§


$login=isset($_GET['login'])?$_GET['login']:"";


$size=isset($_GET['size'])?$_GET['size']:4;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;


$requeteU="select * from utilisateur where Login like '%$login%'";
$requeteCount= "select count(*) countU from utilisateur"; 


$resultatU=$pdo->query($requeteU); //Pour des requetes 'select' on utilise "query", pour des requtes 'de mise a jr/suppression' on utilise "execute"
$resultatCount=$pdo->query($requeteCount); 
$tabCount=$resultatCount->fetch();
$nbreUtilisateurs=$tabCount['countU'];

$reste=$nbreUtilisateurs % $size;   //Pour calculer le modulo
if($reste===0){
    $nbrPage= $nbreUtilisateurs / $size;
}
else{
    $nbrPage= floor($nbreUtilisateurs / $size)+1;     //floor: C'est pour la partie Entière
}
?>

<!DOCTYPE html>                    
<html>
<head>
	<meta charset="utf-8">
	<title>Utilisateurs</title>
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
      <div class="panel panel-info margetop"><!-- Il s'agit de la classe margetop de la page monstyle.css                                                          qu'on a créée dans le dossier css-->
    <div class="panel-heading">Rechercher</div>
         <div class="panel-body">
          <form method="get" action="utilisateurs.php" class="form-inline">
              <div class="form-group">
                  
              <input type="text" name="login" placeholder="Tapez Login" class="form-control" 
                       value="<?php echo $login ?>" />
              </div>
              
    
             <button type="submit" class="btn btn-success"> 
                 <span class="glyphicon glyphicon-search "></span></button>
              &nbsp &nbsp; 
              
             
             </form>
        </div>
           </div>
       
        <div class="panel panel-primary"><!-- margetop du css-->
    <div class="panel-heading">Liste Utilisateurs  Total : <?php echo $nbreUtilisateurs ?>&nbsp; Utilisateur(s) </div>
         <div class="panel-body">
          <table class="table table-striped table-bordred">
                 <thead>
                <tr>
                    <th>Login  </th><th> Email </th><th> Role</th><th>  &nbsp; &nbsp;&nbsp;Actions </th>
                   
                </tr>
                 
            </thead>
                 <tbody>
<!--Pour afficher tous les bureaux on va utiliser dans le corps du tableu(<tbody>)une boucle while sur '$esultatP' de la requete pour affichage des personnes un par un-->  
            
           <?php  while($util=$resultatU->fetch()) {?>
                <tr class="<?php echo $util['Etat']==1?'success':'danger'  ?>">
                  
                  <td> <?php echo $util['Login'] ?></td>
                  <td> <?php echo $util['Email'] ?></td>
                  <td> <?php echo $util['Role'] ?></td>
                  
                  <!--<a href="modifierUser.php?IdU=<?php echo $util['IdUser'] ?>">
                    <span class="glyphicon glyphicon-edit "></span>
                    </a>-->  
                      
                   <td> 
                       <a href="modifierUser.php?IdU=<?php echo $util['IdUser'] ?>">
                    <span class="glyphicon glyphicon-edit "></span>
                    </a>  
                      &nbsp; &nbsp;&nbsp;&nbsp;
                       <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet Utilisateur ?')"
                       href="supprimerUser.php?IdU=<?php echo $util['IdUser'] ?>">  
                  <span class="glyphicon glyphicon-trash "></span>
                      </a>
                       &nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="activerUser.php?IdU=<?php echo $util['IdUser'] ?>&etat=<?php echo $util['Etat'] ?>">
                     <?php 
                         if ($util['Etat']==1)
                             echo '<span class="glyphicon glyphicon-ok "></span>';
                                                    
                         else{
                             echo '<span class="glyphicon glyphicon-remove "></span>';
                             
                         }
                      ?> 
                      
                      </a> 
                  </td>    
                </tr>
            <?php }
                   ?>
                 
                 </tbody>
             
             
             </table>
             <div>
                 <ul class="pagination pagination-small">
               <?php for($i=1;$i<=$nbrPage;$i++)   {?>  
            <li class="<?php if($i==$page) echo 'active' ?>"> 
                          <a href="utilisateurs.php?page=<?php echo $i;?>">
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