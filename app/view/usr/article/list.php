<?php
$pageTitle = "게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<!-- <style>
  .border-list-box>ul>li {
    width: calc(100% / <?=count($boards) + 1?>);
    cursor: pointer;
    text-align: center;
    background: #292a2d;
    border: 3px solid #ddd;
  }
</style> -->
<nav class="list-menu-box lg:container mx-auto flex h-full bg-blue-100">
  <div class="flex-grow"></div>
  <form action="../board/make" method="POST">
    <input class="p-2 bg-blue-100 text-white hover:bg-white hover:text-blue-100" class="input-btn" type="submit" value="게시판 생성">
  </form>
  <form action="./write" method="POST">
    <input type="hidden" name="memberId" value="<?=$_REQUEST['APP__loginedMemberId']?>">
    <input class="p-2 bg-blue-100 text-white hover:bg-white hover:text-blue-100" class="input-btn" type="submit" value="글 작성">
  </form>
</nav>

<section class="section-1 lg:container mx-auto">
  <nav class="border-list-box bg-blue-100 text-white">
    <ul class="flex w-full h-full text-center">
      <li class="w-1/3"><a class="block px-3 w-full hover:bg-white hover:text-blue-100" href="./list">전체보기</a></li>
      <?php foreach( $boards as $board ) { ?>
      <li class="w-1/3"><a class="block px-3 w-full hover:bg-white hover:text-blue-100" href="./list?boardId=<?=$board['id']?>"><?=$board['name']?></a></li>
      <?php } ?>
    </ul>
  </nav>

  <div class="list-content-box mx-auto">
    <ul class="w-full my-inline-grid">
      <?php foreach( $articles as $article ) { ?>
      <?php $member =$this->memberService->getMemberById($article['memberId'])?>
      <li class="inline-block w-calc-3">
        <a href="./detail?id=<?=$article['id']?>">
          <div class="img-box">
            <!-- 이미지 --> 
            <img src="/img/programming-3170991.png" alt="">
            <!-- 번호 -->
            <!-- <p><?=$article['id']?></p> -->
            <!-- 제목 -->
            <p class="text-center my-4"><?=$article['title']?></p>
            <!-- 작성자 -->
            <!-- <p><?=$member['nickname']?></p> -->
            <!-- 작성 날짜 -->
            <!-- <p><?=$article['regDate']?></p> -->
          </div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>