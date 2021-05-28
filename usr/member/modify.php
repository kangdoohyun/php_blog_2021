<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if (isset($_GET['memberId']) == false){
  jsHistoryBackExit('회원번호를 입력해주세요.');
}
$memberId = intval($_GET['memberId']);
$sql = "SELECT * FROM member WHERE id = '$memberId'";
$member = db__getRow($sql);
$pageTitle = "회원정보 수정";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<div>
  <form action="./doModify.php?">
    <input type="hidden" name="id" value="<?=$member['id']?>">
    <div>
      <span>아이디 : </span>
      <input required style="width: 200px;" type="text" name="loginId" value="<?=$member['loginId']?>">
    </div>
    <div>
      <span>비밀번호 : </span>
      <input required style="width: 200px;" type="password" name="loginPw" value="<?=$member['loginPw']?>">
    </div>
    <div>
      <span>이름 : </span>
      <input required style="width: 200px;" type="text" name="name" value="<?=$member['name']?>">
    </div>
    <div>
      <span>닉네임 : </span>
      <input required style="width: 200px;" type="text" name="nickname" value="<?=$member['nickname']?>">
    </div>
    <div>
      <span>전화번호 : </span>
      <input required style="width: 200px;" type="text" name="cellphoneNo" value="<?=$member['cellphoneNo']?>">
    </div>
    <div>
      <span>이메일 : </span>
      <input required style="width: 200px;" type="text" name="email" value="<?=$member['email']?>">
    </div>
    <button style="width: 255px;" type="submit">수정 완료</button>
    <hr>
  </form>
</div>
<div>
  <button onclick="location.href='./login.php'">로그인 화면으로</button>
  <button onclick="location.href='../article/list.php'">게시물 리스트</button>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>