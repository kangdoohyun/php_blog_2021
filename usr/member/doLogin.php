<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['loginId']) == false){
  echo "<h2>loginId를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = '../article/list.php' \">글 리스트</button>";
  exit;
}
if(isset($_GET['loginPw']) == false){
  echo "<h2>loginPw를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = '../article/list.php' \">글 리스트</button>";
  exit;
}
$loginId = $_GET['loginId'];
$loginPw = $_GET['loginPw'];
$sql = "SELECT * FROM member WHERE loginId = '$loginId'" ;
$member = db__getRow($sql);
if(empty($member)){
  echo "<script>alert(\"존재하지 않는 회원입니다1.\");location.replace('./login.php')</script>";
  exit;
}
if($member['delStatus'] == 1){
  echo "<script>alert(\"존재하지 않는 회원입니다2.\");location.replace('./login.php')</script>";
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