<?php
$pageTitle = "로그인";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="con">
  <form action="./doLogin.php?" method="POST">
    <div>
      <span>아이디 : </span>
      <input style="width: 200px; margin-left: 16px;" type="text" name="loginId" placeholder="로그인 아이디를 입력해 주세요">
    </div>
    <div>
      <span>비밀번호 : </span>
      <input  style="width: 200px;" type="password" name="loginPw" placeholder="********">
    </div>
    <button class="input-btn" style="width: 288px;" type="submit">로그인</button>
  </form>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>