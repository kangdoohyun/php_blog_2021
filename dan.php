<?php
$dan = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$dan?>단</title>

  <link rel="stylesheet" href="common.css">
</head>
<body>
  <h1><?=$dan?>단</h1>
  <hr>

  <?php for ( $i = 1; $i <= 9; $i++ ) { ?>
    <div>
      <?=$dan?> * <?=$i?> = <?=$dan * $i?>
    </div>
  <?php } ?>

  <hr>
  <a href="1dan.html">1단</a>
  <a href="2dan.html">2단</a>
</body>
</html>