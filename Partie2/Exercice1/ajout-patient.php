<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Nouveau patient</title>
</head>
<body>
  <header>
    <div class="menu">
      <?php include '../header.php'; ?>
    </div>
  </header>
  <?php

  function connectDb() {
  require_once 'params.php';

  $dsn = 'mysql:dbname=' . DB . ';host=' . HOST. ';charset=utf8';

  try {
  $db = new PDO($dsn, USER, PASSWD);
  return $db;
} catch (Exception $ex) {
die('La connexion à la bd a échoué !');
}
}
if (isset($_POST['lastname'])) {
  $db = connectDb();
  $lastName = $_POST['lastname'];
  $requete="INSERT INTO `patients` (`lastname`) VALUES ('$lastName')";
  $resultat = $db->exec($requete);
  var_dump($resultat);
  if ($resultat != false){
    echo 'Le contact a été ajouté';
  }
  else{
    echo 'Erreur';
  }
}
?>
</div>
<h1 class="mt-5 mb-5 text-info text-center">Bienvenue sur Mediflex, le site de tous vos rdv médicaux</h1>
<div class="d-flex" id="signIn">
  <div id="instructions">
    <img src="" alt="">
  </div>
  <div class="jumbotron m-auto text-center" id="formPatient">
    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="lastname">Votre nom</label>
          <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Petit">
        </div>
        <div class="form-group col-md-6">
          <label for="firstname">Votre prénom</label>
          <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Chantal">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="mail">Votre email</label>
          <input name="mail" type="text" class="form-control" id="mail" placeholder="chantal-petit@monmail.com">
        </div>
        <div class="form-group col-md-6">
          <label for="phone">Votre numéro de téléphone</label>
          <input
          name="phone" type="text" class="form-control" id="phone" placeholder="06 12 34 56 89">
        </div>
      </div>
      <div class="form-group">
        <label for="birthdate">Votre date de naissance</label>
        <input name="birthdate" type="date" class="form-control" id="birthdate">
      </div>
      <button class="btn" type="submit" id="subscribe2">S'inscrire</button>
    </form>
  </div>
</div>

<div class="blank">

</div>
</body>
</html>
