<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';

$id = getIntValueOr($_GET['id'], 0);
$loginId = getStrValueOr($_GET['loginId'], "");
$loginPw = getStrValueOr($_GET['loginPw'], "");
$name = getStrValueOr($_GET['name'], "");
$nickname = getStrValueOr($_GET['nickname'], "");
$cellphoneNo = getservbyname($_GET['cellphoneNo'], "");
$email = getStrValueOr($_GET['email'], "");

if(!$id){
  jsHistoryBackExit('회원번호를 입력해주세요.');
}
if(!$loginId){
  jsHistoryBackExit('로그인 아이디를 입력해주세요.');
}
if(!$loginPw){
  jsHistoryBackExit('비밀번호를 입력해주세요.');
}
if(!$name){
  jsHistoryBackExit('이름을 입력해주세요.');
}
if(!$nickname){
  jsHistoryBackExit('닉네임을 입력해주세요.');
}
if(!$cellphoneNo){
  jsHistoryBackExit('전화번호를 입력해주세요.');
}
if(!$email){
  jsHistoryBackExit('이메일을 입력해주세요.');
}

$sql = "
UPDATE `member` SET 
updateDate = NOW(),
loginId = '$loginId',
loginPw = '$loginPw',
`name` = '$name',
nickname = '$nickname',
email = '$email',
cellphoneNo = '$cellphoneNo'
WHERE id = '$id'";
$id = db__modify($sql);

jsAlert("회원정보 수정이 완료되었습니다.");
jsLocationReplaceExit("./login.php");