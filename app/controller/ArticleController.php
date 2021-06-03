<?php
class APP__UsrArticleController {
  private APP__ArticleService $articleService;
  private APP__BoardService $boardService;
  private APP__ReplyService $replyService;

  public function __construct() {
    $this->articleService = new APP__ArticleService();
    $this->boardService = new APP__BoardService();
    $this->replyService = new APP__ReplyService();
  }

  public function actionShowWrite() {
    $memberId = getIntValueOr($_GET['memberId'], 0);
    if(!$memberId){
      jsHistoryBackExit('회원번호를 입력해 주세요.');
    }
    $boards = $this->boardService->getBoardsByASC();
    
    require_once APP__getViewPath("usr/article/write");
  }

  public function actionShowList(): array {
    $boardId = isset($_GET['boardId']) ? intval($_GET['boardId']) : 0;

    $articles = $this->articleService->getForPrintArticles($boardId);
    $boards = $this->boardService->getBoardsByASC();

    require_once APP__getViewPath("usr/article/list");

    return $articles;
  }

  public function actionShowModify(){
    $id = getIntValueOr($_GET['id'], 0);
    $title = getStrValueOr($_GET['title'], "");
    $body = getStrValueOr($_GET['body'], "");

    if (!$id){
      jsHistoryBackExit("번호를 입력해주세요.");
    }
    if(!$title){
      jsHistoryBackExit("제목을 입력해주세요.");
    }
    if(!$body){
      jsHistoryBackExit("내용을 입력해주세요.");
    }

    require_once APP__getViewPath("usr/article/modify");
  }
  
  public function actionShowDetail(){    
    $id = getIntValueOr($_GET['id'], 0);
    if (!$id){
      jsHistoryBackExit('게시물 번호를 입력해주세요.');
    }

    $article = $this->articleService->getArticleById($id);
    $replis = $this->replyService->getReplisByRelIdDESC($id);

    require_once APP__getViewPath("usr/article/detail");
  }

  public function actionDoWrite(){
    $title = getStrValueOr($_GET['title'], "");
    $body = getStrValueOr($_GET['body'], "");
    $boardId = getIntValueOr($_GET['boardId'], 0);
    $memberId = getIntValueOr($_GET['memberId'], 0);

    if(!$title){
      jsHistoryBackExit('제목을 입력해주세요.');
    }
    if(!$body){
      jsHistoryBackExit('내용을 입력해주세요.');
    }
    if(!$boardId){
      jsHistoryBackExit('게시판을 선택해주세요.');
    }
    if(!$memberId){
      jsHistoryBackExit('회원번호를 입력해주세요.');
    }
    if(!is_numeric($boardId)){
      jsHistoryBackExit('게시판을 선택해주세요.');
    }

    $id = $this->articleService->writeArticle($boardId, $memberId, $title, $body);

    jsAlert("${id}번 글이 작성되었습니다.");
    jsLocationReplaceExit("./list.php");
  }

  public function actionDoModify(){
    $id = getIntValueOr($_GET['id'], 0);
    $title = getStrValueOr($_GET['title'], "");
    $body = getStrValueOr($_GET['body'], "");

    if(!$id){
      jsHistoryBackExit("번호를 입력해주세요.");
    }
    if(!$title){
      jsHistoryBackExit("제목을 입력해주세요.");
    }
    if(!$body){
      jsHistoryBackExit("내용을 입력해주세요.");
    }
    
    $article = $this->articleService->getArticleById($id);

    if(!$article){
      jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다.");
    }

    $this->articleService->modifyArticle($id, $title, $body);

    jsAlert("${id}번 글이 수정되었습니다.");
    jsLocationReplaceExit("./detail.php?id=${article['id']}");
  }

  public function actionDoDelete(){
    $id = getIntValueOr($_GET['id'], 0);
    if(!$id){
      jsHistoryBackExit('번호를 입력해주세요.');
    }
        
    $this->articleService->deleteArticle($id);

    jsAlert("${id}번 글이 삭제되었습니다.");
    jsLocationReplaceExit("./list.php");
  }
}