<?php 
@include('validation/register_validation.php')
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>inscription de etudiant</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-12 col-lg-12 col-xxl-6 ">
                        <form method="POST" action="./controllers/do_register.php" enctype="multipart/form-data">
                            <div class="card ">

                                <h1 class="text-center mt-2">creer un compte</h1>

                                <div class="card-body d-flex">
                                    <!-- <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a> -->

                                    <div class="col-md-6 col-lg-6 ol-xxl-3 mb-0">


                                        <div class="mb-3">
                                            <label for="exampleInputtext1" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="exampleInputtext1"
                                                name="firstname" aria-describedby="textHelp">
                                                <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 1) {
                                                    echo "<p class='text text-danger'>le nom est obligatoire</p>";
                                                  }
                                                ?>
                                                <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>le nom est obligatoire</p>";
                                                  }
                                                ?>
                                                
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Prenom</label>
                                            <input type="text" class="form-control" name="lastname">
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 2) {
                                                    echo "<p class='text text-danger'>le prenom est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>le prenom est obligatoire</p>";
                                                  }
                                                ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">date d naissance</label>
                                            <input type="date" class="form-control" name="birthday">
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 3) {
                                                    echo "<p class='text text-danger'>la date de naissance est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>la date de naissance est obligatoire</p>";
                                                  }
                                                ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Annee d'obtention du bac</label>
                                            <select class="form-select form-select-lg mb-3" name="anne_bac"
                                                aria-label="Large select example">
                                                <option selected>Selectioner année du bac</option>
                                                <option value="2022">2021-2022</option>
                                                <option value="2023">2022-2023</option>
                                            </select>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 4) {
                                                    echo "<p class='text text-danger'>la date de naissance est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>la date de naissance est obligatoire</p>";
                                                  }
                                                ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nationaliter</label>
                                            <select class="form-select form-select-lg mb-3" name="country"
                                                aria-label="Large select example">
                                                <option selected>Choix de nationaliter</option>
                                                <option value="Togolais">Togolais</option>
                                                <option value="Senegalais">Senegalais</option>
                                                <option value="Thadien">Thadien</option>
                                            </select>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 5) {
                                                    echo "<p class='text text-danger'>la nationnalité est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>la nationnalité est obligatoire</p>";
                                                  }
                                                ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Serie de bac</label>
                                            <select class="form-select form-select-lg mb-3" name="serie"
                                                aria-label="Large select example">
                                                <option selected>Choix de le serie</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F1">F1</option>
                                                <option value="F2">F2</option>
                                            </select>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 6) {
                                                    echo "<p class='text text-danger'>la serie est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>la serie est obligatoire</p>";
                                                  }
                                                ?>
                                        </div>
                                        <label for="exampleInputEmail1" class="form-label">Sexe</label>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexe"
                                                    id="inlineRadio1" value="M">
                                                <label class="form-check-label" for="inlineRadio1">MASCULAIN</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexe"
                                                    id="inlineRadio2" value="F">
                                                <label class="form-check-label" for="inlineRadio2">FEMININ</label>
                                            </div>
                                           
                                        </div>
                                        <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 7) {
                                                    echo "<p class='text text-danger'>le genre est obligatoire</p>";
                                                  }
                                                ?>
                                        <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>le genre est obligatoire</p>";
                                                  }
                                                ?>
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1" class="form-label">creer un mot de passe</label>
                                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 8) {
                                                    echo "<p class='text text-danger'>le mot de passe est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>le mot de passe est obligatoire</p>";
                                                  }
                                                ?>
                                        </div>



                                    </div>
                                    <div class="m-3 text-center" style="width: 18rem;" id="imageCard">
                                        <img src="../images/img.png" class="card-img-top" alt="Default Image"
                                            id="selectedImage">
                                        <input type="file" name="image" class="form-control" accept="image/*" id="imageInput"
                                            style="display: none">
                                        <div class="card-body">
                                            <p class="card-text">Selectionner une photopassport</p>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 9) {
                                                    echo "<p class='text text-danger'>la photo passport est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 0) {
                                                    echo "<p class='text text-danger'>la photo passport est obligatoire</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 10) {
                                                    echo "<p class='text text-danger'>Désolé, le fichier existe déjà.</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 11) {
                                                    echo "<p class='text text-danger'>Désolé, le fichier est trop volumineux.</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 12) {
                                                    echo "<p class='text text-danger'>Désolé, seulement les fichiers JPG, JPEG, PNG et GIF sont autorisés.</p>";
                                                  }
                                                ?>
                                            <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 13) {
                                                    echo "<p class='text text-danger'>Désolé, le fichier n'a pas été téléchargé.</p>";
                                                  }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-3  fs-4 rounded-2">Creer</button>



                            </div>


                    </div>
                </div>
                <!-- code de validation de forulaire en php -->


                </form>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('imageCard').addEventListener('click', function() {
        document.getElementById('imageInput').click();
    });

    document.getElementById('imageInput').addEventListener('change', function(event) {
        const selectedImage = document.getElementById('selectedImage');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
    </script>
    <script src="../js/jquery.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>