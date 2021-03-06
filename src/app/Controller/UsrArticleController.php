<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Service\ArticleService;
use App\Service\MemberService;
use App\Service\BoardService;
use App\Service\ReplyService;

class UsrArticleController extends Controller
{
    private ArticleService $articleService;
    private MemberService $memberService;
    private BoardService $boardService;
    private ReplyService $replyService;

    public function __construct()
    {
        parent::__construct();
        $this->articleService = ArticleService::getInstance();
        parent::__construct();
        $this->memberService = MemberService::getInstance();
        parent::__construct();
        $this->boardService = BoardService::getInstance();
        parent::__construct();
        $this->replyService = ReplyService::getInstance();
    }

    public function actionShowWrite()
    {
        $boards = $this->boardService->getBoardsByASC();

        require_once  $this->getViewPath("usr/article/write");
    }

    public function actionShowList(): array
    {
        $boardId = isset($_REQUEST['boardId']) ? intval($_REQUEST['boardId']) : 0;

        $articles = $this->articleService->getForPrintArticles($boardId);
        // $boards = $this->boardService->getBoardsByASC();
        $totalCount = $this->articleService->getTotalArticlesCount();

        require_once  $this->getViewPath("usr/article/list");

        return $articles;
    }

    public function actionShowModify()
    {
        $id = getIntValueOr($_REQUEST['id'], 0);
        if (!$id) {
            jsHistoryBackExit("번호를 입력해주세요.");
        }

        $article = $this->articleService->getArticleById($id);
        $memberCanModifyRs = $this->articleService->getMemberCanModify($_REQUEST['App__loginedMemberId'], $article);

        if ($memberCanModifyRs->isFail()) {
            jsHistoryBackExit($memberCanModifyRs->getMsg());
        }

        require_once  $this->getViewPath("usr/article/modify");
    }

    public function actionShowDetail()
    {
        $id = getIntValueOr($_REQUEST['id'], 0);
        if (!$id) {
            jsHistoryBackExit('게시물 번호를 입력해주세요.');
        }

        $article = $this->articleService->getArticleById($id);
        $replis = $this->replyService->getReplisByRelIdDESC($id);
        $like = $this->articleService->getLikeByMemberIdAndArticleId($_REQUEST['App__loginedMemberId'], $article["id"]);

        $this->articleService->updateViews($article["views"] + 1, $article["id"]);


        require_once  $this->getViewPath("usr/article/detail");
    }

    public function actionDoWrite()
    {
        $title = getStrValueOr($_REQUEST['title'], "");
        $body = getStrValueOr($_REQUEST['body'], "");
        $boardId = getIntValueOr($_REQUEST['boardId'], 0);

        if (!$title) {
            jsHistoryBackExit('제목을 입력해주세요.');
        }
        if (!$body) {
            jsHistoryBackExit('내용을 입력해주세요.');
        }
        if (!$boardId) {
            jsHistoryBackExit('게시판을 선택해주세요.');
        }
        if (!is_numeric($boardId)) {
            jsHistoryBackExit('게시판을 선택해주세요.');
        }

        $id = $this->articleService->writeArticle($boardId, $_REQUEST['App__loginedMemberId'], $title, $body);

        jsAlert("${id}번 글이 작성되었습니다.");
        jsLocationReplaceExit("./list");
    }

    public function actionDoModify()
    {
        $id = getIntValueOr($_REQUEST['id'], 0);
        $title = getStrValueOr($_REQUEST['title'], "");
        $body = getStrValueOr($_REQUEST['body'], "");

        if (!$id) {
            jsHistoryBackExit("번호를 입력해주세요.");
        }
        if (!$title) {
            jsHistoryBackExit("제목을 입력해주세요.");
        }
        if (!$body) {
            jsHistoryBackExit("내용을 입력해주세요.");
        }

        $article = $this->articleService->getArticleById($id);

        if (!$article) {
            jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다.");
        }

        $this->articleService->modifyArticle($id, $title, $body);

        jsAlert("${id}번 글이 수정되었습니다.");
        jsLocationReplaceExit("./detail?id=${article['id']}");
    }

    public function actionDoDelete()
    {
        $id = getIntValueOr($_REQUEST['id'], 0);
        if (!$id) {
            jsHistoryBackExit('번호를 입력해주세요.');
        }

        $article = $this->articleService->getArticleById($id);
        $memberCanDeleteRs = $this->articleService->getMemberCanDelete($_REQUEST['App__loginedMemberId'], $article);
        if ($memberCanDeleteRs->isFail()) {
            jsHistoryBackExit($memberCanDeleteRs->getMsg());
        }

        $this->articleService->deleteArticle($id);

        jsAlert("${id}번 글이 삭제되었습니다.");
        jsLocationReplaceExit("./list");
    }

    public function actionDoLike()
    {
        $articleId = getIntValueOr($_REQUEST['articleId'], 0);

        $this->articleService->insertLike($_REQUEST['App__loginedMemberId'], $articleId);
        jsLocationReplaceExit("./detail?id=$articleId");
    }

    public function actionDoDeleteLike()
    {
        $articleId = getIntValueOr($_REQUEST['articleId'], 0);

        $this->articleService->deleteLike($_REQUEST['App__loginedMemberId'], $articleId);
        jsLocationReplaceExit("./detail?id=$articleId");
    }
}
