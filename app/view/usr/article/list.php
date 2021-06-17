<?php
$pageTitle = "게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
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
  <div class="list-content-box mx-auto">
    <ul class="w-full">
      <?php foreach( $articles as $article ) { ?>
      <?php $member =$this->memberService->getMemberById($article['memberId'])?>
      <li class="border-b-2 border-gray-300">
        <a class="block w-full" href="./detail?id=<?=$article['id']?>">
          <div class="flex py-4">
            <img class="w-1/4 object-cover"src="/img/programming-3170991.png" alt="">
            <div class="w-3/4 flex flex-col pr-8 sm:pr-16">
              <span class="article-title block w-full px-4 font-semibold sm:text-2xl overflow-ellipsis overflow-hidden whitespace-nowrap"><?=$article['title']?></span>
              <span class="article-body webkit-box-3 block w-full flex-grow m-4 text-xs sm:text-base"><?=$article['body']?></span>
              <span class="article-regDate block w-full px-4"><?=$article['regDate']?></span>
            </div>
          </div>
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>
