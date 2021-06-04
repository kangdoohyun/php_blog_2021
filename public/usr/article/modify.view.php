<?php 
$pageTitle = "게시물 수정";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<div>
  <form action="./doModify.php?" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="hidden" name="memberId" value="<?=$memberId?>">
    <div>
      <span>제목 : </span>
      <input style="width: 200px;" type="text" name="title" value="<?=$article['title']?>">
    </div>
    <div>
      <span>내용 : </span>
      <textarea style="width: 202px;" name="body"><?=$article['body']?></textarea>

    </div>
    <button style="width: 255px;" type="submit">글 수정</button>
    <hr>
  </form>
</div>
<div>
  <button onclick="location.href='./list.php'">글 리스트</button>
  <button onclick="location.href='./detail.php?id=<?=$id?>'">원문</button>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>