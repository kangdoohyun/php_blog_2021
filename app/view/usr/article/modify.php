<?php 
$pageTitle = "게시물 수정";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="lg:container mx-auto">
  <form action="./doModify" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="hidden" name="memberId" value="<?=$memberId?>">
    <div>
      <!-- 제목 -->
      <input class="w-full p-4 border mb-4 rounded-md" type="text" name="title" value="<?=$article['title']?>">
    </div>
    <div>
      <!-- 내용 -->
      <textarea class="w-full p-4 border mb-4 rounded-md" name="body"><?=$article['body']?></textarea>
    </div>
    <button class="w-full bg-blue-200 p-4 text-white" type="submit">글 수정</button>
  </form>
  <div>
    <button class="w-full bg-blue-200 p-4 text-white" onclick="location.href='./detail?id=<?=$id?>'">원문</button>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>