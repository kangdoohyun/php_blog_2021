<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['relId']) == false){
  echo "<h2>relId를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = '../article/list.php' \">글 리스트</button>";
  exit;
}
if(isset($_GET['body']) == false){
  echo "<h2>body를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = '../article/list.php' \">글 리스트</button>";
  exit;
}
$relId = $_GET['relId'];
$body = $_GET['body'];
$sql = "INSERT INTO reply SET regDate = NOW(), updateDate = NOW(), relTypeCode = 'article', relId = '$relId', body = '$body'";
mysqli_query($dbConnect, $sql);
?>
<script>
  location.replace('../article/detail.php?id=<?=$relId?>');
</script>