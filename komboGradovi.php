<?php
  include 'konekcija.php';
  include 'gradClass.php';

  $rez = $konekcija->query('SELECT * FROM grad');

  $gradovi = array();
  while($red = $rez->fetch_assoc()) {
    $grad = new Grad();
    $grad->gradID = $red['gradID'];
    $grad->nazivGrada = $red['nazivGrada'];
    array_push($gradovi, $grad);
    }
foreach($gradovi as $g){
 ?>
 <option value="<?php echo $g->gradID ?>"><?php echo $g->nazivGrada ?></option>
<?php

}
 ?>
