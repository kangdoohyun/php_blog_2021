<?php
class APP__UsrReplyController {
  private APP__ReplyService $replyService;

  public static function getViewPath($viewName) {
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $viewName . '.view.php';
  }

  public function __construct() {
    $this->replyService = new APP__ReplyService();
  }
}