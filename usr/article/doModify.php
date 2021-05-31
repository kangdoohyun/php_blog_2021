<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$id = getIntValueOr($_GET['id'], 0);
$title = getStrValueOr($_GET['title'], "");
$body = getStrValueOr($_GET['body'], "");

if(!$id){
  jsHistoryBackExit("번호를 입력해주세요.");
}
if(isset($_GET['title']) == false){
  jsHistoryBackExit("제목을 입력해주세요.");
}
if(isset($_GET['body']) == false){
  jsHistoryBackExit("내용을 입력해주세요.");
}

$sql = "SELECT * FROM article WHERE id = '$id'";
$article = db__getRow($sql);

if(!$article){
  jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다.");
}
$sql = "UPDATE article SET updateDate = NOW(), title = '$title', body = '$body' WHERE id = '$id'" ;
db__modify($sql);

jsAlert("${id}번 글이 수정되었습니다.");
jsLocationReplaceExit("./detail.php?id=${article['id']}");
