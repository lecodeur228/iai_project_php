<div class="hero-wrap" style="background-image: url('../assets/images/bg_1.jpg'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-4">Bienvenu sur le site web de IAI-TOGO</h1>
                
                    <h1>Compte à rebours en jours</h1>
                    <p id="countdown"></p>
                  <form action="./controllers/do_candidature.php" method="post">
                  <button type="submit" class="btn btn-primary px-4 py-3">Faire le dépôt de candidature</button> 
                  </form>
                  <?php 
                  $idToCheck = $_SESSION['user']['id']; // Remplacez cela par l'ID que vous souhaitez vérifier

                  // Requête SQL pour vérifier si l'ID existe
                  $query = "SELECT COUNT(*) as count FROM candidats WHERE etudiant_id = :idToCheck";
                  $stmt = $db->prepare($query);
                  
                  // Binder la valeur de l'ID
                  $stmt->bindParam(':idToCheck', $idToCheck, PDO::PARAM_INT);
                  
                  // Exécuter la requête
                  $stmt->execute();
                  
                  // Récupérer le résultat
                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                  
                  // Vérifier si l'ID existe
                  if ($result['count'] > 0) {
                      echo "<h3>Votre candidature a été deposer</h3>";
                  } else {
                      echo "";
                  }
                  
                  ?>

            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
  <div class="text text-center fw-bold">
    <h2>Les différentes branche à IAI-TOGO : </h2>
  </div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-3 py-4 d-block text-center">
              <div class="media-body px-3">
                <h3 class="heading">Genie Logiciel</h3>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-3 py-4 d-block text-center">
              <div class="media-body px-3">
                <h3 class="heading">Administrateur Reseau</h3>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-3 py-4 d-block text-center">
              <div class="media-body px-3">
                <h3 class="heading">Technologies Web et MultiMedia</h3>
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>