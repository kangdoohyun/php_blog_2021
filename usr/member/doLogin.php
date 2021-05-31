<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$loginId = getStrValueOr($_GET['loginId'], "");
$loginPw = getStrValueOr($_GET['loginPw'], "");

if(!$loginId){
  jsLocationReplaceExit('../member/login.php', '로그인아이디를 입력해주세요.');
}
if(!$loginPw){
  jsLocationReplaceExit('../member/login.php', '비밀번호를 입력해주세요.');
}

$sql = "SELECT * FROM member WHERE loginId = '$loginId'" ;
$member = db__getRow($sql);

if(!$member){
  jsHistoryBackExit("존재하지 않는 회원입니다.");
}
if($member['delStatus'] == 1){
  jsHistoryBackExit("존재하지 않는 회원입니다.");
}
if($member['loginPw'] != $loginPw){
  jsHistoryBackExit("비밀번호를 확인해주세요.");
}

$_SESSION['loginedMemberId'] = $member['id'];

jsAlert("${member['nickname']}님 환영합니다.");
jsLocationReplaceExit("../article/list.php");