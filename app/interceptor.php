<?php
function APP__runBeforActionInterceptor(string $action) {
  global $APP__memberService;

  $_REQUEST['APP__isLogined'] = false;
  $_REQUEST['APP__loginedMemberId'] = 0;
  $_REQUEST['APP__loginedMember'] = null;

  if ( isset($_SESSION['loginedMemberId']) ) {
    $_REQUEST['APP__isLogined'] = true;
    $_REQUEST['APP__loginedMemberId'] = intval($_SESSION['loginedMemberId']);
    $_REQUEST['APP__loginedMember'] = $APP__memberService->getMemberById($_REQUEST['APP__loginedMemberId']);
  }
}

function APP__runNeedLoginInterceptor(string $action) {
  switch ($action){
    case 'usr/member/login':
    case 'usr/member/doLogin':
    case 'usr/member/join':
    case 'usr/member/doJoin':
    case 'usr/article/list':
    case 'usr/article/detail':
      return;
  }
  if($_REQUEST['APP__isLogined'] == false){
    jsHistoryBackExit("로그인 후 이용해주세요.");
  }
}

function APP__runNeedLogoutInterCeptor(string $action) {
  switch ($action){
    case 'usr/member/login':
    case 'usr/member/doLogin':
    case 'usr/member/join':
    case 'usr/member/doJoin':
      break;
    default:
      return;
  }
  if($_REQUEST['APP__isLogined']){
    jsHistoryBackExit("로그아웃 후 이용해주세요.");
  }
}

function APP__runInterceptors(string $action) {
  APP__runBeforActionInterceptor($action);
  APP__runNeedLoginInterceptor($action);
  APP__runNeedLogoutInterCeptor($action);
}