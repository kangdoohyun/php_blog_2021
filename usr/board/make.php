<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
$pageTitle = "게시판 생성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<div>
  <form action="./doMake.php?">
    <div>
      <span>이름 : </span>
      <input required style="width: 200px;" type="text" name="name" placeholder="게시판 이름을 입력해주세요.">
    </div>
    <button style="width: 255px;" type="submit">게시판 생성</button>
    <hr>
  </form>
</div>
<div>
  <button onclick="location.href='../article/list.php'">글 리스트</button>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>