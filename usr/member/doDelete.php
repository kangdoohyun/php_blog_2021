<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = '../article.list.php' \">글 리스트</button>";
  exit;
}
$id = $_GET['id'];
$sql = "
UPDATE `member` SET
delStatus = 1
WHERE id = '$id';
";
db__modify($sql);
?>
<script>
  location.replace('../member/doLogout.php');
</script>