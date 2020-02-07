<?php
include 'konekcija.php';
include 'gradClass.php';
include 'slikeClass.php';

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      $naslov = trim($_POST['naslov']);
      $tekst = trim($_POST['tekst']);
      $grad = trim($_POST['grad']);
      $nazivSlike = basename($_FILES["file"]["name"]);
      $konekcija->query("INSERT into slike(naslov,tekst,gradID,slika) VALUES ('$naslov','$tekst',$grad,'$nazivSlike')");
      header("Location: index.php");
  }
}


?>
