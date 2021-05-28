<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  jsHistoryBackExit('회원번호를 입력해주세요.');
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