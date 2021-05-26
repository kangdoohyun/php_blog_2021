<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
unset($_SESSION['loginedMemberId']);
?>
<script>
  alert('로그아웃 되었습니다.');
  location.replace('./login.php');
</script>