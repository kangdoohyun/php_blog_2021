<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(empty($_GET['name'])){
  jsHistoryBackExit("게시판 이름을 입력해주세요.");
}
$name = $_GET['name'];
$sql = "INSERT INTO board SET regDate = NOW(), updateDate = NOW(), `name` = '$name'";
$id = db__insert($sql);
?>
<script>
  alert("<?=$name?>게시판이 생성되었습니다.");
  location.replace("../article/list.php");
</script>