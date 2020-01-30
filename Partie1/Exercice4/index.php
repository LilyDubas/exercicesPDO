<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Exercice 4</title>
</head>
<body>
  <header>
    <div class="menu">
        <?php include '../header.php'; ?>
    </div>
  </header>
  <div class="jumbotron m-auto text-center" id="type">
    <h1>Ce salon VIP est réservé aux membres détenteurs de la carte "Elite Member" :</h1>
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
$query = 'SELECT * FROM `clients` WHERE `card`=1';
$usersQueryStat = $db->query($query);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
foreach ($usersList AS $user):
    ?>
    <p><?= $user['firstName'] . ' ' . $user['lastName'] ?></p>
<?php
endforeach;
?>
</div>
<div class="blank">

</div>
</body>
</html>
