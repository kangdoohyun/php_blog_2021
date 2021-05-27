<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './join.php' \">회원가입으로 돌아가기</button>";
  exit;
}
if(isset($_GET['loginId']) == false){
  echo "<h2>loginId를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './join.php' \">회원가입으로 돌아가기</button>";
  exit;
}
if(isset($_GET['loginPw']) == false){
  echo "<h2>loginPw를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './join.php' \">회원가입으로 돌아가기</button>";
  exit;
}
if(isset($_GET['name']) == false){
  echo "<h2>name을 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './join.php' \">회원가입으로 돌아가기</button>";
  exit;
}
if(isset($_GET['nickname']) == false){
  echo "<h2>nickname을 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './join.php' \">회원가입으로 돌아가기</button>";
  exit;
}
if(isset($_GET['cellphoneNo']) == false){
  echo "<h2>cellphoneNo를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './join.php' \">회원가입으로 돌아가기</button>";
  exit;
}
if(isset($_GET['email']) == false){
  echo "<h2>email을 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './join.php' \">회원가입으로 돌아가기</button>";
  exit;
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