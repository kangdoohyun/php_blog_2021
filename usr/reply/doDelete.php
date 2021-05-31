<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$id = getIntValueOr($_GET['id'], 0);
$relId = getIntValueOr($_GET['relId'], 0);

if(!$id){
  jsHistoryBackExit('댓글번호를 입력해주세요.');
}
if(!$relId){  
  jsHistoryBackExit('댓글이 작성된 게시물번호를 입력해주세요.');
}
$sql = "DELETE FROM reply WHERE id = '$id'";
$sql = DB__seqSql();
$sql -> add("DELETE FROM reply WHERE id = ?", $id);
DB__delete($sql);

jsLocationReplaceExit("../article/detail.php?id=${relId}");