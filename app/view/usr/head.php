<?php
$isLogined = $_REQUEST['APP__isLogined'];
$loginedMemberId = $_REQUEST['APP__loginedMemberId'];
$loginedMember = $_REQUEST['APP__loginedMember'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle?></title>
  <link rel="stylesheet" href="/common.css?ver=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <header class="inline-grid">
    <div class="top-bar-logo-box">
      <a href="#">
        <span><i class="fas fa-laptop-code"></i></span>
        <span>NCD</span>
      </a>
    </div>
    <div>
      <h1 class="page-name"><?=$pageTitle?></h1>
    </div>
    <nav class="top-bar-menu-box">
      <ul class="inline-grid text-right">
        <?php if ($isLogined) { ?>
          <li>
            <a href="../member/mypage.php">
              <span><i class="fas fa-user-cog"></i></span>
            </a>
          </li>
          <li>
            <a href="../member/doLogout.php">
              <span><i class="fas fa-sign-out-alt"></i></span>
            </a>
          </li>
        <?php } else{ ?>
          <li>
            <a href="../member/join.php">
              <span><i class="fas fa-user-plus"></i></span>
            </a>
          </li>
          <li>
            <a href="../member/login.php">
              <span><i class="fas fa-sign-in-alt"></i></span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  
  