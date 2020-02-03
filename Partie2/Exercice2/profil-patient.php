<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Profil du patient</title>
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

    $dsn = 'mysql:dbname=' . DB . ';host=' . HOST;

    try {
      $db = new PDO($dsn, USER, PASSWD);
      return $db;
    } catch (Exception $ex) {
      die('La connexion à la bd a échoué !');
    }
  }



  ?>

</body>
</html>