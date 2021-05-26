<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle?></title>
</head>
<body>
  <h1><?=$pageTitle?></h1>
  <?php if ( empty($_SESSION['loginedMemberId']) == false) { ?>
    <button onclick="location.href='.doLogout.php'">로그아웃</button>
  <?php } ?>
  <hr>
  