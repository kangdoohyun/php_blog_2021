<?php
$isLogined = false;
$loginedMemberId = 0;
$loginedMember = null;

if(isset($_SESSION['loginedMemberId'])){
  $isLogined = true;
  $loginedMemberId = intval($_SESSION['loginedMemberId']);
  $memberService = new APP__MemberService();
  $loginedMember = $memberService->getMemberById($loginedMemberId);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle?></title>
  <link rel="stylesheet" href="/common.css">
</head>
<body>
  <h1><?=$pageTitle?></h1>
  <?php if ($isLogined) { ?>
    <button onclick="location.href='../member/modify.php?memberId=<?=$_SESSION['loginedMemberId']?>'">회원정보 수정</button>
    <button onclick="if(confirm('회원을 탈퇴 하시겠습니까?') == false) return false; location.href='../member/doDelete.php?id=<?=$_SESSION['loginedMemberId']?>';">회훤 탈퇴</button>
    <button onclick="location.href='../member/doLogout.php'">로그아웃</button>
  <?php } else{ ?>
    <button onclick="location.href='../member/login.php'">로그인</button>
  <?php } ?>
  <hr>
  