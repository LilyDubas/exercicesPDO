<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Exercice 6</title>
</head>
<body>
  <header>
    <div class="menu">
      <?php include '../header.php'; ?>
    </div>
  </header>
  <div class="jumbotron m-auto text-center" id="type">
    <h1>Voici le programme des prochains concerts :</h1>
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
          <th>Artiste</th>
          <th>Date</th>
          <th>Heure</th>
        </tr>
      </thead>
        <tbody>
        <?php

        $db = connectDb();
        $db->exec("SET CHARACTER SET utf8");
        $query = 'SELECT * FROM `shows` ORDER BY `date` ASC';
        $usersQueryStat = $db->query($query);
        $showsList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
        foreach ($showsList AS $show):
          ?>

          <tr>
            <td><?= $show['performer'] ?></td>
            <td><?= $show['date'] ?></td>
            <td><?= $show['startTime'] ?></td>
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
