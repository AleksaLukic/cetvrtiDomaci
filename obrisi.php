<?php
include 'konekcija.php';
include 'gradClass.php';
include 'slikeClass.php';

$id=$_GET['id'];

$rez = $konekcija->query('SELECT * FROM grad g join slike s on g.gradID=s.gradID where s.slikaID ='.$id);
$slika = new Slike();
while($red = $rez->fetch_assoc()) {
  $grad = new Grad();
  $grad->gradID = $red['gradID'];
  $grad->nazivGrada = $red['nazivGrada'];


  $slika->slikaID = $red['slikaID'];
  $slika->naslov = $red['naslov'];
  $slika->tekst = $red['tekst'];
  $slika->slika = $red['slika'];
  $slika->grad = $grad;
  }

$adresa = 'img/'.($slika->slika);

if (unlink($adresa)){
  $konekcija->query('DELETE from slike where slikaID='.$id);
  header("Location: index.php");
}




?>
