<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = $_GET['id'];
$sql = "DELETE FROM article WHERE id = '$id'";
db__delete($sql);
?>
<script>
  alert('<?=$id?>번 글이 삭제되었습니다.');
  location.replace('./list.php');
</script>