<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$relId = getIntValueOr($_GET['relId'], 0);
$body = getStrValueOr($_GET['body'], "");
$memberId = getIntValueOr($_GET['memberId'], 0);

if(!$relId){
  jsHistoryBackExit('댓글이작성된 게시물 번호를 입력해주세요.');
}
if(!$body){
  jsHistoryBackExit('내용을 입력해주세요.');
}
if(!$memberId){
  jsHistoryBackExit('로그인 후 이용해주세요');
}

$sql = "INSERT INTO reply SET regDate = NOW(), updateDate = NOW(), memberId = '$memberId', relTypeCode = 'article', relId = '$relId', body = '$body'";
mysqli_query($dbConnect, $sql);

jsLocationReplaceExit("../article/detail.php?id=$relId");
