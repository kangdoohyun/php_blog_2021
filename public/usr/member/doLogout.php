<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/../webinit.php';

if(!$memberIdInSession){
  jsHistoryBackExit('로그인 상태가 아닙니다.');
}

unset($_SESSION['loginedMemberId']);

jsAlert("로그아웃 되었습니다.");
jsLocationReplaceExit("./login.php");