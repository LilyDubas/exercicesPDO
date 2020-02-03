<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Gestion des patients</title>
</head>
<body>
<header>
  <div class="menu">
    <?php include '../header.php'; ?>
  </div>
</header>
<div class="jumbotron m-auto text-center" id="patients">
    <h1 id="patients-admin">GESTION DES PATIENTS</h1>
  <a class="btn" href="http://www.exercicespdo.com/Partie2/Exercice1/ajout-patient.php" id="subscribe">Nouveau patient</a>
  <table id="patients-table" class="m-auto table-striped">
    <thead>
    <tr class="text-justify">
      <th>Prénom</th>
      <th>Nom</th>
      <th>Né le</th>
      <th>Téléphone</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
  <?php

  function connectDb() {
    require_once 'params.php';

    $dsn = 'mysql:dbname=' . DB . ';host=' . HOST;

    try {
      $db = new PDO($dsn, USER, PASSWD);
      return $db;
    } catch (Exception $ex) {
      die('La connexion à la bd a échoué !');
    }
  }


  $db = connectDb();
  $db->exec("SET CHARACTER SET utf8");
  $query = 'SELECT * FROM `patients`';
  $patientsQueryStat = $db->query($query);
  $patientsList = $patientsQueryStat->fetchAll(PDO::FETCH_ASSOC);
  foreach ($patientsList AS $patient):
    ?>
    <tr class="text-justify">
      <td><a href="profil-patient.php"><?= $patient['firstname'] ?></a></td>
      <td><a href="profil-patient.php"><?= $patient['lastname'] ?></a></td>
      <td><a href="profil-patient.php"><?= $patient['birthdate'] ?></a></td>
      <td><a href="profil-patient.php"><?= $patient['phone'] ?></a></td>
      <td><a href="profil-patient.php"><?= $patient['mail'] ?></a></td>
      </tr>
  <?php
  endforeach;
  ?>
</div>
</body>
</html>