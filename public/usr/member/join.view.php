<?php
$pageTitle = "회원가입";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="text-center   con">
  <form action="./doJoin.php?" method="POST">
    <div class="input-text">
      <input type="text" name="loginId" placeholder="아이디를 입력해 주세요">
    </div>
    <div class="input-text">
      <input type="password" name="loginPw" placeholder="비밀번호를 입력해 주세요">
    </div>
    <div class="input-text">
      <input type="text" name="name" placeholder="이름을 입력해 주세요">
    </div>
    <div class="input-text">
      <input type="text" name="nickname" placeholder="닉네임을 입력해 주세요">
    </div>
    <div class="input-text">
      <input type="text" name="cellphoneNo" placeholder="전화번호를 입력해 주세요">
    </div>
    <div class="input-text">
      <input type="text" name="email" placeholder="이메일을 입력해 주세요">
    </div>
    <div class="input-btn">
      <input type="submit" value="DO JOIN">
    </div>
  </form>
  <div class="input-btn">
    <button onclick="location.href='./login.php'">로그인 화면으로</button>
  </div>
</div>
  
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>