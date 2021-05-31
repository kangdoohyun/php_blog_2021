<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$loginId = getStrValueOr($_GET['loginId'], "");
$loginPw = getStrValueOr($_GET['loginPw'], "");
$name = getStrValueOr($_GET['name'], "");
$nickname = getStrValueOr($_GET['nickname'], "");
$cellphoneNo = getStrValueOr($_GET['cellphoneNo'], "");
$email = getStrValueOr($_GET['email'], "");

if(!$loginId){
  jsHistoryBackExit("아이디를 입력해 주세요.");
}
else if(!$loginPw){
  jsHistoryBackExit("비밀번호를 입력해 주세요.");
}
else if(!$name){
  jsHistoryBackExit("이름을 입력해 주세요.");
}
else if(!$nickname){
  jsHistoryBackExit("닉네임을 입력해 주세요.");
}
else if(!$cellphoneNo){
  jsHistoryBackExit("전화번호를 입력해 주세요.");
}
else if(!$email){
  jsHistoryBackExit("이메일을 입력해 주세요.");
}

$sql = DB__seqSql();
$sql -> add("SELECT * FROM `member`");
$sql -> add("WHERE loginId = ?", $loginId);

$loginIdCheck = DB__getRow($sql);
if(isset($loginIdCheck)){
  jsHistoryBackExit("이미 사용중인 아이디입니다.");
}
$sql = DB__seqSql();
$sql -> add("SELECT * FROM `member`");
$sql -> add("WHERE nickname = ?", $nickname);
$loginIdCheck = DB__getRow($sql);
if(isset($loginIdCheck)){
  jsHistoryBackExit("이미 사용중인 닉네임입니다.");
}
$sql = DB__seqSql();
$sql -> add("SELECT * FROM `member`");
$sql -> add("WHERE email = ?", $email);
$loginIdCheck = DB__getRow($sql);
if(isset($loginIdCheck)){
  jsHistoryBackExit("이미 사용중인 이메일입니다.");
}

$sql = DB__seqSql();
$sql -> add("INSERT INTO `member`");
$sql -> add("SET regDate = NOW(), updateDate = NOW(),");
$sql -> add("loginId = ?, loginPw = ?, `name` = ?,", $loginId, $loginPw, $name);
$sql -> add("nickname = ?, cellphoneNo = ?, email = ?, delStatus = '0'", $nickname, $cellphoneNo, $email);
$id = DB__insert($sql);

jsAlert("회원가입이 완료되었습니다.");
jsLocationReplaceExit("./login.php");