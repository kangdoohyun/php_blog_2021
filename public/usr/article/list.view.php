<?php
$pageTitle = "게시물 리스트";
?>
<script>
  // function write_authority_check() {
  //   var session = <?=isset($_SESSION['loginedMemberId']) ? $_SESSION['loginedMemberId'] : 0?>;
  //   if (session != 0) {
  //     location.href='./write.php?memberId='+session;
  //   } else{
  //     alert('로그인 후 이용해주세요');
  //   }
  // }
  // function make_board_authority_check() {
  //   var session = <?=isset($_SESSION['loginedMemberId']) ? $_SESSION['loginedMemberId'] : 0?>;
  //   if (session == 1) {
  //     location.href='../board/make.php';
  //   } 
  //   else if(session == 0) {
  //     alert('로그인 후 이용해주세요');
  //   }
  //   else{
  //     alert('관리자만 게시판을 생성할 수 있습니다.');
  //   }
  // }
</script>

<style>
/* html > body > form{
  display: inline-block;
} */
</style>

<?php require_once __DIR__ . "/../head.php"; ?>
<form action="./write.php?" method="POST">
  <input type="hidden" name="memberId" value="<?=$_REQUEST['APP__loginedMemberId']?>">
  <input type="submit" value="글 작성">
</form>
<form action="../board/make.php?" method="POST">
  <input type="submit" value="게시판 생성">
</form>
<hr>
<nav>
  <ul>
  <li><a href="./list.php">전체보기</a></li>
    <?php foreach( $boards as $board ) { ?>
      <li><a href="./list.php?boardId=<?=$board['id']?>"><?=$board['name']?></a></li>
    <?php } ?>
  </ul>
</nav>
<div>  
  <?php foreach( $articles as $article ) { ?>
  번호 : <?=$article['id']?><br>
  작성 날짜 : <?=$article['regDate']?><br>
  수정 날짜 : <?=$article['updateDate']?><br>
  제목 : <a href="./detail.php?id=<?=$article['id']?>"><?=$article['title']?></a><br>
  <hr>
  <?php } ?>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>
 