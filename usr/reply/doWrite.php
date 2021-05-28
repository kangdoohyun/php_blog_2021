<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(empty($_GET['relId'])){
  jsHistoryBackExit('댓글이작성된 게시물 번호를 입력해주세요.');
}
if(empty($_GET['body'])){
  jsHistoryBackExit('내용을 입력해주세요.');
}
if(empty($_GET['memberId'])){
  jsHistoryBackExit('회원번호를 입력해주세요.');
}
$relId = intval($_GET['relId']);
$body = $_GET['body'];
$memberId = intval($_GET['memberId']);
$sql = "INSERT INTO reply SET regDate = NOW(), updateDate = NOW(), memberId = '$memberId', relTypeCode = 'article', relId = '$relId', body = '$body'";
mysqli_query($dbConnect, $sql);
?>
<script>
  location.replace('../article/detail.php?id=<?=$relId?>');
</script>