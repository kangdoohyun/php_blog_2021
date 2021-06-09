<?php
$pageTitle = "회원정보 수정";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="con">
  <form action="/../usr/member/doModify" method="POST">
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
    <button class="input-btn" style="width: 255px;" type="submit">수정 완료</button>
  </form>
  </div>
    <button class="input-btn" onclick="location.href='/../usr/member/login'">로그인 화면으로</button>
    <button class="input-btn" onclick="location.href='/../usr/article/list'">게시물 리스트</button>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>