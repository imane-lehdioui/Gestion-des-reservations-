
<?php

require_once('maSession.php');




//On a trois façons de faire appel à notre BD
//1)  include("connexiondb.php");//Fait copier-coller du code
//2)  require("connexiondb.php");//mm chose que 'include' mais elle ne va pas copier, elle va interpréter le code et copier son Rslt
require_once('connexiondb.php');//mm chose que 'require' mais elle cherche si on en a déjà une instance dans la mémoier.Si elle existe deja elle ne va pas la recopier
//§§§§§§§§§           Donc on prefere utiliser'require_once' c'est la meilleure!!      §§§§§§§§§§


$codePers=isset($_GET['nomP'])?$_GET['nomP']:"";
$IdNiveau=isset($_GET['IdNiveau'])?$_GET['IdNiveau']:"";

$size=isset($_GET['size'])?$_GET['size']:4;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;


if ($IdNiveau==""){
    
    $requete="select * from client where NomPrenom like '%$codePers%'  order by NomPrenom limit $size offset $offset";
    
    $requeteCount= "select count(*) countP from client where NomPrenom like '%$codePers%' order by NomPrenom";
    }
else{
    $requete="select * from client where NomPrenom like '%$codePers%'and IdNiveau='$IdNiveau'  order by NomPrenom limit $size offset $offset" ;
    
  
    
}


$resultatP=$pdo->query($requete); //Pour des requetes 'select' on utilise "query", pour des requtes 'de mise a jr/suppression' on utilise "execute"
$resultatCount=$pdo->query($requeteCount); 
$tabCount=$resultatCount->fetch();
$nbrePersonne=$tabCount['countP'];

$reste=$nbrePersonne % $size;   //Pour calculer le modulo
if($reste===0){
    $nbrPage= $nbrePersonne / $size;
}
else{
    $nbrPage= floor($nbrePersonne / $size)+1;     //floor: C'est pour la partie Entière
}
?>

<!DOCTYPE html>                    
<html>
<head>
	<meta charset="utf-8">
	<title>Etudiants</title>
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
          <form method="get" action="etudiant.php" class="form-inline">
              <div class="form-group">
              <input type="text" name="nomP" placeholder=" Tapez un nom " class="form-control" 
                       value="<?php echo $codePers ?>" />
              
             
              
              &nbsp;
             <button type="submit" class="btn btn-success"> 
                 <span class="glyphicon glyphicon-search "></span>  Rechercher</button>
              &nbsp; &nbsp; 
              
              
              <a href="nouvelEtudiant.php"><span class="glyphicon glyphicon-plus "></span>
                  Nouvel client 
              </a>
             
             </form>
        </div>
           </div>
       
        <div class="panel panel-primary"><!-- margetop du css-->
    <div class="panel-heading">Liste client  Total : <?php echo $nbrePersonne ?>&nbsp; client(s) </div>
         <div class="panel-body">
          <table class="table table-striped table-bordred">
                 <thead>
                <tr>
                    <th>Nom Prénom  </th><th> CIN </th><th> Date </th>  <th> salle </th>
                    <th>Actions</th>
                   
                </tr>
                 
            </thead>
                 <tbody>
<!--Pour afficher tous les niveaux on va utiliser dans le corps du tableu(<tbody>)une boucle while sur '$esultatP' de la requete pour affichage des personnes un par un-->  
            
           <?php  while($pers=$resultatP->fetch()) {?>
                <tr>
                  
                  <td> <?php echo $pers['NomPrenom'] ?></td>
                  <td> <?php echo $pers['CIN'] ?></td>
            
                  <td> <?php echo $pers['date'] ?></td>
             
                    <td> <?php echo $pers['Nomvoiture'] ?></td>
                  <td><a href="modifierEtudiant.php?IdP=<?php echo $pers['Id'] ?>">
                    <span class="glyphicon glyphicon-edit "></span>
                    </a>  
                      &nbsp;
                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')"
                       href="supprimerEtudiant.php?IdP=<?php echo $pers['Id'] ?>">  
                  <span class="glyphicon glyphicon-trash "></span>
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
                          <a href="etudiant.php?page=<?php echo $i;?>">
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