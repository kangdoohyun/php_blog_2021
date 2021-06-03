<?php
require_once __DIR__ . "/app/repository/MemberRepository.php";
require_once __DIR__ . "/app/repository/BoardRepository.php";
require_once __DIR__ . "/app/repository/ArticleRepository.php";
require_once __DIR__ . "/app/repository/ReplyRepository.php";

require_once __DIR__ . "/app/service/MemberService.php";
require_once __DIR__ . "/app/service/BoardService.php";
require_once __DIR__ . "/app/service/ArticleService.php";
require_once __DIR__ . "/app/service/ReplyService.php";

require_once __DIR__ . "/app/controller/MemberController.php";
require_once __DIR__ . "/app/controller/BoardController.php";
require_once __DIR__ . "/app/controller/ArticleController.php";
require_once __DIR__ . "/app/controller/ReplyController.php";

function APP__getViewPath($viewName) {
  return __DIR__ . '/public/' . $viewName . '.view.php';
}

function runApp($action) {
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

