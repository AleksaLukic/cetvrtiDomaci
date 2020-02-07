<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    
	<title>Stanje na putevima</title>

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
                        <h3 class="text-uppercase">Dodavanje stanja u novom mestu</h3>
                    </div>
                </div>
            </div>
            <div class="container">
              <form method="POST" action="add.php" enctype="multipart/form-data">
                <label for="naslov">Naslov</label>
                <input name="naslov" id="naslov" class="form-control" placeholder="Naslov">
                <label for="tekst">Tekst</label>
                <textarea name="tekst" id="tekst" rows="5" class="form-control" placeholder="Tekst"></textarea>
                <label for="gradovi">Grad</label>
                <select id="gradovi" name="grad" class="form-control" ></select>
                <label for="file">Slika</label>
                <input class="form-control" type="file" name="file" id="file">
                <label for="submit"></label>
                <input class="form-control btn-info" type="submit" value="Sacuvaj" name="submit">
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
    <script>
      function napuniKomboGradova(){
        $.ajax({
          url: "komboGradovi.php",
          success: function(html){
            $("#gradovi").html(html);
          }
        });
      }
    </script>
    <script>
    napuniKomboGradova();
    </script>
</body>

</html>
