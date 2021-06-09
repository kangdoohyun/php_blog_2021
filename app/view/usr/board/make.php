<?php
$pageTitle = "게시판 생성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="con">
  <form action="/../usr/board/doMake" method="POST">
    <div>
      <span>이름 : </span>
      <input style="width: 200px;" type="text" name="name" placeholder="게시판 이름을 입력해주세요.">
    </div>
    <button class="input-btn" style="width: 255px;" type="submit">게시판 생성</button>
  </form>
  </div>
  <div>
    <button class="input-btn" onclick="location.href='/../usr/article/list'">글 리스트</button>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>