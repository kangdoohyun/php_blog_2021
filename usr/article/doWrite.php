<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(empty($_GET['title'])){
  jsHistoryBackExit('제목을 입력해주세요.');
}
if(empty($_GET['body'])){
  jsHistoryBackExit('내용을 입력해주세요.');
}
if(empty($_GET['boardId'])){
  jsHistoryBackExit('게시판번호를 입력해주세요.');
}
if(empty($_GET['memberId'])){
  jsHistoryBackExit('회원번호를 입력해주세요.');
}
if(is_numeric($_GET['boardId']) == false){
  jsHistoryBackExit('게시판을 선택해주세요.');
}
$title = $_GET['title'];
$body = $_GET['body'];
$boardId = intval($_GET['boardId']);
$memberId = intval($_GET['memberId']);
$sql = "INSERT INTO article SET regDate = NOW(), updateDate = NOW(), boardId = '$boardId', memberId = '$memberId', title = '$title', body = '$body'";
$id = db__insert($sql);
?>
<script>
  alert("<?=$id?>번 글이 작성되었습니다.");
  location.replace("./list.php");
</script>