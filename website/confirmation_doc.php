<?php 
    @include('./validation/login_validation.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
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
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <!-- <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a> -->
                                <p class="text-center">Confirmation d'inscription de l'étudiant</p>
                                <form method="post" action="./controllers/do_confirmation.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">PDF de la naissance</label>
                                        <input type="file" class="form-control" name="pdf_naissance" accept=".pdf">
                                        <?php
                                            if (empty($_FILES["pdf_naissance"]["name"])) {
                                                echo "<p class='text text-danger'>Le PDF de la naissance est obligatoire</p>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">PDF de la nationalité </label>
                                        <input type="file" class="form-control" name="pdf_nationalite" accept=".pdf">
                                        <?php 
                                            if (empty($_FILES["pdf_nationalite"]["name"])) {
                                                echo "<p class='text text-danger'>Le PDF de la nationalité est obligatoire</p>";
                                            }
                                        ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">PDF de l'attestation du bac </label>
                                        <input type="file" class="form-control" name="pdf_attestation" accept=".pdf">
                                        <?php 
                                            if (empty($_FILES["pdf_attestation"]["name"])) {
                                                echo "<p class='text text-danger'>Le PDF de l'attestation est obligatoire</p>";
                                            }
                                        ?>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Confirmer</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
