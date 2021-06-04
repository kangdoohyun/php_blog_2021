<?php
$pageTitle = $article['title'].' 상세페이지';
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
  // function delete_confirm(){
  //   if(confirm('정말 삭제 하시겠습니까?') == false) {
  //     return false;
  //   }
  // }
  // function delete_authority_check(){
  //   if(<?=$article['memberId']?> == <?=$loginedMemberId?>){
  //     var confirm = delete_confirm();
  //     if(confirm != false){
  //       location.href='./doDelete.php?id=<?=$article['id']?>&memberId=<?=$article['memberId']?>';
  //     }
  //   }
  //   else if (<?=$loginedMemberId?> == 0){
  //     alert('로그인 후 이용해주세요.');
  //   }
  //   else{
  //     alert('본인 게시물만 삭제할 수 있습니다');
  //   }
  // }
  // function modify_authority_check(){
  //   if(<?=$article['memberId']?> == <?=$loginedMemberId?>){
  //     location.href='./modify.php?id=<?=$article['id']?>&title=<?=$article['title']?>&body=<?=$article['body']?>';
  //   }
  //   else if (<?=$loginedMemberId?> == 0){
  //     alert('로그인 후 이용해주세요.');
  //   }
  //   else{
  //     alert('본인 게시물만 수정할 수 있습니다');
  //   }
  // }
  // function reply_delete_authority_check(id, relId, memberId){
  //   if(memberId == <?=$loginedMemberId?>){
  //     var confirm = delete_confirm();
  //     if(confirm != false){
  //       location.href='../reply/doDelete.php?id=' + id + '&relId=' + relId;
  //     }
  //   }
  //   else if (<?=$loginedMemberId?> == 0){
  //     alert('로그인 후 이용해주세요.');
  //   }
  //   else{
  //     alert('본인 댓글만 삭제할 수 있습니다');
  //   }
  // }
  // function reply_modify_authority_check(i, memberid){
  //   if(memberid == <?=$loginedMemberId?>){
  //     toggleText(i);
  //   }
  //   else if (<?=$loginedMemberId?> == 0){
  //     alert('로그인 후 이용해주세요.');
  //   }
  //   else{
  //     alert('본인 댓글만 수정할 수 있습니다');
  //   }
  // }
</script>
<section class="con">
  <div>
    번호 : <?=$article['id']?><br>
    작성 날짜 : <?=$article['regDate']?><br>
    수정 날짜 : <?=$article['updateDate']?><br>
    제목 : <?=$article['title']?><br>
    내용 : <?=$article['body']?><br>
    작성자 : <?=$article['memberId']?><br>
    <hr>
  </div>
  <div>
    <button class="input-btn" onclick="location.href='./list.php'">글 리스트</button>
    <form action="./modify.php?" method="POST">
      <input type="hidden" name="id" value="<?=$article['id']?>">
      <input type="hidden" name="title" value="<?=$article['title']?>">
      <input type="hidden" name="body" value="<?=$article['body']?>">
      <input class="input-btn" type="submit" value="수정">
    </form>
    <form action="./doDelete.php?" method="POST">
      <input type="hidden" name="id" value="<?=$article['id']?>">
      <input type="hidden" name="memberId" id="<?=$article['memberId']?>">
      <input class="input-btn" type="submit" value="삭제">
    </form>
  </div>
  <hr>
  <div>
    <h2>댓글</h2>
    <form name="replyForm"action="../reply/doWrite.php" method="POST">
      <input type="hidden" name="relId" value="<?=$article['id']?>">
      <input type="hidden" name="memberId" value="<?=$loginedMemberId?>">
      <textarea style="width: 202px;" name="body" placeholder="댓글을 작성해 주세요"></textarea>
      <br>
      <button class="input-btn" style="width: 208px;" type="submit">작성 완료</button>
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
    <form action="../reply/doModify.php?" method="POST">
      <input class="input-btn" type="button" value="수정" onclick="toggleText(<?=$i?>, <?=$reply['memberId']?>)">
    </form>
    <form action="../reply/doDelete.php?">
      <input type="hidden" name="id" value="<?=$reply['id']?>">
      <input type="hidden" name="relId" value="<?=$reply['relId']?>">
      <input type="hidden" name="memberId" value="<?=$reply['memberId']?>">
      <input class="input-btn" type="submit" value="삭제" onclick="if(confirm('정말 삭제 하시겠습니까?') == false) return false;">
    </form>
    <br>
    <form action="../reply/doModify.php?" method="POST">
      <input type="hidden" name="id" value="<?=$reply['id']?>">
      <input type="hidden" name="memberId" value="<?=$reply['memberId']?>">
      <input type="hidden" name="relId" value="<?=$reply['relId']?>">
      <textarea style="width: 202px; display:none;" id="modifyReply<?=$i?>" name="body"><?=$reply['body']?></textarea>
      <input class="input-btn" type="submit" value="수정 하기" id="modifyBTN<?=$i?>" style="width: 208px; display:none;">
    </form>
    <hr>
    <?php } ?>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>