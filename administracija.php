
<?php
include 'konekcija.php';
include 'gradClass.php';
include 'slikeClass.php';

$rez = $konekcija->query('SELECT * FROM grad g join slike s on g.gradID=s.gradID ');

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
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Stanje na putevima
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="srbija.png">



</head>

<body>


<?php include 'meni.php'; ?>


    <div id="all">

        <div id="content">
            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">Admin</h3>
                    </div>
                </div>
            </div>

            <div class="container">

                <div id="podaci" class="col-md-12" data-animate="fadeInUp">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Naslov</th>
                          <th>Tekst</th>
                          <th>Grad</th>
                          <th>Brisanje</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php


                          foreach($slike as $s){

                         ?>
                         <tr>
                           <td><?php echo $s->naslov ?></td>
                           <td><?php echo $s->tekst ?></td>
                           <td><?php echo $s->grad->nazivGrada ?></td>
                           <td><a href="obrisi.php?id=<?php echo $s->slikaID ?>" class="btn btn-danger">Obrisi </a></td>
                         </tr>

                          <?php
                        }
                          ?>
                      </tbody>
                    </table>
                </div>

                <hr>

                <form action="izmena.php" method="POST">
                  <label for="slike">Slika za izmenu</label>
                  <select id="slike" name="slike" class="form-control" >
                    <?php


                      foreach($slike as $s){

                     ?>
                     <option value="<?php echo $s->slikaID ?>"><?php echo $s->naslov ?></option>
                   <?php } ?>
                  </select>
                  <label for="naslov">Naslov</label>
                  <input name="naslov" id="naslov" class="form-control" placeholder="Naslov">
                  <label for="tekst">Tekst</label>
                  <textarea name="tekst" id="tekst" rows="5" class="form-control" placeholder="Tekst"></textarea>
                  <label for="submit"></label>
                  <input class="form-control btn-info" type="submit" value="Izmeni" name="izmena">
                </form>
              </br>
            </div>



        </div>

      <?php include 'footer.php'; ?>



    </div>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>

</body>

</html>
