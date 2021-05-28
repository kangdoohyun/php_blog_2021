<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if($_SESSION['loginedMemberId'] == null){
  jsHistoryBackExit('로그인 상태가 아닙니다.');
}
unset($_SESSION['loginedMemberId']);
?>
<script>
  alert('로그아웃 되었습니다.');
  location.replace('./login.php');
</script>