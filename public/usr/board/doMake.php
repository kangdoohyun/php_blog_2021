<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/../webinit.php';

if(empty($_GET['name'])){
  jsHistoryBackExit("게시판 이름을 입력해주세요.");
}
$name = $_GET['name'];
$sql = "INSERT INTO board SET regDate = NOW(), updateDate = NOW(), `name` = '$name'";
$sql = DB__seqSql();
$sql -> add("INSERT INTO board");
$sql -> add("SET regDate = NOW(), updateDate = NOW(),");
$sql -> add("`name` = ?", $name);
$id = DB__insert($sql);

jsAlert("${name}게시판이 생성되었습니다.");
jsLocationReplaceExit("../article/list.php");
