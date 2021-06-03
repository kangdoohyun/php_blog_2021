<?php
require_once __DIR__ . "/repository/MemberRepository.php";
require_once __DIR__ . "/repository/BoardRepository.php";
require_once __DIR__ . "/repository/ArticleRepository.php";
require_once __DIR__ . "/repository/ReplyRepository.php";

require_once __DIR__ . "/service/MemberService.php";
require_once __DIR__ . "/service/BoardService.php";
require_once __DIR__ . "/service/ArticleService.php";
require_once __DIR__ . "/service/ReplyService.php";

require_once __DIR__ . "/controller/MemberController.php";
require_once __DIR__ . "/controller/BoardController.php";
require_once __DIR__ . "/controller/ArticleController.php";
require_once __DIR__ . "/controller/ReplyController.php";

require_once __DIR__ . '/global.php';

function APP__getViewPath($viewName) {
  return __DIR__ . '/../public/' . $viewName . '.view.php';
}
function APP__runBeforActionInterCeptor(string $action) {
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

function APP__runNeedLoginInterCeptor(string $action) {
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
  APP__runBeforActionInterCeptor($action);
  APP__runNeedLoginInterCeptor($action);
  APP__runNeedLogoutInterCeptor($action);
}

function APP__runAction(string $action) {
  list($controllerTypeCode, $controllerName, $actionFuncName) = explode('/', $action);

  $controllerClassName = "APP__" . ucfirst($controllerTypeCode) . ucfirst($controllerName) . "Controller";
  $actionMethodName = "action";

  if ( str_starts_with($actionFuncName, "do") ) {
    $actionMethodName .= ucfirst($actionFuncName);
  }
  else {
    $actionMethodName .= "Show" . ucfirst($actionFuncName);
  }

  $usrArticleController = new $controllerClassName();
  $usrArticleController->$actionMethodName();
}

function APP__run(string $action){
  APP__runInterceptors($action);
  APP__runAction($action);
}

