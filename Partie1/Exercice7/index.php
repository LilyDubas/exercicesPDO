<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Exercice 7</title>
</head>
<body>
  <header>
    <div class="menu">
      <?php include '../header.php'; ?>
    </div>
  </header>
  <div class="jumbotron m-auto text-center" id="type">
    <h1>Bravo aux gagnants du tirage au sort "box élite show" du mois de Janvier :</h1>
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

    ?>
        <?php

        $db = connectDb();
        $db->exec("SET CHARACTER SET utf8");
        $query  = 'SELECT `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') `birthDate`, `card`, `cardNumber` FROM `clients`';
        $usersQueryStat = $db->query($query);
        $usersList = $usersQueryStat->fetchAll(PDO::FETCH_OBJ); ?>
        <div class="row">
        <?php
        foreach ($usersList AS $user):
          ?>
        <div class="col-md-4">
          <div class="card p-2 mt-4 shadow bg-warning">
            <p>Nom: <?= $user->firstName ?></p>
            <p>Prénom: <?= $user->lastName ?></p>
            <p>Date de naissance: <?= $user->birthDate ?></p>
            <p>Carte: <?= $user->card ? 'OUI' : 'NON' ?></p>
            <?php if ($user->card): ?>
            <p>Numéro de carte: <?= $user->cardNumber ?></p>
            <?php endif; ?>
          </div>
        </div>
          <?php
        endforeach;
        ?>
        </div>
</div>
<div class="blank">

</div>
</body>
</html>
