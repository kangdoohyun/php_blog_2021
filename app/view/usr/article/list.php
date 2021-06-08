<?php
$pageTitle = "게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<style>
  .border-list-box>ul>li {
    width: calc(100% / <?=count($boards) + 1?>);
    cursor: pointer;
    text-align: center;
    background: #292a2d;
    border: 3px solid #ddd;
  }
</style>
<nav class="list-menu-box inline-grid">
  <form action="../board/make" method="POST">
    <input class="input-btn" type="submit" value="게시판 생성">
  </form>
  <form action="./write" method="POST">
    <input type="hidden" name="memberId" value="<?=$_REQUEST['APP__loginedMemberId']?>">
    <input class="input-btn" type="submit" value="글 작성">
  </form>
</nav>

<section class="section-1 con">
  <nav class="border-list-box">
    <ul class="inline-grid">
      <li><a href="./list">전체보기</a></li>
      <?php foreach( $boards as $board ) { ?>
      <li><a href="./list?boardId=<?=$board['id']?>"><?=$board['name']?></a></li>
      <?php } ?>
    </ul>
  </nav>

  <div class="list-content-box img-box">
    <ul class="inline-grid">
      <?php foreach( $articles as $article ) { ?>
      <?php $member =$this->memberService->getMemberById($article['memberId'])?>
      <li>
        <div class="img-box">
          <!-- 이미지 --> 
          <img src="/img/programming-3170991.png" alt="">
          <!-- 번호 -->
          <!-- <p><?=$article['id']?></p> -->
          <!-- 제목 -->
          <p><a href="./detail?id=<?=$article['id']?>"><?=$article['title']?></a></p>
          <!-- 작성자 -->
          <!-- <p><?=$member['nickname']?></p> -->
          <!-- 작성 날짜 -->
          <!-- <p><?=$article['regDate']?></p> -->
        </div>
      </li>
      <?php } ?>
    </ul>
  </div>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>