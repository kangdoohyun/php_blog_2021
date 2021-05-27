<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
$sql = "SELECT * FROM article ORDER BY id DESC";
$articles = db__getRows($sql);
?>
<?php
$pageTitle = "게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>

<button onclick="location.href = './write.php' ">글 작성</button>
<button onclick="location.href = '../member/login.php' ">로그인</button>
<hr>
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
 