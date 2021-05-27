<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['name']) == false){
  echo "<h2>name을 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './make.php' \">게시판 생성</button>";
  exit;
}
$name = $_GET['name'];
$sql = "INSERT INTO board SET regDate = NOW(), updateDate = NOW(), `name` = '$name'";
$id = db__insert($sql);
?>
<script>
  alert("<?=$name?>게시판이 생성되었습니다.");
  location.replace("../article/list.php");
</script>