<?php
class APP__UsrBoardController {
  private APP__BoardService $boardService;

  public static function getViewPath($viewName) {
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $viewName . '.view.php';
  }

  public function __construct() {
    $this->boardService = new APP__BoardService();
  }

  public function actionShowMake(){
    require_once static::getViewPath("usr/board/make");
  }
  public function actionDoMake(){
    $name = getStrValueOr($_GET['name'], "");

    if(empty($_GET['name'])){
      jsHistoryBackExit("게시판 이름을 입력해주세요.");
    }

    $this->boardService->makeBoard($name);

    jsAlert("${name}게시판이 생성되었습니다.");
    jsLocationReplaceExit("../article/list.php");
  }
}