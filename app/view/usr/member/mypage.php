<?php
$pageTitle = "마이페이지";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="con">
  <div>
    <p>이름 : <?=$member['name']?></p>
    <p>닉네임 : <?=$member['nickname']?></p>
    <p>이메일 : <?=$member['email']?></p>
    <p>전화번호 : <?=$member['cellphoneNo']?></p>
    <p>가입 날짜 : <?=$member['regDate']?></p>
    <hr>
  </div>
  <div>
    <form action="../member/modify" method="POST">
      <input type="hidden" name="id" value="<?=$member['id']?>">
      <input type="hidden" name="loginId" value="<?=$member['loginId']?>">
      <input type="hidden" name="loginPw" value="<?=$member['loginPw']?>">
      <input type="hidden" name="name" value="<?=$member['name']?>">
      <input type="hidden" name="nickname" value="<?=$member['nickname']?>">
      <input type="hidden" name="cellphoneNo" value="<?=$member['cellphoneNo']?>">
      <input type="hidden" name="email" value="<?=$member['email']?>">
      <input class="input-btn" type="submit" value="회원정보 수정">
    </form>
    <form action="../member/doDelete">
      <input type="hidden" name="id" value="<?=$member['id']?>">
      <input class="input-btn" onclick="if(confirm('회원을 탈퇴 하시겠습니까?') == false) return false" type="submit" value="회원 탈퇴">
    </form>
    <form action="../article/list">
      <input class="input-btn" type="submit" value="게시물 리스트">
    </form>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>