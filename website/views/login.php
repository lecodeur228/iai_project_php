<?php 
@include('./validation/login_validation.php')

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <!-- <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a> -->
                                <p class="text-center">Authentification de etudiant</p>
                                <form method="post" action="./controllers/do_login.php">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nom</label>
                                        <input type="text" class="form-control" name="firstname">
                                        <?php if (isset($_GET['value1'])) {
                                          echo $_GET['value1']; 
                                        }?> 
                                        <?php
                                                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                                                        echo "<p class='text text-danger'>Le nom est obligatoire</p>";
                                                    }
                                                    if (isset($_GET['error']) && $_GET['error'] == 3) {
                                                        echo "<p class='text text-danger'>Le nom est obligatoire</p>";
                                                    }
                                                    ?>

                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">mot de passe </label>
                                        <input type="password" class="form-control" name="mdp" value="<?php if (isset($_GET['value1'])) {
                                          echo $_GET['value2']; 
                                        }?>">
                                        <?php 
                                                  if (isset($_GET['error']) && $_GET['error'] == 2) {
                                                    echo "<p class='text text-danger'>la mot de passe est obligatoire</p>";
                                                }
                                                  if (isset($_GET['error']) && $_GET['error'] == 3) {
                                                    echo "<p class='text text-danger'>la mot de passe est obligatoire</p>";
                                                }
                                            
                                                ?>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Connexion</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">J'ai pas de compte?</p>
                                        <a class="text-primary fw-bold ms-2" href="../website/register.php">Creer un
                                            compte</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>