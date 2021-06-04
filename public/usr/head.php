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
</head>
<body>
  <h1><?=$pageTitle?></h1>
  <?php if ($isLogined) { ?>
    <!-- <button onclick="location.href='../member/modify.php?memberId=<?=$loginedMemberId?>'">마이페이지</button> -->
    <button onclick="location.href='../member/mypage.php'">마이페이지</button>
    <button onclick="location.href='../member/doLogout.php'">로그아웃</button>
  <?php } else{ ?>
    <button onclick="location.href='../member/login.php'">로그인</button>
    <button onclick="location.href='../member/join.php'">회원가입</button>
  <?php } ?>
  <hr>
  