<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';


$title = getStrValueOr($_GET['title'], "");
$body = getStrValueOr($_GET['body'], "");
$boardId = getIntValueOr($_GET['boardId'], 0);
$memberId = getIntValueOr($_GET['memberId'], 0);

if(!$title){
  jsHistoryBackExit('제목을 입력해주세요.');
}
if(!$body){
  jsHistoryBackExit('내용을 입력해주세요.');
}
if(!$boardId){
  jsHistoryBackExit('게시판번호를 입력해주세요.');
}
if(!$memberId){
  jsHistoryBackExit('회원번호를 입력해주세요.');
}
if(!is_numeric($boardId)){
  jsHistoryBackExit('게시판을 선택해주세요.');
}

$sql = DB__SeqSql();
$sql -> add("INSERT INTO article");
$sql -> add("SET regDate = NOW(),");
$sql -> add("updateDate = NOW(),");
$sql -> add("boardId = ?,", $boardId);
$sql -> add("memberId = ?,", $memberId);
$sql -> add("title = ?,", $title);
$sql -> add("body = ?", $body);
$id = DB__insert($sql);

jsAlert("${id}번 글이 작성되었습니다.");
jsLocationReplaceExit("./list.php");
