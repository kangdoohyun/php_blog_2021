<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$id = getIntValueOr($_GET['id'], 0);
$relId = getIntValueOr($_GET['relId'], 0);
$body = getStrValueOr($_GET['body'], "");

if(!$relId){
  jsHistoryBackExit('댓글이 작성된 게시물번호를 입력해주세요.');
}
if(!$id){
  jsHistoryBackExit('댓글번호를 입력해주세요.');
}
if(!$body){
  jsHistoryBackExit('내용을 입력해주세요.');
}

$sql = "UPDATE reply SET updateDate = NOW(), body = '$body' WHERE id = '$id';";
mysqli_query($dbConnect, $sql);

jsLocationReplaceExit("../article/detail.php?id=${relId}");
