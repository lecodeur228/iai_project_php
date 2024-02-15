<!-- nav bar -->

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">IAI-TOGO
            <br><small>University</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="./index.php" class="nav-link">Accieul</a></li>
                <li class="nav-item"><a href="./about.php" class="nav-link">A propos</a></li>
                <li class="nav-item"><a href="./course.php" class="nav-link">Courses</a></li>
                <li class="nav-item"><a href="./contact.php" class="nav-link">Contact</a></li>
                <?php
                @include('config.php');
          session_start();

          if (isset($_SESSION['user'])) {
            $data = $_SESSION['user']['nom'];

            
                session_start();
                $etudiant_id = $_SESSION['user']['id'];
                $photo_profile_url = $_SESSION['user']['photo_passport'];

                // Vérifiez si l'étudiant a confirmé son inscription
                $query = "SELECT * FROM document_confirmation WHERE etudiant_id = :etudiant_id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':etudiant_id', $etudiant_id);
                $stmt->execute();

                // Si l'étudiant a confirmé son inscription, affichez les informations
                if ($stmt->rowCount() > 0) {
                    $confirmationInfo = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // echo "L'étudiant avec l'ID $etudiant_id a confirmé son inscription.<br>";
                    // echo "Informations de confirmation :<br>";
                    // echo "PDF Naissance: {$confirmationInfo['nais']}<br>";
                    // echo "PDF Nationalité: {$confirmationInfo['nat']}<br>";
                    // echo "PDF Attestation: {$confirmationInfo['attes']}<br>";
                } else {
                    echo "<li class='nav-item cta mx-3'><a href='./confirmation_doc.php' class='nav-link'><span>Completer les dossiers</span></a></li>";
                }


            echo "
            <div class='dropdown'>
            <div data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='width: 50px; height: 50px;'>
            <img src='http://localhost/iai_project_php/website/controllers/uploads/$photo_profile_url' class='rounded-circle' width='50' height='50'>
            </div>
            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                <!-- Options du dropdown -->
                <a class='dropdown-item' href='#'>$data</a>
                <a class='dropdown-item' href='#'>Profile</a>
                <a class='dropdown-item text-danger' href='../controllers/do_logout.php'>Déconnexion</a>
            </div>
            </div>
            ";
          }
          else {
            echo "
            <li class='nav-item cta'><a href='./register.php' class='nav-link'><span>S'inscrire</span></a></li>
            <li class='nav-item cta mx-3'><a href='./login.php' class='nav-link'><span>Se connecter</span></a></li>";
          }
          
          ?>
            </ul>
        </div>
    </div>
</nav>

<!-- end nav bar -->