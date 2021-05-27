<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if (isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = intval($_GET['id']);
$sql = "SELECT * FROM article WHERE id = '$id'";
$article = db__getRow($sql);

$sql = "SELECT * FROM reply WHERE relId = '$id' ORDER BY id DESC";
$replis = db__getRows($sql);
?>
<?php
$pageTitle = $article['title'].' 상세페이지';
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<script>
  function toggleText(i) {
    var text = document.getElementById("modifyReply" + i);
    var btn = document.getElementById("modifyBTN" + i);
    if (text.style.display === "none") {
      text.style.display = "block";
      btn.style.display = "block";
    } else {
      text.style.display = "none";
      btn.style.display = "none";
    }
  }
  function delete_confirm(){
    if(confirm('정말 글을 삭제 하시겠습니까?') == false) {
      return false;
    }
  }
  function delete_authority_check(){
    if(<?=$article['memberId']?> == <?=$_SESSION['loginedMemberId']?>){
      var confirm = delete_confirm();
      if(confirm != false){
        location.href='./doDelete.php?id=<?=$article['id']?>&memberId=<?=$article['memberId']?>';
      }
    }
    else{
      alert('본인 게시물만 삭제할 수 있습니다');
      location.href='./detail.php?id=<?=$id?>';
    }
  }
  function modify_authority_check(){
    if(<?=$article['memberId']?> == <?=$_SESSION['loginedMemberId']?>){
      location.href='./modify.php?id=<?=$article['id']?>&title=<?=$article['title']?>&body=<?=$article['body']?>';
    }
    else{
      alert('본인 게시물만 수정할 수 있습니다');
      location.href='./detail.php?id=<?=$id?>';
    }
  }
</script>
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
  <button onclick="location.href='./list.php'">글 리스트</button>
  <button
    onclick="modify_authority_check()">수정</button>
  <button
    onclick="delete_authority_check()">삭제</button>
</div>
<hr>
<div>
  <h2>댓글</h2>
  <form action="../reply/doWrite.php">
    <input type="hidden" name="relId" value="<?=$article['id']?>">
    <textarea style="width: 202px;" name="body" placeholder="댓글을 작성해 주세요"></textarea>
    <br>
    <button style="width: 208px;" type="submit">작성 완료</button>
    <hr>
  </form>
</div>
<div>
  <?php $i = 0 ?>
  <?php foreach( $replis as $reply ) { ?>
  <?php $i = $i + 1 ?>
  작성 날짜 : <?=$reply['regDate']?><br>
  수정 날짜 : <?=$reply['updateDate']?><br>
  제목 : <?=$reply['body']?><br>
  <form style="display: inline-block;" action="../reply/doModify.php?">
    <input type="button" value="수정" onclick="toggleText(<?=$i?>)">
  </form>
  <button style="display: inline-block;" onclick="if(confirm('정말 삭제 하시겠습니까?') == false) return false; location.href='../reply/doDelete.php?id=<?=$reply['id']?>&relId=<?=$reply['relId']?>';">삭제</button>
  <form style="display: inlin-block;" action="../reply/doModify.php?">
    <input type="hidden" name="id" value="<?=$reply['id']?>">
    <input type="hidden" name="relId" value="<?=$reply['relId']?>">
    <textarea style="width: 202px; display:none;" id="modifyReply<?=$i?>" name="body"><?=$reply['body']?></textarea>
    <input type="submit" value="수정 하기" id="modifyBTN<?=$i?>" style="width: 208px; display:none;">
  </form>
  <hr>
  <?php } ?>
</div>
<?php require_once __DIR__ . "/../foot.php"; ?>