<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(empty($_GET['loginId'])){
  jsHistoryBackExit("아이디를 입력해 주세요.");
}
else if(empty($_GET['loginPw'])){
  jsHistoryBackExit("비밀번호를 입력해 주세요.");
}
else if(empty($_GET['name'])){
  jsHistoryBackExit("이름을 입력해 주세요.");
}
else if(empty($_GET['nickname'])){
  jsHistoryBackExit("닉네임을 입력해 주세요.");
}
else if(empty($_GET['cellphoneNo'])){
  jsHistoryBackExit("전화번호를 입력해 주세요.");
}
else if(empty($_GET['email'])){
  jsHistoryBackExit("이메일을 입력해 주세요.");
}
else{
  $loginId = $_GET['loginId'];
  $loginPw = $_GET['loginPw'];
  $name = $_GET['name'];
  $nickname = $_GET['nickname'];
  $cellphoneNo = $_GET['cellphoneNo'];
  $email = $_GET['email'];
  $sql = "SELECT * FROM `member` WHERE loginId = '$loginId'";
  $loginIdCheck = db__getRow($sql);
  if(isset($loginIdCheck)){
    jsHistoryBackExit("이미 사용중인 아이디입니다.");
  }
  $sql = "SELECT * FROM `member` WHERE nickname = '$nickname'";
  $loginIdCheck = db__getRow($sql);
  if(isset($loginIdCheck)){
    jsHistoryBackExit("이미 사용중인 닉네임입니다.");
  }
  $sql = "SELECT * FROM `member` WHERE email = '$email'";
  $loginIdCheck = db__getRow($sql);
  if(isset($loginIdCheck)){
    jsHistoryBackExit("이미 사용중인 이메일입니다.");
  }
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
}
?>
<script>
  alert("회원가입이 완료되었습니다.");
  location.replace("./login.php");
</script>