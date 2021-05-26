<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
$pageTitle = "로그인";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<div>
  <form action="./doLogin.php?">
    <div>
      <span>아이디 : </span>
      <input required style="width: 200px; margin-left: 16px;" type="text" name="loginId" placeholder="로그인 아이디를 입력해 주세요">
    </div>
    <div>
      <span>비밀번호 : </span>
      <input required style="width: 200px;" type="password" name="loginPw" placeholder="********">

    </div>
    <button style="width: 288px;" type="submit">로그인</button>
    <hr>
  </form>
</div>
<div>
  <button onclick="location.href='./join.php'">회원 가입</button>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>