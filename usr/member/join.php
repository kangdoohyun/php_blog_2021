<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
$pageTitle = "회원가입";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<div>
  <form action="./doJoin.php?">
    <div>
      <span>아이디 : </span>
      <input required style="width: 200px;" type="text" name="loginId" placeholder="아이디를 입력해 주세요">
    </div>
    <div>
      <span>비밀번호 : </span>
      <input required style="width: 200px;" type="password" name="loginPw" placeholder="비밀번호를 입력해 주세요">
    </div>
    <div>
      <span>이름 : </span>
      <input required style="width: 200px;" type="text" name="name" placeholder="이름을 입력해 주세요">
    </div>
    <div>
      <span>닉네임 : </span>
      <input required style="width: 200px;" type="text" name="nickname" placeholder="닉네임을 입력해 주세요">
    </div>
    <div>
      <span>전화번호 : </span>
      <input required style="width: 200px;" type="text" name="cellphoneNo" placeholder="전화번호를 입력해 주세요">
    </div>
    <div>
      <span>이메일 : </span>
      <input required style="width: 200px;" type="text" name="email" placeholder="이메일을 입력해 주세요">
    </div>
    <button style="width: 255px;" type="submit">가입하기</button>
    <hr>
  </form>
</div>
<div>
  <button onclick="location.href='./login.php'">로그인 화면으로</button>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>