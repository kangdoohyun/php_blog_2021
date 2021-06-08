<?php
class APP__UsrBoardController {
  private APP__BoardService $boardService;

  public function __construct() {
    global $APP__boardService;
    $this->boardService = $APP__boardService;
  }

  public function actionShowMake(){
    require_once APP__getViewPath("usr/board/make");
  }
  public function actionDoMake(){
    $name = getStrValueOr($_REQUEST['name'], "");

    if(empty($_REQUEST['name'])){
      jsHistoryBackExit("게시판 이름을 입력해주세요.");
    }

    $this->boardService->makeBoard($name);

    jsAlert("${name}게시판이 생성되었습니다.");
    jsLocationReplaceExit("../article/list");
  }
}