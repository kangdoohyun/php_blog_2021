<?php 
$pageTitle = "게시물 수정";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="con">
  <form action="/../usr/article/doModify" method="POST">
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
    <button class="input-btn" style="width: 255px;" type="submit">글 수정</button>
    <hr>
  </form>
  <div>
    <button class="input-btn" onclick="location.href='/../usr/article/list'">글 리스트</button>
    <button class="input-btn" onclick="location.href='/../usr/article/detail?id=<?=$id?>'">원문</button>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>