<?php
require_once('maSession.php');
require_once('connexiondb.php');

$nomIU=isset($_POST['nomIU'])?$_POST['nomIU']:"";
$nomNUn=isset($_POST['nomNUn'])?$_POST['nomNUn']:"";
$nomDC=isset($_POST['nomDC'])?$_POST['nomDC']:"";


$nomA=isset($_POST['nomA'])?$_POST['nomA']:"";
$nomi=htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
$nomd=isset($_POST['nomd'])?$_POST['nomd']:"";
$prix=isset($_POST['prix'])?$_POST['prix']:"";
$requete="insert into voiture(id,nom,Date_Creation,Adresse,image,description,prix) values (?,?,?,?,?,?,?) ";

    
    $params=array($nomIU,$nomNUn,$nomDC,$nomA,$nomi,$nomd,$prix);

$resultat=$pdo->prepare($requete);
$resultat->execute($params);

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png"  && $imageFileType != "PNG"&& $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}




header('location:universites.php');


?>