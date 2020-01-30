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
    <table id="program">
      <thead>
        <tr>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Né le</th>
          <th>Membre</th>
          <th>Référence</th>
        </tr>
      </thead>
        <tbody>
        <?php

        $db = connectDb();
        $db->exec("SET CHARACTER SET utf8");
        $query = 'SELECT * FROM `clients`';
        $usersQueryStat = $db->query($query);
        $usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
        foreach ($usersList AS $user):
          if ($user['card']=='1') {
            $user['card']="OUI";
          }
          else {
            $user['card']="NON";
          }
          ?>

          <tr>
            <td><?= $user['firstName'] ?></td>
            <td><?= $user['lastName'] ?></td>
            <td><?= $user['birthDate'] ?></td>
            <td><?= $user['card'] ?></td>
            <td><?= $user['cardNumber'] ?></td>
          </tr>

          <?php
        endforeach;
        ?>
      </tbody>
  </table>
</div>
<div class="blank">

</div>
</body>
</html>
