<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/../webinit.php';
// 삼항연산자 isset($_GET['boardId'])가 참이면 intval($_GET['boardId']) 거짓이면 0이 할당된다.
$boardId = isset($_GET['boardId']) ? intval($_GET['boardId']) : 0;
$sql = DB__seqSql();
if ($boardId == 0){
  $sql -> add("SELECT * FROM article");
  $sql -> add("ORDER BY id DESC");
}else{
  $sql -> add("SELECT A.* FROM article AS A");
  $sql -> add("INNER JOIN board AS B ON A.boardId = B.id");
  $sql -> add("WHERE A.boardId = ?", $boardId);
  $sql -> add("ORDER BY a.id DESC");
}
$articles = DB__getRows($sql);

$sql = DB__seqSql();
$sql -> add("SELECT * FROM board");
$sql -> add("ORDER BY id ASC");
$boards = DB__getRows($sql);
?>
<?php
$pageTitle = "게시물 리스트";
?>
<script>
  function write_authority_check() {
    var session = <?=isset($_SESSION['loginedMemberId']) ? $_SESSION['loginedMemberId'] : 0?>;
    if (session != 0) {
      location.href='./write.php?memberId='+session;
    } else{
      alert('로그인 후 이용해주세요');
    }
  }
  function make_board_authority_check() {
    var session = <?=isset($_SESSION['loginedMemberId']) ? $_SESSION['loginedMemberId'] : 0?>;
    if (session == 1) {
      location.href='../board/make.php';
    } 
    else if(session == 0) {
      alert('로그인 후 이용해주세요');
    }
    else{
      alert('관리자만 게시판을 생성할 수 있습니다.');
    }
  }
</script>
<?php require_once __DIR__ . "/../head.php"; ?>
<button onclick="write_authority_check()">글 작성</button>
<button onclick="make_board_authority_check()">게시판 생성</button>
<hr>
<nav>
  <ul>
  <li style="display: inline-block;"><a href="./list.php">전체보기</a></li>
    <?php foreach( $boards as $board ) { ?>
      <li style="display: inline-block;"><a href="./list.php?boardId=<?=$board['id']?>"><?=$board['name']?></a></li>
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
 