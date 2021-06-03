<?php
class APP__UsrReplyController {
  private APP__ReplyService $replyService;

  public function __construct() {
    global $APP__replyService;
    $this->replyService = $APP__replyService;
  }

  public function actionDoWrite(){
    $relId = getIntValueOr($_REQUEST['relId'], 0);
    $body = getStrValueOr($_REQUEST['body'], "");
    $memberId = getIntValueOr($_REQUEST['memberId'], 0);

    if(!$relId){
      jsHistoryBackExit('댓글이작성된 게시물 번호를 입력해주세요.');
    }
    if(!$body){
      jsHistoryBackExit('내용을 입력해주세요.');
    }
    if(!$memberId){
      jsHistoryBackExit('로그인 후 이용해주세요');
    }

    $this->replyService->writeReply($relId, $body, $memberId);

    jsLocationReplaceExit("../article/detail.php?id=$relId");

  }

  public function actionDoModify(){
    $id = getIntValueOr($_REQUEST['id'], 0);
    $relId = getIntValueOr($_REQUEST['relId'], 0);
    $body = getStrValueOr($_REQUEST['body'], "");

    if(!$relId){
      jsHistoryBackExit('댓글이 작성된 게시물번호를 입력해주세요.');
    }
    if(!$id){
      jsHistoryBackExit('댓글번호를 입력해주세요.');
    }
    if(!$body){
      jsHistoryBackExit('내용을 입력해주세요.');
    }

    $this->replyService->modifyReply($id, $body);

    jsLocationReplaceExit("../article/detail.php?id=${relId}");

  }

  public function actionDoDelete(){    
    $id = getIntValueOr($_REQUEST['id'], 0);
    $relId = getIntValueOr($_REQUEST['relId'], 0);

    if(!$id){
      jsHistoryBackExit('댓글번호를 입력해주세요.');
    }
    if(!$relId){  
      jsHistoryBackExit('댓글이 작성된 게시물번호를 입력해주세요.');
    }
    
    $this->replyService->deleteReply($id);

    jsLocationReplaceExit("../article/detail.php?id=${relId}");
  }
}