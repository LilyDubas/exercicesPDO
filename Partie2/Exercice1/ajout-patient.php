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

<h1 class="mt-5 mb-5 text-info text-center">Bienvenue sur Mediflex, le site de tous vos rdv médicaux</h1>
<div class="d-flex" id="signIn">
  <div id="instructions" class="text-center text-white m-auto">
      <div id="confirmation">
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
        if (isset($_POST['name'])) {
          $db = connectDb();
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $lastName = $_POST['name'];
          $firstName = $_POST['firstname'];
          $birthDate = $_POST['birthdate'];
          $phone = $_POST['phone'];
          $mail = $_POST['mail'];
          $request = $db->prepare("INSERT INTO `patients` ( `lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (?,?,?,?,?)");
          $request->execute([$lastName, $firstName, $birthDate, $phone, $mail]);
          if ($request != false){
            echo 'Le contact a été ajouté avec succès !';
          }
          else{
            echo 'Une erreur s\'est produite lors de l\'enregistrement de vos données';
          }
        }
        ?>
      </div>
  </div>
  <div class="jumbotron m-auto text-center" id="formPatient">
    <form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Votre nom</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="Petit">
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
      <button class="btn" type="submit" id="subscribe2">Enregistrer</button>
    </form>
  </div>
</div>

<div class="blank">

</div>
</body>
</html>
