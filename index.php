
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de résérvation des salles</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

</head>
<?php
require_once('pages/connexiondb.php');//mm chose que 'require' mais elle cherche si on en a déjà une instance dans la mémoier.Si elle existe deja elle ne va pas la recopier
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
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">Résérvation<span> salle 
</span></a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Acceuil</a></li>
                <li><a href="#about" class="menu-btn">A propos</a></li>
                <li><a href="#services" class="menu-btn">Services</a></li>
                <li><a href="#skills" class="menu-btn">Salles</a></li>
                <li><a href="pages/login.php" class="menu-btn">Connexion</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                 <div class="text-1">Bienvenue, dans le système de </div>
                <div class="text-2">Résérvation des salles </div>
                <div class="text-3"> de <span class="typing"></span></div>
                <div class="form">
                <form name="form" method="post" action="" href="#skills">
                    <input class="mt" type="text" name="mot" placeholder="Rechercher par type ">
        <input class="bt" type="submit" name="submit" value="Rechercher" href="#skills">
                </form>
                </div>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">A propos de nous</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/reunion4.jpg" alt="">
                </div>
                <div class="column right">
                    <div class="text">LOUEZ UNE SALLE de <span class="typing-2"></span></div>
                    <p>Utilisez nos salles de réunion pour des présentations, des entretiens, des rencontres de clients ou des formations pour votre entreprise. Nous proposons également à la location tout un éventail d'espaces de réunion, telles que salles de conférence et de conseil. Restauration, service café, équipement de projection et d'autres services sont disponibles pour veiller à ce que vous disposiez de tout le nécessaire pour votre réunion. Commencez à travailler dès votre arrivée.
</p>
                    <a href="pages/login.php">Réserver</a>
                </div>
            </div>
        </div>
    </section>

    <!-- services section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="text" style="   
    position: relative;
    text-align: center;
    font-size: 40px;
    font-weight: 500;
    margin-bottom: 60px;
    padding-bottom: 20px;
">Nos services</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <div class="text">Salle de réunion</div>
                        <p></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <div class="text">Salle de conférence</div>
                        <p></p>
                    </div>
                </div>
                 </div>
            </div>
        </div>
    </section>

    <!-- skills section start -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="text" style="   
    position: relative;
    text-align: center;
    font-size: 40px;
    font-weight: 500;
    margin-bottom: 60px;
    padding-bottom: 20px;
">Nos salles</h2>

        <div class="skills-content">
                <div class="carousel owl-carousel">
 <?php  while($universite=$resultatB->fetch()) {?> 
                          <div class="card">
                    <div class="box">
                                        <img style="   height: 300px;
    width: 400px;
    object-fit: cover;
    border-radius: 6px;
" src="images/<?php echo $universite['image'] ?>" alt="" />

<a style=" color: #8b008b" href="pages/afficherplusUniversite.php?nomIU=<?php echo $universite['id'] ?>" class="scrolly">
                                        <h2><?php echo $universite['nom'] ?></h2>
                            
</div>
 </div>
      <?php } ?>                                      
</div>
 </div>
                    
                                    </a>
                                </article>
                                
 



 </div>

                    <a href="index.php">Rechercher en particulier</a>                
            </div>
        </div>
    </section>

  
    <!-- footer section start -->
    <footer>
        <span>Created By <a href="https://www.codingnepalweb.com">Salimi hajar</a> | <span class="far fa-copyright"></span> 2021 All rights reserved.</span>
    </footer>

    <script src="script.js"></script>
</body>
</html>