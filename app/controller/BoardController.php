<?php
class APP__UsrBoardController {
  private APP__BoardService $boardService;

  public static function getViewPath($viewName) {
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $viewName . '.view.php';
  }

  public function __construct() {
    $this->boardService = new APP__BoardService();
  }
}