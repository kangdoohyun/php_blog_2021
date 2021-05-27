<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
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

$loginId = $_GET['loginId'];
$loginPw = $_GET['loginPw'];
$name = $_GET['name'];
$nickname = $_GET['nickname'];
$cellphoneNo = $_GET['cellphoneNo'];
$email = $_GET['email'];
$sql = "
INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = '$loginId',
loginPw = '$loginPw',
`name` = '$name',
nickname = '$nickname',
cellphoneNo = '$cellphoneNo',
email = '$email',
delStatus = '0';
";
$id = db__insert($sql);
?>
<script>
  alert("회원가입이 완료되었습니다.");
  location.replace("./login.php");
</script>