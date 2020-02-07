<?php
  include 'konekcija.php';
  include 'gradClass.php';
  include 'slikeClass.php';

  $id=$_GET['gradID'];

  $rez = $konekcija->query('SELECT * FROM grad g join slike s on g.gradID=s.gradID where g.gradID ='.$id);

  $slike = array();
  while($red = $rez->fetch_assoc()) {
    $grad = new Grad();
    $grad->gradID = $red['gradID'];
    $grad->nazivGrada = $red['nazivGrada'];

    $slika = new Slike();
    $slika->slikaID = $red['slikaID'];
    $slika->naslov = $red['naslov'];
    $slika->tekst = $red['tekst'];
    $slika->slika = $red['slika'];
    $slika->grad = $grad;
    array_push($slike, $slika);
    }

    foreach($slike as $s){
 ?>
<div id="blog-homepage" class="row">
 <div class="col-sm-12 ">
     <div class="post">
         <h4><a href="#"><?php echo $s->naslov ; ?></a></h4>

         <hr>
         <div class="centralno">
         <a href="img/<?php echo $s->slika ; ?>">
           <img class="img img-responsive" src="img/<?php echo $s->slika ; ?>">
         </a>
       </div>
       <hr>
         <p class="intro"><?php echo $s->tekst ; ?></p>
         
     </div>
 </div>
</div>

<?php
}

 ?>
