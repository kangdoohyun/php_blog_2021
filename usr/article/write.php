<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<div>
  <form action="./doWrite.php?">
    <div>
      <span>제목 : </span>
      <input required style="width: 200px;" type="text" name="title" placeholder="제목을 입력해 주세요">
    </div>
    <div>
      <span>내용 : </span>
      <textarea required style="width: 202px;" name="body" placeholder="내용을 입력해 주세요"></textarea>

    </div>
    <button style="width: 255px;" type="submit">글 작성</button>
    <hr>
  </form>
</div>
<div>
  <button onclick="location.href='./list.php'">글 리스트</button>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>