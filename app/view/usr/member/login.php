<?php
$pageTitle = "로그인";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="text-center con">
  <div class="login-box">
    <form action="/../usr/member/doLogin" method="POST">
      <div class="input-text" >
        <input type="text" name="loginId" placeholder="아이디를 입력해주세요.">
      </div>
      <div class="input-text" >
        <input type="password" name="loginPw" placeholder="비밀번호를 입력해주세요.">
      </div>
      <div class="input-btn">
        <input type="submit" value="LOGIN">
      </div>
    </form>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>