<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$id = getIntValueOr($_GET['id'], 0);
$title = getStrValueOr($_GET['title'], "");
$body = getStrValueOr($_GET['body'], "");

if(!$id){
  jsHistoryBackExit("번호를 입력해주세요.");
}
if(!$title){
  jsHistoryBackExit("제목을 입력해주세요.");
}
if(!$body){
  jsHistoryBackExit("내용을 입력해주세요.");
}
$sql = DB__seqSql();
$sql -> add("SELECT * FROM article");
$sql -> add("WHERE id = ?", $id);
$article = DB__getRow($sql);

if(!$article){
  jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다.");
}
$sql = DB__seqSql();
$sql -> add("UPDATE article SET");
$sql -> add("updateDate = NOW(),");
$sql -> add("title = ?,", $title);
$sql -> add("body = ?", $body);
$sql -> add("WHERE id = ?", $id);
DB__modify($sql);

jsAlert("${id}번 글이 수정되었습니다.");
jsLocationReplaceExit("./detail.php?id=${article['id']}");

