<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
$img=$bur['image'];
$des=$bur['description'];
$prix=$bur['prix'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blue Spark Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2050 Blue Spark
http://www.tooplate.com/view/2050-blue-spark
-->
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<!-- Arquivos utilizados pelo jQuery lightBox plugin -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
<!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/jquery.scrollTo-min.js'></script>
<script type='text/javascript' src='js/jquery.localscroll-min.js'></script>
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script> 
<!-- Ativando o jQuery lightBox plugin -->

</head>
<body>

 
<span id="top"></span>
<div id="tooplate_body_wrapper">
<div id="tooplate_wrapper">
        <div id="site_title">
          <?php include("menu.php"); ?>
      
    
  <div id="">
    
    <div id="home" class=""></div>
      <div class="">
            <div class="content_title content_ct"></div>
                 <div class="content_title content_ct"></div>
                     <div class="content_title content_ct"></div>
                  
            <div class="content">   
                 
              <div class="image_wrapper image_fl"><img src="images/<?php echo $img ?>"width="300" alt="" /><span></span></div>
           
               <h2><strong><span class="orange">


 <?php echo $Etage ?> </span></strong></h2>
             
          <div class="cleaner h30"></div>
                <div class="col_w340 float_l">
                  
                    <ul class="">
                        <li><strong><span class="green">Créée en:</span></strong><?php echo $inti ?></li>
                       <li><strong><span class="green">Adresse:</span></strong><?php echo $adr ?></li>
                        <li><strong><span class="green">prix:</span></strong><?php echo $prix ?></li>

                    </ul>
                </div>
            


                <li><a href="nouvelEtudiant.php">louer la salle</a></li>
                

            </div>
            
      
</div> <!-- end of warpper -->
</div> <!-- end of body wrapper -->

</body>
</html>