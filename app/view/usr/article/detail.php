<?php
$pageTitle = $article['title'];
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<script>
  function toggleText(i, replyMemberId) {
    var text = document.getElementById("modifyReply" + i);
    var btn = document.getElementById("modifyBTN" + i);
    if(replyMemberId == <?=$_REQUEST['APP__loginedMemberId']?>){
      if (text.style.display == "none") {
        text.style.display = "block";
        btn.style.display = "block";
      }
      else {
        text.style.display = "none";
        btn.style.display = "none";
      }
    }
    else{
      alert("작성자만 댓글을 수정할 수 있습니다");
    }
  }
</script>
<section class="lg:container mx-auto p-16">
  <div>
    <div class="text-right mb-8">
      <div class="text-left w-1/6 ml-auto">
        <p>번호 : <?=$article['id']?></p>
        <p>작성 날짜 : <?=$article['regDate']?></p>
        <p>수정 날짜 : <?=$article['updateDate']?></p>
        <p>작성자 : <?=$article['memberId']?></p>
        <p>조회수 : <?=$article['views']?></p>
      </div>
    </div>
    
    <!-- 내용 -->
    <?=$article['body']?><br>
    <!-- 좋아요 -->
    <div class="my-2 py-2 w-1/12 rounded-full border-2 border-red-500 text-center ml-auto mr-auto">
      <div class="flex justify-center h-full text-red-500">
        <?php if(empty($like)) {?>
        <a href="./doLike?articleId=<?=$article["id"]?>">
          <span><i class="far fa-heart"></i></span>
          <span>좋아요</span>
        </a>
        <?php } else {?>
        <a href="./doDeleteLike?articleId=<?=$article["id"]?>">
          <span><i class="fas fa-heart"></i></span>
          <span>좋아요</span>
        </a>
        <?php } ?>
      </div>
    </div>
    
    
    <hr>
  </div>
  <div class="flex h-full">
    <button class="inline-block p-2 bg-blue-100 text-white hover:bg-white hover:text-blue-100" onclick="location.href='./list'">글 리스트</button>
    <form class="" action="./modify" method="POST">
      <input type="hidden" name="id" value="<?=$article['id']?>">
      <input type="hidden" name="title" value="<?=$article['title']?>">
      <input type="hidden" name="body" value="<?=$article['body']?>">
      <input class="p-2 bg-blue-100 text-white hover:bg-white hover:text-blue-100" type="submit" value="수정">
    </form>
    <form class="" action="./doDelete" method="POST">
      <input type="hidden" name="id" value="<?=$article['id']?>">
      <input type="hidden" name="memberId" id="<?=$article['memberId']?>">
      <input class="p-2 bg-blue-100 text-white hover:bg-white hover:text-blue-100" type="submit" value="삭제">
    </form>
  </div>
  <hr>
  <div>
    <h2>댓글</h2>
    <form class="flex h-full" name="replyForm"action="../reply/doWrite" method="POST">
      <input type="hidden" name="relId" value="<?=$article['id']?>">
      <input type="hidden" name="memberId" value="<?=$loginedMemberId?>">
      <textarea class="w-4/5 p-4" name="body" placeholder="댓글을 작성해 주세요"></textarea>
      <br>
      <button class="w-1/5 bg-blue-100 text-white" type="submit">작성 완료</button>
      <hr>
    </form>
  </div>
  <div>
    <?php $i = 0 ?>
    <?php foreach( $replis as $reply ) { ?>
    <?php $i = $i + 1 ?>
    작성 날짜 : <?=$reply['regDate']?><br>
    수정 날짜 : <?=$reply['updateDate']?><br>
    내용 : <?=$reply['body']?><br>
    <div class="flex h-full">
      <form action="../reply/doModify" method="POST">
        <input class="p-2 bg-blue-100 text-white hover:bg-white hover:text-blue-100" type="button" value="수정" onclick="toggleText(<?=$i?>, <?=$reply['memberId']?>)">
      </form>
      <form action="../reply/doDelete">
        <input type="hidden" name="id" value="<?=$reply['id']?>">
        <input type="hidden" name="relId" value="<?=$reply['relId']?>">
        <input type="hidden" name="memberId" value="<?=$reply['memberId']?>">
        <input class="p-2 bg-blue-100 text-white hover:bg-white hover:text-blue-100" type="submit" value="삭제" onclick="if(confirm('정말 삭제 하시겠습니까?') == false) return false;">
      </form>
    </div>
    <br>
    <form class="flex h-full" action="../reply/doModify" method="POST">
      <input type="hidden" name="id" value="<?=$reply['id']?>">
      <input type="hidden" name="memberId" value="<?=$reply['memberId']?>">
      <input type="hidden" name="relId" value="<?=$reply['relId']?>">
      <textarea class="w-4/5 p-4" style="display:none" id="modifyReply<?=$i?>" name="body"><?=$reply['body']?></textarea>
      <input class="w-1/5 bg-blue-100" type="submit" value="수정 하기" id="modifyBTN<?=$i?>" style="display:none">
    </form>
    <hr>
    <?php } ?>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>