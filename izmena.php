<?php
include 'konekcija.php';
include 'gradClass.php';
include 'slikeClass.php';


if(isset($_POST["izmena"])) {
      $naslov = trim($_POST['naslov']);
      $tekst = trim($_POST['tekst']);
      $slikaID = trim($_POST['slike']);
      $konekcija->query("UPDATE slike set naslov='$naslov',tekst='$tekst' where slikaID=$slikaID");
      header("Location: index.php");
}


?>
