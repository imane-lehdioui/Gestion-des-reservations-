<?php
require_once('maSession.php');
?>

<!DOCTYPE HTML>
<html>
  <head>
     <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      * {
      box-sizing: border-box;
      }
      html, body {
      min-height: 100vh;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px; 
      color: #666;
      }
      input, textarea { 
      outline: none;
      }
      body {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background: #b8bde0;
      }
       {
      margin-top: 0; !important;
      font-weight: 500; !important;
      }
      form {
      position: relative;
      width: 80%;
      border-radius: 30px;
      background: #fff;
      }
      .form-left-decoration,
      .form-right-decoration {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 20px;
      background: #b8bde0;
      }
      .form-left-decoration {
      bottom: 60px;
      left: -30px;
      }
      .form-right-decoration {
      top: 60px;
      right: -30px;
      }
      .form-left-decoration:before,
      .form-left-decoration:after,
      .form-right-decoration:before,
      .form-right-decoration:after {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 30px;
      background: #fff;
      }
      .form-left-decoration:before {
      top: -20px;
      }
      .form-left-decoration:after {
      top: 20px;
      left: 10px;
      }
      .form-right-decoration:before {
      top: -20px;
      right: 0;
      }
      .form-right-decoration:after {
      top: 20px;
      right: 10px;
      }
      .circle {
      position: absolute;
      bottom: 80px;
      left: -55px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #fff;
      }
      .form-inner {
      padding: 40px;
      }
      .form-inner input,
      .form-inner textarea {
      display: block;
      width: 100%;
      padding: 15px;
      margin-bottom: 10px;
      border: none;
      border-radius: 20px;
      background: #d0dfe8;
      }
      .form-inner textarea {
      resize: none;
      }
      button {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      border-radius: 20px;
      border: none;
      border-bottom: 4px solid #b8bde0;
      background: #b8bde0; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
      button:hover {
      background: #b8bde0;
      } 
      @media (min-width: 568px) {
      form {
      width: 60%;
      }
      }
    </style>
  </head>
<body>


 <?php include("menu.php"); ?>
  <br/>
   
    <br/><br/>

    <form class="decor" method="post" action="updatePwd.php">

    <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1 style=" margin-top: 0; font-weight: 500;"><?php echo ''.$_SESSION['user']['Login'] ?> </h1>
             <input 
                   minlength=4
                   class="form-control oldpwd"
                   type="password"
                   name="oldpwd"
                   autocomplete="new-password"
                   placeholder="Taper votre Ancien Mot de passe"
                   required>
                          
            
        <input minlength=4
                    class="form-control newpwd"
                    type="password"
                    name="newpwd"
                    autocomplete="new-password"
                    placeholder="Taper votre Nouveau Mot de passe"
                    required>
     

        <button type="submit">Enregistrer</button>
      </div>

    </form>


</body>
</html>