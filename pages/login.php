<?php

session_start();
if(isset($_SESSION['erreurCnx']))
    $erreurLogin=$_SESSION['erreurCnx'];
else{
    
    $erreurLogin="";
}

session_destroy();

?>


<!DOCTYPE html>                    <!-- C'est une page pour ne pas répéter le code à chaque fois!!-->
<html>
<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Se Connecter</h3>
             
            </div>
            <form action="seConnecter.php" method="post">
                  <?php if(!empty($erreurLogin))       {  ?>
    
    <div  class="alert alert-danger" >
            <?php echo $erreurLogin   ?>
        </div>
    <?php }?>
              <div class="form-group first">
              
                <input placeholder="Login"  type="text" class="form-control"  name="login" >

              </div>
              <div class="form-group last mb-4">
               
                <input  placeholder="password" type="password" class="form-control" name="pwd">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Se Rappeler de moi</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto">   <h5><a  href="nouvelUtilisateur.php" class="forgot-pass">S'inscrire</a></h5></span> 
              </div>

              <input type="submit" value="Se Connecter" class="btn btn-block btn-primary">

              
              
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>