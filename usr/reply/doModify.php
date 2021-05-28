<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(empty($_GET['relId'])){
  jsHistoryBackExit('댓글이 작성된 게시물번호를 입력해주세요.');
}
if(empty($_GET['id'])){
  jsHistoryBackExit('댓글번호를 입력해주세요.');
}
if(empty($_GET['body'])){
  jsHistoryBackExit('내용을 입력해주세요.');
}
$relId = $_GET['relId'];
$id = $_GET['id'];
$body = $_GET['body'];
$sql = "UPDATE reply SET updateDate = NOW(), body = '$body' WHERE id = '$id';";
mysqli_query($dbConnect, $sql);
?>
<script>
  location.replace('../article/detail.php?id=<?=$relId?>');
</script>