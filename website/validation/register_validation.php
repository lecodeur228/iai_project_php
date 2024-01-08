<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les données du formulaire
  $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
  $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
  $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
  $country = isset($_POST["country"]) ? $_POST["country"] : "";
  $serie = isset($_POST["serie"]) ? $_POST["serie"] : "";
  $sexe = isset($_POST["sexe"]) ? $_POST["sexe"] : "";
  $password = isset($_POST["password"]) ? $_POST["password"] : "";
  $image = isset($_POST["image"]) ? $_POST["image"] : "";

                              // Vérifier si tous les champs obligatoires sont remplis
                              if (empty($firstname) || empty($lastname) || empty($birthday) || empty($country) || empty($serie) || empty($sexe) || empty($password)|| empty($image)) {
                              
                              }

}
?>