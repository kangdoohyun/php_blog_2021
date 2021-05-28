<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(empty($_GET['loginId'])){
  jsRocationReplaceExit('../member/login.php', '로그인아이디를 입력해주세요.');
}
if(empty($_GET['loginPw'])){
  jsRocationReplaceExit('../member/login.php', '비밀번호를 입력해주세요.');
}
$loginId = $_GET['loginId'];
$loginPw = $_GET['loginPw'];
$sql = "SELECT * FROM member WHERE loginId = '$loginId'" ;
$member = db__getRow($sql);
if(empty($member)){
  echo "<script>alert(\"존재하지 않는 회원입니다.\");location.replace('./login.php')</script>";
  exit;
}
if($member['delStatus'] == 1){
  echo "<script>alert(\"존재하지 않는 회원입니다.\");location.replace('./login.php')</script>";
  exit;
}
if($member['loginPw'] != $loginPw){
  echo "<script>alert(\"비밀번호를 확인 해 주세요.\");location.replace('./login.php')</script>";
  exit;
}
$_SESSION['loginedMemberId'] = $member['id'];
?>
<script>
  alert("<?=$member['nickname']?>님 환영합니다.");
  location.replace('../article/list.php');
</script>