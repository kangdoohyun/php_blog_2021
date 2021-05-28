<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  jsHistoryBackExit('회원번호를 입력해주세요.');
}
if(isset($_GET['loginId']) == false){
  jsHistoryBackExit('로그인 아이디를 입력해주세요.');
}
if(isset($_GET['loginPw']) == false){
  jsHistoryBackExit('비밀번호를 입력해주세요.');
}
if(isset($_GET['name']) == false){
  jsHistoryBackExit('이름을 입력해주세요.');
}
if(isset($_GET['nickname']) == false){
  jsHistoryBackExit('닉네임을 입력해주세요.');
}
if(isset($_GET['cellphoneNo']) == false){
  jsHistoryBackExit('전화번호를 입력해주세요.');
}
if(isset($_GET['email']) == false){
  jsHistoryBackExit('이메일을 입력해주세요.');
}
$id = $_GET['id'];
$loginId = $_GET['loginId'];
$loginPw = $_GET['loginPw'];
$name = $_GET['name'];
$nickname = $_GET['nickname'];
$cellphoneNo = $_GET['cellphoneNo'];
$email = $_GET['email'];

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
?>
<script>
  alert("회원정보 수정이 완료되었습니다.");
  location.replace("./login.php");
</script>