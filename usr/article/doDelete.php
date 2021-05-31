<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
$id = getIntValueOr($_GET['id'], 0);
if(!$id){
  jsHistoryBackExit('번호를 입력해주세요.');
}
$sql = "DELETE FROM article WHERE id = '$id'";
db__delete($sql);

jsAlert("${id}번 글이 삭제되었습니다.");
jsLocationReplaceExit("./list.php");