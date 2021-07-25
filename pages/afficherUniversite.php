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
			<meta charset="utf-8" />

			<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
		
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>

       
       

<!--Pour afficher tous les bureaux on va utiliser dans le corps du tableu(<tbody>)une boucle while sur '$esultatB' de la requete pour affichage des bureaux un par un-->  
		<!-- Wrapper -->  <?php include("menu.php"); ?>
   <body class="is-preload">
   	   <div class="content_title content_ct"></div>
           <div class="content_title content_ct"></div>
        
	 <div class="content_title content_ct"></div>
			<div id="wrapper">

				<!-- Header -->
				

					<div id="main">
						<div class="inner">
							
			
							<!-- Fleet -->
							<section class="tiles">
									<!-- Main -->   <?php  while($universite=$resultatB->fetch()) {?> 
								<article class="style1">
									<span class="image">
										<img src="images/<?php echo $universite['image'] ?>" alt="" />
									</span>
									<a href="afficherplusUniversite.php?nomIU=<?php echo $universite['id'] ?>"" class="scrolly">
										<h2><?php echo $universite['nom'] ?></h2>
							

					
									</a>
								</article>
								
    <?php } ?>
						</div>
					</div>

				<!-- Footer -->
					
			</div>

	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>

</body>
</html>