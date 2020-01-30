<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Exercice 2</title>
</head>
<body>
  <header>
    <div class="menu">
        <?php include '../header.php'; ?>
    </div>
  </header>
  <div class="jumbotron m-auto text-center" id="type">
    <h1>Quel type de spectacle recherchez-vous?</h1>
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
$query = 'SELECT * FROM `showTypes`';
$usersQueryStat = $db->query($query);
$showTypesList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
foreach ($showTypesList AS $type):
    ?>
    <p><?= $type['type'] ?></p>
<?php
endforeach;
?>
</div>
<div class="blank">

</div>
</body>
</html>
