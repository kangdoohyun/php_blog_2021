<?php
class APP__UsrMemberController {
  private APP__MemberService $memberervice;

  public static function getViewPath($viewName) {
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $viewName . '.view.php';
  }

  public function __construct() {
    $this->memberervice = new APP__MemberService();
  }
}