<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">


    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>IAI</title>
</head>

<body>
    <!-- begin nav bar -->
    <?php 
        @include('components/header.php')
    ?>
        <!-- end nav bar -->

    <!-- begin welcome section -->

    <?php 
        @include('components/welcome.php')
    ?>

    <!-- end welcome section -->

      <!-- begin  footer -->

        <?php 
        @include('components/footer.php')
    ?>
      <!-- end footer -->


      <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
        // Date cible pour le décompte (remplacez cela par votre date souhaitée)
        var targetDate = new Date('January 31, 2024 23:59:59').getTime();

        // Mettez à jour le compte à rebours chaque seconde
        var countdownInterval = setInterval(function() {
            // Obtenez la date actuelle et le temps restant en millisecondes
            var currentDate = new Date().getTime();
            var timeRemaining = targetDate - currentDate;

            // Calculez le nombre de jours, heures, minutes et secondes restants
            var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
            
            // Affichez le compte à rebours dans l'élément HTML approprié
            document.getElementById('countdown').innerHTML = days + " jours, " + hours + " heures, " + minutes + " minutes, " + seconds + " secondes";

            // Vérifiez si le compte à rebours a atteint zéro
            if (timeRemaining <= 0) {
                clearInterval(countdownInterval); // Arrêtez le décompte lorsque le temps est écoulé
                document.getElementById('countdown').innerHTML = "Le décompte est terminé !";
            }
        }, 1000); // Répétez toutes les 1000 ms (1 seconde)
    </script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>