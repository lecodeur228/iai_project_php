 <?php
    if (isset($_SESSION['admin'])) {
        header("./index.php");
    }
    else 
    {
        header("./login_admin.php");
    }
  $hostname = "localhost";
  $database = "iaiprojetphp";
  $username = "root";
  $password = "";

  try {
      $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8";
      $options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false,
      ];

      $db = new PDO($dsn, $username, $password, $options);
  } catch (PDOException $e) {
      echo "Erreur de connexion à la base de données : " . $e->getMessage();
  }
    // code pour avoir le nombre d'etudiants
  $query_etudiants = "SELECT COUNT(*) as totalEtudiants FROM etudiants";
    $stmt = $db->query($query_etudiants);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalEtudiants = $result['totalEtudiants'];

    // code pour avoir le nombre d'etudiansts inscris par sexe
    $query_sexe = "SELECT e.sexe, COUNT(c.etudiant_id) as nombre_candidats FROM etudiants e
    LEFT JOIN candidats c ON e.id = c.etudiant_id
    GROUP BY e.sexe";
    $stmt = $db->query($query_sexe);
    $totaleSexe = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // code pour avoir le nombre d'etudiansts inscris par nationalite
    $query_nat = "SELECT e.nationalite, COUNT(c.etudiant_id) as nombre_candidats FROM etudiants e
    LEFT JOIN candidats c ON e.id = c.etudiant_id
    GROUP BY e.nationalite";
    $stmt = $db->query($query_nat);
    $totaleNat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // code pour avoir le nombre d'etudiansts inscris par serie
    $query_serie = "SELECT e.serie, COUNT(c.etudiant_id) as nombre_candidats FROM etudiants e
    LEFT JOIN candidats c ON e.id = c.etudiant_id
    GROUP BY e.serie";
    $stmt = $db->query($query_serie);
    $totaleSerie = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Requête pour récupérer la liste des étudiants masculins (sexe = 'M') dans la table des candidats
      $query_m = "SELECT etudiants.* FROM etudiants
      INNER JOIN candidats ON etudiants.id = candidats.etudiant_id
      WHERE etudiants.sexe = 'M'";

      $stmt = $db->prepare($query_m);

      // Exécutez la requête
      $stmt->execute();

      // Récupérez les résultats
      $results_m = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Requête pour récupérer la liste des étudiants masculins (sexe = 'F') dans la table des candidats
      $query_f = "SELECT etudiants.* FROM etudiants
      INNER JOIN candidats ON etudiants.id = candidats.etudiant_id
      WHERE etudiants.sexe = 'F'";

      $stmt = $db->prepare($query_f);

      // Exécutez la requête
      $stmt->execute();

      // Récupérez les résultats
      $results_f = $stmt->fetchAll(PDO::FETCH_ASSOC);
      	  // Récupérer les valeurs depuis la base de données
$query_get = "SELECT * FROM `date_concours` WHERE `id` = 1";
$stmt = $db->prepare($query_get);
$stmt->execute();
$result_get = $stmt->fetch(PDO::FETCH_ASSOC);

// Stocker les valeurs dans des variables
$date_concour = $result_get['date_concour'];
$date_depot = $result_get['date_limit'];
?>
 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>
     <link rel="stylesheet" href="./assets/css/styles.min.css" />
 </head>

 <body>
     <!--  Body Wrapper -->
     <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">

         <!--  Main wrapper -->
         <?php
    @include('./components/leftbar.php')
    
    ?>
         <div class="body-wrapper">

             <?php
    @include('./components/header.php')
    
    ?>

             <div class="container-fluid">

                 <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                     <div class="inner">
                         <div class="app-card-body p-3 p-lg-4">
                             <h3 class="mb-3">Date limite de depot de dossier :
                                 <?php echo htmlspecialchars($date_depot); ?> </h3>
                             <h3 class="mb-3">Date du concours : <?php echo htmlspecialchars($date_concour); ?></h3>
                             <div class="row gx-5 gy-3">

                                 <!--//col-->
                                 <form action="./controllers/do_date.php" method="post">
                                 <div class="col-12 col-lg-10 d-flex">
                                     
                                         <div class="me-4">
                                             <label for="date_con">date du concour :</label>
                                             <input type="date" name="date_concour" class="form-control"
                                                 value="<?php echo htmlspecialchars($date_concour); ?>" required>
                                         </div>
                                         <div class="me-4">
                                             <label for="date_con"> date limite de dépot :</label>
                                             <input type="date" name="date_depot" class="form-control"
                                                 value="<?php echo htmlspecialchars($date_depot); ?>" required>
                                         </div>

                                         <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </form>
                                 <!--//col-->
                             </div>
                         </div>
                         <!--//app-card-body-->

                     </div>
                     <!--//inner-->
                 </div>
                 <!--  Row 1 -->
                 <div class="row">
                     <div class="col-lg-8 d-flex align-items-strech">
                         <div class="card w-100">
                             <div class="card-body">
                                 <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                     <div class="mb-3 mb-sm-0">
                                         <h5 class="card-title fw-semibold">Bilan</h5>
                                     </div>
                                     <div>
                                         <select class="form-select">
                                             <option value="1">March 2023</option>
                                             <option value="2">April 2023</option>
                                             <option value="3">May 2023</option>
                                             <option value="4">June 2023</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div id="chart"></div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="row">
                             <div class="col-lg-12">
                                 <!-- Yearly Breakup -->
                                 <div class="card overflow-hidden">
                                     <div class="card-body p-4">
                                         <h5 class="card-title mb-9 fw-semibold">Bilan Etudiants</h5>
                                         <div class="row align-items-center">
                                             <div class="col-8">
                                                 <div class="d-flex align-items-center">
                                                     <h5 class="">Etudiants inscrit : <?php echo $totalEtudiants ?></h5>

                                                 </div>
                                                 <div class="d-flex align-items-center">
                                                     <?php foreach ($totaleSexe as $result) : ?>
                                                     <h5><?php echo 'Sexe ' . ucfirst($result['sexe']) . ' : ' . $result['nombre_candidats'] . ' <br>';?>
                                                     </h5>
                                                     <?php endforeach; ?>
                                                 </div>
                                                 <div class="d-flex align-items-center">
                                                     <?php foreach ($totaleNat as $result) : ?>
                                                     <h5 class=" ">
                                                         <?php echo '' . ucfirst($result['nationalite']) . ' : ' . $result['nombre_candidats'] . '<br>'; ?>
                                                         <br>
                                                     </h5>
                                                     <?php endforeach; ?>
                                                 </div>
                                                 <div class="d-flex align-items-center">
                                                     <?php foreach ($totaleSerie as $result) : ?>
                                                     <h5 class="">
                                                         <?php echo 'Serie ' . ucfirst($result['serie']) . ' : ' . $result['nombre_candidats'] . '<br>'; ?>
                                                     </h5>
                                                     <br>
                                                     <?php endforeach; ?>
                                                 </div>

                                                 <div class="d-flex align-items-center">
                                                     <div class="me-4">
                                                         <span
                                                             class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                         <span class="fs-2">2023</span>
                                                     </div>
                                                     <div>
                                                         <span
                                                             class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                                         <span class="fs-2">2023</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-4">
                                                 <div class="d-flex justify-content-center">
                                                     <div id="breakup"></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <!-- Monthly Earnings -->
                                 <div class="card">
                                     <div class="card-body">
                                         <div class="row alig n-items-start">
                                             <div class="col-8">
                                                 <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                                                 <h4 class="fw-semibold mb-3">$6,820</h4>
                                                 <div class="d-flex align-items-center pb-1">
                                                     <span
                                                         class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                         <i class="ti ti-arrow-down-right text-danger"></i>
                                                     </span>
                                                     <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                     <p class="fs-3 mb-0">last year</p>
                                                 </div>
                                             </div>
                                             <div class="col-4">
                                                 <div class="d-flex justify-content-end">
                                                     <div
                                                         class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                         <i class="ti ti-currency-dollar fs-6"></i>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div id="earning"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-4 d-flex align-items-stretch">

                     </div>
                     <div class="col-lg-12 d-flex align-items-stretch">
                         <div class="card w-100">
                             <div class="card-body p-4">
                                 <h5 class="card-title fw-semibold mb-4">Candidats de sexe : Masculin</h5>
                                 <div class="table-responsive">
                                     <table class="table text-nowrap mb-0 align-middle">
                                         <thead class="text-dark fs-4">
                                             <tr>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">Id</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">Nom</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">date de naissance</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0"> sexe </h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0"> nationalité </h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">serie</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">annee bac</h6>
                                                 </th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php foreach ($results_m as $row) : ?>
                                             <tr>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0"><?php echo $row['id']; ?></h6>
                                                 </td>
                                                 <td class="border-bottom-0 d-flex">
                                                     <div class="d-flex align-items-center justify-content-center">
                                                         <img src="http://localhost/iai_project_php/website/controllers/uploads/<?php echo $row['photo_passport'] ?>"
                                                             alt="Image de Profil" class="rounded-circle" width="50"
                                                             height="50">
                                                     </div>
                                                     <div class="mx-2">
                                                         <h6 class="fw-semibold mb-1"><?php echo $row['nom']; ?></h6>
                                                         <span class="fw-normal"><?php echo $row['prenom']; ?></span>
                                                     </div>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <p class="mb-0 fw-normal"><?php echo $row['date_nais']; ?></p>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <div class="d-flex align-items-center gap-2">
                                                         <span
                                                             class="badge bg-primary rounded-3 fw-semibold"><?php echo $row['sexe']; ?></span>
                                                     </div>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0 fs-4">
                                                         <?php echo $row['nationalite']; ?></h6>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0 fs-4"><?php echo $row['serie']; ?></h6>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0 fs-4"><?php echo $row['annee_bac']; ?>
                                                     </h6>
                                                 </td>
                                             </tr>
                                             <?php endforeach; ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-12 d-flex align-items-stretch">
                         <div class="card w-100">
                             <div class="card-body p-4">
                                 <h5 class="card-title fw-semibold mb-4">Candidats de sexe : Feminin</h5>
                                 <div class="table-responsive">
                                     <table class="table text-nowrap mb-0 align-middle">
                                         <thead class="text-dark fs-4">
                                             <tr>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">Id</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">Nom</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">date de naissance</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0"> sexe </h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0"> nationalité </h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">serie</h6>
                                                 </th>
                                                 <th class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0">annee bac</h6>
                                                 </th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php foreach ($results_f as $row) : ?>
                                             <tr>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0"><?php echo $row['id']; ?></h6>
                                                 </td>
                                                 <td class="border-bottom-0 d-flex">
                                                     <div class="d-flex align-items-center justify-content-center">
                                                         <img src="http://localhost/iai_project_php/website/controllers/uploads/<?php echo $row['photo_passport'] ?>"
                                                             alt="Image de Profil" class="rounded-circle" width="50"
                                                             height="50">
                                                     </div>
                                                     <div class="mx-2">
                                                         <h6 class="fw-semibold mb-1"><?php echo $row['nom']; ?></h6>
                                                         <span class="fw-normal"><?php echo $row['prenom']; ?></span>
                                                     </div>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <p class="mb-0 fw-normal"><?php echo $row['date_nais']; ?></p>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <div class="d-flex align-items-center gap-2">
                                                         <span
                                                             class="badge bg-primary rounded-3 fw-semibold"><?php echo $row['sexe']; ?></span>
                                                     </div>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0 fs-4">
                                                         <?php echo $row['nationalite']; ?></h6>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0 fs-4"><?php echo $row['serie']; ?></h6>
                                                 </td>
                                                 <td class="border-bottom-0">
                                                     <h6 class="fw-semibold mb-0 fs-4"><?php echo $row['annee_bac']; ?>
                                                     </h6>
                                                 </td>
                                             </tr>
                                             <?php endforeach; ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>


             </div>
         </div>
     </div>
     <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
     <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <script src="./assets/js/sidebarmenu.js"></script>
     <script src="./assets/js/app.min.js"></script>
     <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
     <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
     <script src="./assets/js/dashboard.js"></script>
 </body>

 </html>