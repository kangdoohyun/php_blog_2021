<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/../webinit.php';

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

$sql = DB__seqSql();
$sql -> add("UPDATE reply SET");
$sql -> add("updateDate = NOW(),");
$sql -> add("body = ?", $body);
$sql -> add("WHERE id = ?", $id);

DB__modify($sql);

jsLocationReplaceExit("../article/detail.php?id=${relId}");

