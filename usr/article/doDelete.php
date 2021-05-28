<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  jsHistoryBackExit('번호를 입력해주세요.');
}
$id = $_GET['id'];
$sql = "DELETE FROM article WHERE id = '$id'";
db__delete($sql);
?>
<script>
  alert('<?=$id?>번 글이 삭제되었습니다.');
  location.replace('./list.php');
</script>